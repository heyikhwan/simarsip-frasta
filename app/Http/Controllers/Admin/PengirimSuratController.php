<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PengirimSurat;

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

        return redirect()
            ->route('pengirim.index')
            ->with('success', 'Sukses! 1 Data Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $item = PengirimSurat::findorFail($id);

        $item->delete();

        return redirect()
            ->route('pengirim.index')
            ->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }
}
