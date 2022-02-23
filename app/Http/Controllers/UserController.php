<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Alert;

class UserController extends Controller
{
    public function loadJabatan()
    {
        $jabatan = DB::table('jabatan')->select('*')->get();
        return $jabatan;
    }

    public function dataAnggota()
    {
        $usera = Profile::with('user')->where('status_akun', '=', 'aktif')->get();
        $userb = Profile::with('user')->where('status_akun', '=', 'tidak aktif')->get();
        // $user = User::all();
        return view('sekretaris.keanggotaan.data-anggota', ["usera" => $usera, 'userb' => $userb]);
    }

    public function registerAnggota(Request $request)
    {
        // return $request;
        $user = User::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'username' => $request->username,
            'jabatan_id' => $request->jabatan,
            'password' => Hash::make('12345678'),
        ]);

        $filename = $request->file('file')->getClientOriginalName();
        if ($request->file('file')) {
            $request->file('file')->storeAs('profile', $filename, 'public');
        }

        $profile =  Profile::create([
            'user_id' => $user->id,
            'alamat' => $request->alamat,
            'status_akun' => $request->status_akun,
            'phone' => $request->phone,
            'email' => $request->email,
            'status' => $request->status,
            'foto' => $filename
        ]);
        // Alert::success('Tersimpan', 'anggota baru ditambahkan');
        return $profile;
    }


    public function detailUser(Request $request)
    {
        $user = Profile::with('user', 'user.jabatan')->where('id', '=', $request->id)->get();
        return $user;
    }
}
