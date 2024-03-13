<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

use App\Models\PenerimaSurat;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class PenerimaSuratController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = PenerimaSurat::latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#updateModal' . $item->id_penerima_surat . '">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                        <form action="' . route('penerima.destroy', $item->id_penerima_surat) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini dari situs anda?'" . ')">
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
        $receiver = PenerimaSurat::all();

        return view('pages.admin.penerima.index', [
            'receiver' => $receiver
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_penerima_surat' => 'required',
        ]);

        PenerimaSurat::create($validatedData);

        $penerima = User::where('level', 'admin')
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => auth()->user()->nama_lengkap . ' menambahkan data penerima surat baru<br>Nama Pengirim: ' . $request->nama_penerima_surat,
                'url' => route('penerima.index'),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()
            ->route('penerima.index')
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
            'nama_penerima_surat' => 'required',
        ]);

        PenerimaSurat::where('id_penerima_surat', $id)
            ->update($validatedData);

        $penerima = User::where('level', 'admin')
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => auth()->user()->nama_lengkap . ' melakukan perubahan data penerima surat',
                'url' => route('penerima.index'),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }


        return redirect()
            ->route('penerima.index')
            ->with('success', 'Sukses! 1 Data Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $item = PenerimaSurat::findorFail($id);

        $penerima = User::where('level', 'admin')
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => auth()->user()->nama_lengkap . ' menghapus data penerima surat ' . $item->nama_penerima_surat,
                'url' => route('penerima.index'),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $item->delete();

        return redirect()
            ->route('penerima.index')
            ->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }
}
