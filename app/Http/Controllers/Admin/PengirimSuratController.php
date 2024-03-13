<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

use App\Models\PengirimSurat;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class PengirimSuratController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = PengirimSurat::latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#updateModal' . $item->id_pengirim_surat . '">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                        <form action="' . route('pengirim.destroy', $item->id_pengirim_surat) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini dari situs anda?'" . ')">
                            ' . method_field('delete') . csrf_field() . '
                            <button class="btn btn-danger btn-xs">
                                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                            </button>
                        </form>
                    ';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action'])
                ->make();
        }
        $pengirim = PengirimSurat::all();

        return view('pages.admin.pengirim.index', [
            'pengirim' => $pengirim
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pengirim_surat' => 'required',

        ]);

        PengirimSurat::create($validatedData);

        $penerima = User::where('level', 'admin')
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => auth()->user()->nama_lengkap . ' menambahkan data pengirim surat baru<br>Nama Pengirim: ' . $request->nama_pengirim_surat,
                'url' => route('pengirim.index'),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()
            ->route('pengirim.index')
            ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_pengirim_surat' => 'required',

        ]);

        PengirimSurat::where('id_pengirim_surat', $id)
            ->update($validatedData);

        $penerima = User::where('level', 'admin')
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => auth()->user()->nama_lengkap . ' melakukan perubahan data pengirim surat',
                'url' => route('pengirim.index'),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()
            ->route('pengirim.index')
            ->with('success', 'Sukses! 1 Data Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $item = PengirimSurat::findorFail($id);

        $penerima = User::where('level', 'admin')
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => auth()->user()->nama_lengkap . ' menghapus data pengirim surat ' . $item->nama_pengirim_surat,
                'url' => route('pengirim.index'),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $item->delete();

        return redirect()
            ->route('pengirim.index')
            ->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }
}
