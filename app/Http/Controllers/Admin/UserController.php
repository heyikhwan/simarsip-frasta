<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

use App\Models\User;
use App\Models\Departemen;

class UserController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = User::with('departemen')->latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                <a class="btn btn-primary btn-xs" href="' . route('user.edit', $item->id_user) . '">
                <i class="fas fa-edit"></i> &nbsp; Ubah
                </a>
                <form action="' . route('user.destroy', $item->id_user) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini secara permanen dari situs anda?'" . ')">
                ' . method_field('delete') . csrf_field() . '
                <button class="btn btn-danger btn-xs">
                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                </button>
                </form>
                ';
                })
                ->editColumn('name', function ($item) {
                    return $item->profile ?
                        '<div class="d-flex align-items-center">
                <div class="avatar me-2"><img class="avatar-img img-fluid" src="' . url('storage/' . $item->profile) . '" /></div>' .
                        $item->nama_lengkap . '
                </div>'
                        :
                        '<div class="d-flex align-items-center">
                <div class="avatar me-2"><img class="avatar-img img-fluid" src="https://ui-avatars.com/api/?name=' . $item->nama_lengkap . '" /></div>' .
                        $item->nama_lengkap . '
                </div>';
                })
                ->addIndexColumn()
                ->removeColumn('id_user')
                ->rawColumns(['action', 'name'])
                ->make();
        }
        return view('pages.admin.user.index');
    }

    public function create()
    {
        $departemen = Departemen::get();
        return view('pages.admin.user.create', [
            'department' => $departemen
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'level' => 'required',
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['id_departemen'] = $request->id_departemen;
        $validatedData['password'] = Hash::make($validatedData['password']);
        // dd($validatedData);
        User::create($validatedData);

        return redirect()
            ->route('user.index')
            ->with('success', 'Sukses! Data Pengguna Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $departemen = Departemen::get();
        return view('pages.admin.user.index', [
            'user' => $user,
            'department' => $departemen
        ]);
    }

    public function edit($id)
    {
        $item = User::findOrFail($id);
        $departemen = Departemen::get();
        return view('pages.admin.user.edit', [
            'item' => $item,
            'department' => $departemen
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'email' => 'required|email:dns',
            'password' => 'nullable|min:5|max:255',
        ]);

        // Periksa apakah email berubah
        if ($validatedData['email'] === $user->email) {
            // Jika email tidak berubah, hapus validasi unik untuk email
            unset($validatedData['email']);
        }

        // Jika password diisi, hash password baru
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            // Jika password tidak diisi, hapus kunci password dari $validatedData
            unset($validatedData['password']);
        }


        $validatedData['id_departemen'] = $request->id_departemen;

        $user->update($validatedData);

        $route = 'user.index';
        switch (Auth::user()->level) {
            case 'karyawan':
            case 'manajer':
                $route = 'setting.index';
                break;

            default:
                break;
        }


        return redirect()
            ->route($route)
            ->with('success', 'Sukses! Data Pengguna telah diperbarui');
    }

    public function destroy($id)
    {
        $item = User::findorFail($id);

        Storage::delete($item->profile);

        $item->delete();

        return redirect()
            ->route('user.index')
            ->with('success', 'Sukses! Data Pengguna telah dihapus');
    }

    public function upload_profile(Request $request)
    {
        $validatedData = $request->validate([
            'profile' => 'required|image|file|max:1024',
        ]);

        $id = $request->id_user;
        $item = User::findOrFail($id);

        //dd($item);

        if ($request->file('profile')) {
            Storage::delete($item->profile);
            $item->profile = $request->file('profile')->store('assets/profile-images');
        }

        $item->save();

        return redirect()
            ->route('user.index')
            ->with('success', 'Sukses! Photo Pengguna telah diperbarui');
    }

    public function change_password()
    {
        return view('pages.admin.user.change-password');
    }
}
