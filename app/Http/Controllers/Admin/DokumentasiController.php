<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Dokumentasi;
use App\Models\Departemen;
use App\Models\Notifikasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Dokumentasi::with('departemen')
                ->leftJoin('users', 'users.id_user', '=', 'arsip_dokumentasi.user_id')
                ->leftJoin('departemen', 'departemen.id_departemen', '=', 'users.id_departemen')
                ->select(
                    'arsip_dokumentasi.*',
                    'users.nama_lengkap',
                    'departemen.nama_departemen',
                )
                ->latest()
                ->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    $button = '
                    <a class="btn btn-success btn-xs" href="' . route('documentation.show', $item->id_arsip_dokumentasi) . '">
                    <i class="fa fa-search-plus"></i> &nbsp; Detail
                    </a>
                    ';

                    if ($item->user_id == auth()->user()->id_user) {
                        $button .= '
                        <a class="btn btn-primary btn-xs" href="' . route('documentation.edit', $item->id_arsip_dokumentasi) . '">
                    <i class="fas fa-edit"></i> &nbsp; Ubah
                    </a>
                    <form action="' . route('documentation.destroy', $item->id_arsip_dokumentasi) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini dari situs anda?'" . ')">
                    ' . method_field('delete') . csrf_field() . '
                    <button type="submit" class="btn btn-danger btn-xs">
                    <i class="far fa-trash-alt"></i> &nbsp; Hapus
                    </button>
                    </form>
                        ';
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

        return view('pages.admin.documentation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Departemen::all();
        $countAD = Dokumentasi::count();
        $codeAD = $this->generateUniqueCode('AD', 0);

        return view('pages.admin.documentation.create', [
            'departments' => $departments,
            'codeAD' => $codeAD,
        ]);
    }

    private function generateUniqueCode($prefix, $count)
    {
        $code = $prefix . str_pad($count + 1, 4, '0', STR_PAD_LEFT);

        // Memeriksa apakah kode sudah digunakan sebelumnya
        if (Dokumentasi::where('kode_arsip_dokumentasi', $code)->exists()) {
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
        $validatedData = $request->validate([
            'kode_arsip_dokumentasi' => 'required|unique:arsip_dokumentasi,kode_arsip_dokumentasi',
            'id_departemen' => 'required',
            'tanggal_dokumentasi' => 'required',
            'id_karyawan' => 'required',
            'keterangan' => 'required',
            'file_arsip_dokumentasi' => 'required|mimes:jpg,png|file',
        ]);

        if ($request->file('file_arsip_dokumentasi')) {
            $validatedData['file_arsip_dokumentasi'] = $request->file('file_arsip_dokumentasi')->store('assets/file-arsip-dokumentasi');
        }

        $validatedData['user_id'] = auth()->user()->id_user;

        $dokumentasi = Dokumentasi::create($validatedData);

        $penerima = User::where('level', 'karyawan')
            ->orWhere('level', 'manajer')
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => 'Ada arsip dokumentasi baru<br>Kode: ' . $dokumentasi->kode_arsip_dokumentasi . '<br>Keterangan: Arsip Dokumentasi dibuat oleh ' . auth()->user()->nama_lengkap,
                'url' => route('arsip-dokumentasi.show', $dokumentasi->id_arsip_dokumentasi),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()
            ->route('documentation.index')
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
        $item = Dokumentasi::with('departemen')->findOrFail($id);

        return view('pages.admin.documentation.show', [
            'item' => $item,
        ]);
    }

    public function download_archive($id)
    {
        $item = Dokumentasi::findOrFail($id);

        return Storage::download($item->file_arsip_dokumentasi);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Dokumentasi::findOrFail($id);

        $departments = Departemen::all();

        return view('pages.admin.documentation.edit', [
            'departments' => $departments,
            'item' => $item
        ]);
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
        $request->merge(['id_karyawan' => auth()->user()->id_user]);

        $validatedData = $request->validate([
            'kode_arsip_dokumentasi' => 'required',
            'id_departemen' => 'required',
            'tanggal_dokumentasi' => 'required',
            'keterangan' => 'required'
        ]);

        $item = Dokumentasi::findOrFail($id);

        if ($request->file('file_arsip_dokumentasi')) {
            $validatedData['file_arsip_dokumentasi'] = $request->file('file_arsip_dokumentasi')->store('assets/file-arsip-dokumentasi');
        }
        $validatedData['id_karyawan'] = Auth::user()->id_user;
        $item->update($validatedData);

        $penerima = User::where('level', 'karyawan')
            ->orWhere('level', 'manajer')
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => 'Ada perubahan arsip dokumentasi<br>Kode: ' . $item->kode_arsip_dokumentasi . '<br>Keterangan: Arsip Dokumentasi diubah oleh ' . auth()->user()->nama_lengkap,
                'url' => route('arsip-dokumentasi.show', $item->id_arsip_dokumentasi),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()
            ->route('documentation.index')
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
        $item = Dokumentasi::findorFail($id);

        $penerima = User::where('level', 'karyawan')
            ->orWhere('level', 'manajer')
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => auth()->user()->nama_lengkap . ' menghapus arsip dokumentasi<br>Kode: ' . $item->kode_arsip_dokumentasi,
                'url' => route('arsip-dokumentasi.index'),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $item->delete();

        return redirect()
            ->route('documentation.index')
            ->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }
}
