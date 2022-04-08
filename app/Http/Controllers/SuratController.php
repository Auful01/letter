<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use App\Models\Kategori;
use App\Models\Skbm;
use App\Models\Skl;
use App\Models\Sktm;
use App\Models\Surat;
use App\Models\User;
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
        // return $request;
        // $data = Sktm::all();
        return Surat::where('id', '=', $request->id)->delete();
        // return $data;
    }


    public function loadTtd()
    {
        $user = DB::select('SELECT * FROM users WHERE jabatan_id = 1 OR jabatan_id = 2');
        // $user = User::with('jabatan')->where('jabatan_id', '=', ['1', '2'])->get();
        return $user;
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
    public function getLastSkl()
    {
        $skl = Skl::all()->last();
        return $skl;
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

    public function saveSkl(Request $request)
    {
        // return $request;
        $data = Identitas::create($request->all());

        $filename = $request->file('file')->getClientOriginalName();

        if ($request->file('file')) {
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        Skl::create([
            'identitas_id' => $data->id,
            'nomor_surat' => $request->nomer_surat,
            'tujuan' => $request->tujuan,
            'perlu' => $request->perlu,
            // 'alamat' => $request->alamat,
            'sk_rtrw' => $filename,
            'berlaku_mulai' => $request->berlaku,
            'berlaku_sampai' => $request->sampai,
            'keterangan' => $request->keterangan,
            'ttd' => $request->ttd
        ]);
    }

    public function reportPrint(Request $request)
    {
        // return $request;
        $data = DB::select('SELECT * FROM identitas WHERE kategori_id = ' . $request->kategoriSurat . ' AND DATE_FORMAT(created_at,"%Y-%m-%d") BETWEEN "' . $request->dari . '" AND "' . $request->sampai . '"');
        // return $data;
        return view('report-all', ['data' => $data, 'dari' => $request->dari, 'sampai' => $request->sampai]);
    }

    public function findSkbm(Request $request)
    {
        $data = Skbm::with('identitas')->where('nomer_surat', '=', $request->nosurat)->firstOrFail();
        return $data;
    }

    public function findSkl(Request $request)
    {
        $data = Skl::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
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
            $data = DB::select('SELECT identitas.nomer_surat as nomer_surat ,kategori.nama_kategori as kategori, identitas.kategori_id as kategori_id, identitas.nomer_surat as nomer_surat,  identitas.nama as nama, identitas.created_at as created_at, identitas.nomer_surat as nomer_surat  FROM identitas INNER JOIN kategori ON kategori.id = identitas.kategori_id   ');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('ttd', function ($row) {
                    $kategori = Kategori::where('id', '=', $row->kategori_id)->firstOrFail();
                    switch ($kategori->link) {
                        case 'form-skbm':
                            $data = Skbm::with('identitas')->where('nomer_surat', '=', $row->nomer_surat)->firstOrFail();
                            return '<p>' . $data->ttd . '</p>';
                            break;
                        case 'form-skl':
                            $data = Skl::with('identitas')->where('nomor_surat', '=', $row->nomer_surat)->firstOrFail();
                            return '<p>' . $data->ttd . '</p>';
                            break;

                        default:

                            break;
                    }
                })
                ->addColumn('action', function ($row) {
                    $kategori = Kategori::where('id', '=', $row->kategori_id)->firstOrFail();
                    return '<a data-kategori="' . $row->kategori_id . '" data-nosurat="' . $row->nomer_surat . '"  class="btn btn-xs btn-primary edit-surat"><i class="glyphicon glyphicon-edit"></i> Edit</a>  <button class="btn btn-danger print-surat" data-kategori="' . $row->kategori_id . '" data-nosurat="' . $row->nomer_surat . '">print</button>';
                })
                ->rawColumns(['ttd', 'action'])
                ->make(true);
        }
    }


    public function printSkbm(Request $request)
    {

        $skbm = Skbm::with('identitas')->where('nomer_surat', '=', $request->nosurat)->firstOrFail();

        return view('report', ['skbm' => $skbm]);
    }
}
