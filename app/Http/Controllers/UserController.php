<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Alert;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function loadJabatan()
    {
        $jabatan = DB::table('jabatan')->select('*')->get();
        return $jabatan;
    }

    public function loadKategori()
    {
        $kat = Kategori::all();
        return $kat;
    }

    public function loadProfile()
    {
        return Profile::with('user')->where('user_id', '=', Auth::user()->id)->first();
    }

    public function updateProfile(Request $request)
    {
        $profile = Profile::with('user')->where('user_id', '=', Auth::user()->id)->first();
        $user = User::find($profile->user_id);
        $filename = $profile->foto;

        if ($request->file('foto')) {
            Storage::delete('public/profile/' . $filename);
            $file = $request->file('foto');
            $filename = $file->getClientOriginalName();
            $request->file('foto')->storeAs('profile', $filename, 'public');
        } else {
            $filename = $profile->foto;
        }
        $nama_belakang = str_word_count($request->nama) < 2 ? ' ' : explode(' ', $request->nama, 2)[1];
        $profile->foto = $filename;
        $user->nama_depan = explode(' ', $request->nama)[0];
        $user->nama_belakang = $nama_belakang;
        $profile->alamat = $request->alamat;
        $user->save();
        return $profile->save();

        // return Profile::with('user')->where('user_id', '=', Auth::user()->id)->update($request->all());
    }

    public function dataAnggota()
    {
        $usera = Profile::with('user')->get();
        // $user = User::all();
        return view('sekretaris.keanggotaan.data-anggota', ["usera" => $usera]);
    }

    public function registerAnggota(Request $request)
    {
        $user = User::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'username' => $request->username,
            'jabatan_id' => $request->jabatan,
            'password' => $request->password == null || $request->password == '' ? Hash::make('12345678') : Hash::make($request->password),
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

    public function hapusUser(Request $request)
    {
        $profil = Profile::where('id', '=', $request->id)->first();
        User::where('id', '=', $profil->user_id)->delete();
        return Profile::where('id', '=', $request->id)->delete();
    }

    public function profile()
    {
        $user = Profile::with('user', 'user.jabatan')->where('user_id', '=', Auth::user()->id)->first();
        return view('sekretaris.profile', ['user' => $user]);
    }
}
