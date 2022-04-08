<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArsipController extends Controller
{
    public function store(Request $request)
    {
        // return $request;
        if ($request->file('file_surat')) {
            $filename = $request->file('file_surat')->getClientOriginalName();
            $request->file('file_surat')->storeAs('file', $filename, 'public');
        } else {
            $filename = ' ';
        }
        Surat::create([
            'user_id' => Auth::user()->id,
            'no_surat' => $request->nomer_surat,
            'perihal' => $request->perihal,
            'tgl_menerima' => $request->tgl_menerima,
            'tgl_surat' => $request->tgl_surat,
            'sifat_surat' => $request->sifat_surat,
            'asal_instansi' => $request->instansi,
            'file_surat' => $filename
        ]);

        return redirect()->route('rekap-arsip');
    }

    public function getArsip()
    {
        $surat = Surat::all();
        return view('sekretaris.arsip.rekap-arsip', ['surat' => $surat]);
    }

    public function detailArsip(Request $request)
    {
        return Surat::find($request->id);
    }

    public function selectedArsip(Request $request)
    {
        $tanggal = $request->tanggal;
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        // return $request->tanggal;
        // $surat_masuk = "SELECT * FROM surat_masuk WHERE DAY(created_at)='" . $request->tanggal . "'  AND MONTH(created_at)= '" . $request->bulan . "'  AND  YEAR(created_at)='" . $request->tahun . "'";
        // $surat_masuk = DB::select("SELECT * FROM surat_masuk WHERE DAY(created_at)='" . $request->tanggal . "'  AND MONTH(created_at)= '" . $request->bulan . "'  AND  YEAR(created_at)='" . $request->tahun . "'");
        if ($request->tanggal != null && $request->bulan != null && $request->tahun != null) {
            $surat_masuk = DB::select('SELECT * FROM surat_masuk WHERE DAY(created_at)=' . $request->tanggal . ' AND MONTH(created_at)=' . $request->bulan . ' AND  YEAR(created_at)=' . $request->tahun);
        } elseif ($bulan != null && $tahun != null) {
            $surat_masuk = DB::select('SELECT * FROM surat_masuk WHERE MONTH(created_at)=' . $request->bulan . ' AND  YEAR(created_at)=' . $request->tahun);
        } elseif ($tanggal != null && $tahun != null) {
            $surat_masuk = DB::select('SELECT * FROM surat_masuk WHERE DAY(created_at)=' . $request->tanggal . ' AND YEAR(created_at)=' . $request->tahun);
        } elseif ($bulan != null && $tanggal != null) {
            $surat_masuk = DB::select('SELECT * FROM surat_masuk WHERE DAY(created_at)=' . $request->tanggal . ' AND MONTH(created_at)=' . $request->bulan);
        } elseif ($tanggal != null) {
            $surat_masuk = DB::select('SELECT * FROM surat_masuk WHERE DAY(created_at)=' . $request->tanggal);
        } elseif ($bulan != null) {
            $surat_masuk = DB::select('SELECT * FROM surat_masuk WHERE MONTH(created_at)=' . $request->bulan);
        } elseif ($tahun != null) {
            $surat_masuk = DB::select('SELECT * FROM surat_masuk WHERE YEAR(created_at)=' . $request->tahun);
        } else {
            $surat_masuk = DB::select('SELECT * FROM surat_masuk ');
        }

        return $surat_masuk;
        // return view('sekretaris.rekap.rekap-surat_masuk', ['surat_masuk' => $surat_masuk]);
    }
}
