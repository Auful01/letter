<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use App\Models\Kategori;
use App\Models\Skbm;
use App\Models\Sktm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class SuratController extends Controller
{
    public function store(Request $request)
    {
        // return $request;
        $sktm = Sktm::create($request->all());
        // $pdf = PDF::loadView('report', $sktm);
        $pdf = PDF::loadView('pdf.invoice-order', ['data' => $sktm])->setPaper("A4", "portrait");
        $filename = $sktm[0]->nama_pengaju . '-order_id-' . $sktm[0]->nomer_surat .  '.pdf';
        $sktm->filename = $filename;
        $sktm->save();
        Storage::put('public/surat/' . $filename, $pdf->output());
        return redirect()->route('rekap-sktm');
    }

    public function loadSktm()
    {
        $sktm = Sktm::all();
        return view('sekretaris.rekap.rekap-sktm', ['sktm' => $sktm]);
    }

    public function update(Request $request)
    {
        $sktm = Sktm::find($request->id)->first();
        $sktm->nomer_surat = $request->nomer_surat;
        $sktm->pembuat = $request->pembuat;
        $sktm->tanggal_pembuatan = $request->tanggal_pembuatan;
        $sktm->nama_pengaju = $request->nama_pengaju;
        $sktm->jenis_kelamin = $request->jenis_kelamin;
        $sktm->agama = $request->agama;
        $sktm->ttl = $request->ttl;
        $sktm->nik = $request->nik;
        $sktm->ktp = $request->ktp;
        $sktm->pekerjaan = $request->pekerjaan;
        $sktm->pendidikan = $request->pendidikan;
        $sktm->status = $request->status;
        $sktm->alamat = $request->alamat;
        $sktm->keperluan = $request->keperluan;
        $sktm->keterangan = $request->keterangan;
        $sktm->save();

        return $sktm;
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

    public function loadKategori()
    {
        $data = Kategori::all();
        return $data;
    }

    public function getLastSkbm()
    {
        $skbm = Skbm::all()->last();
        return $skbm;
    }

    public function saveSkbm(Request $request)
    {
        // return $request;
        $data = Identitas::create($request->all());

        $filename = $request->file('file')->getClientOriginalName();

        if ($request->file('file')) {
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        Skbm::create([
            'identitas_id' => $data->id,
            'nomer_surat' => $request->nomer_surat,
            'tujuan' => $request->tujuan,
            'perlu' => $request->perlu,
            'sk_rtrw' => $filename,
            'berlaku_mulai' => $request->berlaku,
            'berlaku_sampai' => $request->sampai,
            'ttd' => $request->ttd
        ]);
    }


    public function findSkbm(Request $request)
    {
        $data = Skbm::where('nomer_surat', '=', $request->nosurat)->firstOrFail();
        return $data;
    }

    public function findCategory(Request $request)
    {
        $kategori =  Kategori::where('id', '=', $request->kategori)->firstOrFail();
        return $kategori;
    }

    public function loadArsipSurat(Request $request)
    {
        // return $data;
        if ($request->ajax()) {
            $data = DB::select('SELECT skbm.nomer_surat as skbm_id ,kategori.nama_kategori as kategori, identitas.kategori_id as kategori_id, identitas.nomer_surat as nomer_surat,  identitas.nama as nama, identitas.created_at as created_at, identitas.nomer_surat as nomer_surat, skbm.ttd as ttd  FROM identitas INNER JOIN kategori ON kategori.id = identitas.kategori_id INNER JOIN skbm ON skbm.identitas_id = identitas.id  ');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a data-kategori="' . $row->kategori_id . '" data-nosurat="' . $row->nomer_surat . '"  class="btn btn-xs btn-primary edit-surat"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
