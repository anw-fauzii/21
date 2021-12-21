<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;

class ProfileController extends Controller
{
    
    public function editpassword()
    {
        //
        if (Gate::allows('isUserWaiting')) {
            abort(403, 'Anda tidak memiliki cukup hak akses');
        } else {
            return view('profile.password');
        }
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        if (Gate::allows('isUserWaiting')) {
            abort(403, 'Anda tidak memiliki cukup hak akses');
        } else {
           return view('profile.edit'); 
        }
        
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'telp' => 'required|min:6',
            'nama_perusahaan' => 'required|min:3',
            'bidang_usaha' => 'required|min:3',
            'alamat' => 'required|min:3',
            'jabatan' => 'required|min:3',
            ]
        );

        $update = auth()->user()->update($request->all());
        $profile = User::find(auth()->user()->id);
        $profile->completed ='true';
        $profile->save();
        Alert::success('Berhasil', 'Data profil berhasil diperbaharui!');
        return back()->withStatus(__('Profil berhasil diperbaharui.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);
        Alert::success('Berhasil', 'Kata sandi berhasil diperbaharui!');
        return back()->withStatusPassword(__('Kata sandi berhasil diperbaharui.'));
    }
}
