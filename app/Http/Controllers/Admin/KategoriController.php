<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Notifikasi;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Kategori::latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                <a class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#updateModal' . $item->id_kategori_arsip . '">
                <i class="fas fa-edit"></i> &nbsp; Ubah
                </a>
                <form action="' . route('kategori.destroy', $item->id_kategori_arsip) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini dari situs anda?'" . ')">
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
        $categories = Kategori::all();

        return view('pages.admin.kategori.index', [
            'categories' => $categories
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
            'nama_kategori_arsip' => 'required',
        ]);

        Kategori::create($validatedData);

        $penerima = User::where('level', 'admin')
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => auth()->user()->nama_lengkap . ' menambahkan data kategori arsip baru<br>Kategori Arsip: ' . $request->nama_kategori_arsip,
                'url' => route('kategori.index'),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()
            ->route('kategori.index')
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
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kategori_arsip' => 'required',
        ]);


        Kategori::where('id_kategori_arsip', $id)
            ->update($validatedData);

        $penerima = User::where('level', 'admin')
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => auth()->user()->nama_lengkap . ' melakukan perubahan data kategori arsip',
                'url' => route('kategori.index'),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()
            ->route('kategori.index')
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
        $item = Kategori::findorFail($id);

        $penerima = User::where('level', 'admin')
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => auth()->user()->nama_lengkap . ' menghapus data kategori arsip ' . $item->nama_kategori_arsip,
                'url' => route('kategori.index'),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $item->delete();

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }
}
