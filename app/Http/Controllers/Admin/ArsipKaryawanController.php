<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ArsipKaryawan;
use App\Models\Karyawan;
use App\Models\Kategori;
use App\Models\Departemen;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Models\Notifikasi;
use Carbon\Carbon;

class ArsipKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $a = ArsipKaryawan::with('employee', 'departemen')->get();
        foreach ($a as $key => $value) {
            $date_end = explode(' sampai ', $value->retensi_arsip)[1];
            $date_end = \Carbon\Carbon::parse($date_end);


            $days_until_expiry = now()->diffInDays($date_end, false);


            $existingNotification = Notifikasi::whereDate('created_at', now()->toDateString())
                ->where('id_arsip_surat', $value->id_arsip_karyawan)
                ->where('level', 'karyawan')
                ->exists();

            if ($days_until_expiry < 30 && !$existingNotification) {
                Notifikasi::create([
                    'keterangan' => 'Masa berlaku arsip karyawan sebentar lagi habis<br>Kode :' . $value->kode_arsip_karyawan,
                    'id_arsip_surat' => $value->id_arsip_karyawan,
                    'tipe_arsip' => 'karyawan',
                    'level' => 'karyawan',
                    'user_id' => $value->user_id,
                    'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')->toDateTimeString(),
                    'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta')->toDateTimeString(),
                ]);
            }
        }
        if (request()->ajax()) {
            $query = ArsipKaryawan::with('employee', 'departemen')
                ->leftJoin('users', 'users.id_user', '=', 'arsip_karyawan.user_id')
                ->leftJoin('departemen', 'departemen.id_departemen', '=', 'users.id_departemen')
                ->select(
                    'arsip_karyawan.*',
                    'users.nama_lengkap',
                    'departemen.nama_departemen',
                )
                ->latest()
                ->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    $button = '
                    <a class="btn btn-success btn-xs" href="' . route('arsip-karyawan.show', $item->id_arsip_karyawan) . '">
                    <i class="fa fa-search-plus"></i> &nbsp; Detail
                    </a>
                    ';

                    if ($item->user_id == auth()->user()->id_user) {
                        $button .= '
                            <a class="btn btn-primary btn-xs" href="' . route('arsip-karyawan.edit', $item->id_arsip_karyawan) . '">
                        <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                        <form action="' . route('arsip-karyawan.destroy', $item->id_arsip_karyawan) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini dari situs anda?'" . ')">
                        ' . method_field('delete') . csrf_field() . '
                        <button type="submit" class="btn btn-danger btn-xs">
                        <i class="far fa-trash-alt"></i> &nbsp; Hapus
                        </button>
                        </form>';
                    }

                    return $button;
                })
                ->editColumn('post_status', function ($item) {
                    return $item->post_status == 'Published' ? '<div class="badge bg-green-soft text-green">' . $item->post_status . '</div>' : '<div class="badge bg-gray-200 text-dark">' . $item->post_status . '</div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action', 'post_status'])
                ->make();
        }

        return view('pages.admin.arsip-karyawan.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Departemen::all();
        $employees = Karyawan::all();
        $categories = Kategori::all();

        // Menghitung jumlah arsip karyawan
        // $countAK = ArsipKaryawan::count();

        // Membuat kode arsip karyawan unik
        $codeAK = $this->generateUniqueCode('AK', 0);

        return view('pages.admin.arsip-karyawan.create', [
            'departments' => $departments,
            'employees' => $employees,
            'categories' => $categories,
            'codeAK' => $codeAK,
        ]);
    }

    private function generateUniqueCode($prefix, $count)
    {
        $code = $prefix . str_pad($count + 1, 4, '0', STR_PAD_LEFT);

        // Memeriksa apakah kode sudah digunakan sebelumnya
        if (ArsipKaryawan::where('kode_arsip_karyawan', $code)->exists()) {
            // Jika sudah, ulangi proses untuk mendapatkan kode yang unik
            $count++;
            return $this->generateUniqueCode($prefix, $count);
        }

        return $code;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['retensi_arsip' => $request->from . ' sampai ' . $request->to]);
        $validatedData = $request->validate([
            'kode_arsip_karyawan' => 'required|unique:arsip_karyawan,kode_arsip_karyawan',
            'id_kategori_arsip' => 'required',
            'id_karyawan' => 'required',
            'id_departemen' => 'required',
            'retensi_arsip' => 'required',
            'file_arsip_karyawan' => 'required|mimes:pdf|file',
        ]);

        if ($request->file('file_arsip_karyawan')) {
            $validatedData['file_arsip_karyawan'] = $request->file('file_arsip_karyawan')->store('assets/file-arsip-karyawan');
        }

        $validatedData['user_id'] = auth()->user()->id_user;

        ArsipKaryawan::create($validatedData);

        return redirect()
            ->route('arsip-karyawan.index')
            ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = ArsipKaryawan::with('departemen', 'employee', 'category')->findOrFail($id);

        return view('pages.admin.arsip-karyawan.show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Departemen::all();
        $categories = Kategori::all();
        $item = ArsipKaryawan::findOrFail($id);
        $employee = Karyawan::all();

        return view('pages.admin.arsip-karyawan.edit', [
            'departments' => $departments,
            'employees' => $employee,
            'categories' => $categories,
            'item' => $item
        ]);
    }

    public function download_archive($id)
    {
        $item = ArsipKaryawan::findOrFail($id);

        return Storage::download($item->file_arsip_karyawan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->merge(['retensi_arsip' => $request->from . ' sampai ' . $request->to]);
        $validatedData = $request->validate([
            'kode_arsip_karyawan' => 'required',
            'id_kategori_arsip' => 'required',
            'id_karyawan' => 'required',
            'id_departemen' => 'required',
            'retensi_arsip' => 'required',
        ]);

        $item = ArsipKaryawan::findOrFail($id);

        if ($request->file('file_arsip_karyawan')) {
            $validatedData['file_arsip_karyawan'] = $request->file('file_arsip_karyawan')->store('assets/file-arsip-karyawan');
        }

        $item->update($validatedData);

        return redirect()
            ->route('arsip-karyawan.index')
            ->with('success', 'Sukses! 1 Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ArsipKaryawan::findorFail($id);

        $item->delete();

        return redirect()
            ->route('arsip-karyawan.index')
            ->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }
}
