<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Notifikasi;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Karyawan::latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                <a class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#updateModal' . $item->id_karyawan . '">
                <i class="fas fa-search"></i> &nbsp; Detail
                </a>
                <form action="' . route('employee.destroy', $item->id_karyawan) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini dari situs anda?'" . ')">
                ' . method_field('delete') . csrf_field() . '
                <button class="btn btn-danger btn-xs">
                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                </button>
                </form>
                ';
                })
                ->addIndexColumn()
                ->removeColumn('id_karyawan')
                ->rawColumns(['action'])
                ->make();
        }
        $employees = Karyawan::all();

        return view('pages.admin.employee.index', [
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_karyawan' => 'required',
            'nik' => 'required|unique:karyawan,nik',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'email' => 'required|email|unique:karyawan,email',
            'status_karyawan' => 'required',
            'pendidikan_terakhir' => 'required',
        ]);

        Karyawan::create($validatedData);

        $penerima = User::where('level', 'admin')
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => auth()->user()->nama_lengkap . ' menambahkan karyawan baru<br>Nama Karyawan: ' . $request->nama_karyawan,
                'url' => route('employee.index'),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()
            ->route('employee.index')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_karyawan)
    {
        $karyawan = Karyawan::find($id_karyawan);
        // dd($karyawan);
        $validatedData = $request->validate([
            'nama_karyawan' => 'required',
            'nik' => 'required|unique:karyawan,nik,' . $karyawan->id_karyawan . ',id_karyawan',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'email' => 'required|email|unique:karyawan,email,' . $karyawan->id_karyawan . ',id_karyawan',
            'status_karyawan' => 'required',
            'pendidikan_terakhir' => 'required',
        ]);

        Karyawan::where('id_karyawan', $id_karyawan)->update($validatedData);

        $penerima = User::where('level', 'admin')
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => auth()->user()->nama_lengkap . ' melakukan perubahan data karyawan',
                'url' => route('employee.index'),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()
            ->route('employee.index')
            ->with('success', 'Sukses! 1 Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Karyawan::findorFail($id);

        $penerima = User::where('level', 'admin')
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => auth()->user()->nama_lengkap . ' menghapus karyawan ' . $item->nama_karyawan,
                'url' => route('employee.index'),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $item->delete();

        return redirect()
            ->route('employee.index')
            ->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }
}
