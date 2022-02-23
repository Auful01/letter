<?php

namespace App\Http\Controllers;

use App\Models\Sktm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class SuratController extends Controller
{
    public function store(Request $request)
    {
        // return $request;
        Sktm::create($request->all());
        return redirect()->route('rekap-sktm');
    }

    public function loadSktm()
    {
        $sktm = Sktm::all();
        return view('sekretaris.rekap.rekap-sktm', ['sktm' => $sktm]);
    }

    public function selectedDate(Request $request)
    {
        $tanggal = $request->tanggal;
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        // return $request->tanggal;
        // $sktm = "SELECT * FROM sktm WHERE DAY(created_at)='" . $request->tanggal . "'  AND MONTH(created_at)= '" . $request->bulan . "'  AND  YEAR(created_at)='" . $request->tahun . "'";
        // $sktm = DB::select("SELECT * FROM sktm WHERE DAY(created_at)='" . $request->tanggal . "'  AND MONTH(created_at)= '" . $request->bulan . "'  AND  YEAR(created_at)='" . $request->tahun . "'");
        if ($request->tanggal != null && $request->bulan != null && $request->tahun != null) {
            $sktm = DB::select('SELECT * FROM sktm WHERE DAY(created_at)=' . $request->tanggal . ' AND MONTH(created_at)=' . $request->bulan . ' AND  YEAR(created_at)=' . $request->tahun);
        } elseif ($bulan != null && $tahun != null) {
            $sktm = DB::select('SELECT * FROM sktm WHERE MONTH(created_at)=' . $request->bulan . ' AND  YEAR(created_at)=' . $request->tahun);
        } elseif ($tanggal != null && $tahun != null) {
            $sktm = DB::select('SELECT * FROM sktm WHERE DAY(created_at)=' . $request->tanggal . ' AND YEAR(created_at)=' . $request->tahun);
        } elseif ($bulan != null && $tanggal != null) {
            $sktm = DB::select('SELECT * FROM sktm WHERE DAY(created_at)=' . $request->tanggal . ' AND MONTH(created_at)=' . $request->bulan);
        } elseif ($tanggal != null) {
            $sktm = DB::select('SELECT * FROM sktm WHERE DAY(created_at)=' . $request->tanggal);
        } elseif ($bulan != null) {
            $sktm = DB::select('SELECT * FROM sktm WHERE MONTH(created_at)=' . $request->bulan);
        } elseif ($tahun != null) {
            $sktm = DB::select('SELECT * FROM sktm WHERE YEAR(created_at)=' . $request->tahun);
        } else {
            $sktm = DB::select('SELECT * FROM sktm ');
        }

        return $sktm;
        // return view('sekretaris.rekap.rekap-sktm', ['sktm' => $sktm]);
    }

    public function detailSurat(Request $request)
    {
        return Sktm::find($request->id);
    }

    public function hapusSurat(Request $request)
    {
        return Sktm::find($request->id)->delete();
    }

    public function printPDF($id)
    {
        $sktm = Sktm::find($id);
        $data = [
            'title' => 'Testimoni',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('report', $data);

        return $pdf->download($sktm->nomer_surat . '.pdf');
    }
}
