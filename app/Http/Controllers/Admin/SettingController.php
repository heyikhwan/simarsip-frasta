<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Avatar;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $avatar = Avatar::all();

        return view('pages.admin.user.profile', [
            'user' => $user,
            'avatar' => $avatar
        ]);
    }


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function upload_profile(Request $request)
    {
        $request->validate([
            'profile' => 'nullable|image|file|max:5120',
        ], [
            'profile.max' => ':attribute maksimal 5 MB',
        ]);

        $item = User::findOrFail(auth()->user()->id_user);

        if ($request->hasFile('profile')) {
            if (Storage::exists($item->profile)) {
                Storage::delete($item->profile);
            }

            $item->profile = $request->file('profile')->store('assets/profile-images');
        } else {
            if ($request->has('avatar')) {
                // delete old file
                if (Storage::exists($item->profile)) {
                    Storage::delete($item->profile);
                }

                // save new file with new name
                $name = Str::slug(microtime(true));
                // get avatar from latest .
                $extension = substr($request->avatar, strrpos($request->avatar, '.') + 1);
                $name .= '.' . $extension;

                // copy file from $request->avatar to storage folder
                Storage::putFileAs('assets/profile-images', 'storage/' . $request->avatar, $name);
                $item->profile = 'assets/profile-images/' . $name;
            }
        }

        $item->save();

        return redirect()
            ->back()
            ->with('success', 'Sukses! Photo Pengguna telah diperbarui');
    }

    public function change_password()
    {
        return view('pages.admin.user.change-password');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['min:5', 'max:255'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id_user)->update(['password' => Hash::make($request->new_password)]);

        return redirect()
            ->route('change-password')
            ->with('success', 'Sukses! Password telah diperbarui');
    }

    public function read_notification(Request $request)
    {
        $data = json_decode($request->notif);

        foreach ($data as $value) {
            Notifikasi::where('id_notifikasi', $value->id_notifikasi)->update(['read_at' => date('Y-m-d H:i:s')]);
        }

        return response()->json(['success' => true]);
    }
}
