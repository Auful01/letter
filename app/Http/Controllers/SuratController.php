<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use App\Models\Kategori;
use App\Models\Ortu;
use App\Models\Sk;
use App\Models\Skbm;
use App\Models\Skck;
use App\Models\Skdu;
use App\Models\Skik;
use App\Models\Skiu;
use App\Models\Skl;
use App\Models\Skn;
use App\Models\Skpm;
use App\Models\Skpn;
use App\Models\Sktm;
use App\Models\Sp;
use App\Models\Spm;
use App\Models\Surat;
use App\Models\Umkm;
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

    // GET LAST
    public function getLastSkbm()
    {
        $skbm = Skbm::all()->last();
        return $skbm;
    }

    public function getLastUmkm()
    {
        $umkm = Umkm::all()->last();
        return $umkm;
    }

    public function getLastSkl()
    {
        $skl = Skl::all()->last();
        return $skl;
    }
    public function getLastSkck()
    {
        $skck = Skck::all()->last();
        return $skck;
    }
    public function getLastSkik()
    {
        $skik = Skik::all()->last();
        return $skik;
    }
    public function getLastSktm()
    {
        $skik = Sktm::all()->last();
        return $skik;
    }
    public function getLastSkiu()
    {
        $skiu = Skiu::all()->last();
        return $skiu;
    }
    public function getLastSp()
    {
        $sp = Sp::all()->last();
        return $sp;
    }
    public function getLastSkpn()
    {
        $skpn = Skpn::all()->last();
        return $skpn;
    }
    public function getLastSkpm()
    {
        $skpm = Skpm::all()->last();
        return $skpm;
    }
    public function getLastSk()
    {
        $sk = Sk::all()->last();
        return $sk;
    }

    public function getLastSkn()
    {
        $skn = Skn::all()->last();
        return $skn;
    }

    public function getLastSkdu()
    {
        $skn = Skdu::all()->last();
        return $skn;
    }

    public function getLastSpm()
    {
        $spm = Spm::all()->last();
        return $spm;
    }


    // SAVE N UPDATE LETTERS
    public function saveSkbm(Request $request)
    {
        // return $request;
        $data = Identitas::create($request->all());
        $ttd = User::where('id', '=', $request->ttd)->first();
        $userttd = $ttd->nama_depan . ' ' . $ttd->nama_belakang;
        $data->ttd = $userttd;
        $data->save();

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
            'ttd' => $userttd
        ]);
    }

    public function saveSktm(Request $request)
    {
        $data = Identitas::create($request->all());

        $filename = $request->file('file')->getClientOriginalName();

        if ($request->file('file')) {
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        $sktm = Sktm::create([
            'identitas_id' => $data->id,
            'nomor_surat' => $request->nomer_surat,
            'tujuan' => $request->tujuan,
            'perlu' => $request->perlu,
            'sk_rtrw' => $filename,
            'berlaku_dari' => $request->berlaku,
            'berlaku_sampai' => $request->sampai,
            'ttd' => $request->ttd
        ]);

        if ($sktm) {
            return $sktm;
        } else {
            return Identitas::where('id', '=', $data->id)->delete();
        }
    }

    public function updateIdentity($request)
    {
        $data = Identitas::find($request->id);
        $data->nama = $request->nama;
        $data->nik = $request->nik;
        $data->nkk = $request->nkk;
        $data->ttl = $request->ttl;
        $data->agama = $request->agama;
        $data->kelamin = $request->kelamin;
        $data->kebangsaan = $request->kebangsaan;
        $data->status_kawin = $request->status_kawin;
        $data->pekerjaan = $request->pekerjaan;
        $data->pendidikan = $request->pendidikan;
        $data->alamat = $request->alamat;
        $data->nomer_surat = $request->nomer_surat;
        $data->ttd = $request->ttd;
        return $data->save();
    }

    public function updateSkbm(Request $request)
    {
        // return $request;
        $skbm = Skbm::with('identitas')->where('identitas_id', '=', $request->id)->first();
        // return $skbm;
        $filename = $skbm->sk_rtrw;

        if ($request->file('file')) {
            Storage::delete('public/sk_rtrw/' . $request->sk_rtrw);
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }


        $this->updateIdentity($request);
        $skbm->nomer_surat = $request->nomer_surat;
        $skbm->tujuan = $request->tujuan;
        $skbm->perlu = $request->perlu;
        $skbm->sk_rtrw = $filename;
        $skbm->berlaku_mulai = $request->berlaku;
        $skbm->berlaku_sampai = $request->sampai;
        $skbm->ttd = $request->ttd;
        return $skbm->save();
    }

    public function updateSktm(Request $request)
    {
        $sktm = Sktm::with('identitas')->where('identitas_id', '=', $request->id)->first();
        $filename = $sktm->sk_rtrw;

        if ($request->file('file')) {
            Storage::delete('public/sk_rtrw/' . $request->sk_rtrw);
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        $this->updateIdentity($request);
        $sktm->nomor_surat = $request->nomer_surat;
        $sktm->tujuan = $request->tujuan;
        $sktm->perlu = $request->perlu;
        $sktm->sk_rtrw = $filename;
        $sktm->berlaku_dari = $request->berlaku;
        $sktm->berlaku_sampai = $request->sampai;
        $sktm->ttd = $request->ttd;
        return $sktm->save();
    }

    public function updateUmkm(Request $request)
    {
        // return $request;
        $umkm = Umkm::with('identitas')->where('identitas_id', '=', $request->id)->first();

        // return $umkm;
        $this->updateIdentity($request);
        // $umkm->identitas->nama = $request->nama;
        // $umkm->identitas->alamat = $request->alamat;
        // $umkm->identitas->nomer_surat = $request->nomer_surat;
        // $umkm->identitas->ttd = $request->ttd;
        $umkm->nomor_surat = $request->nomer_surat;
        $umkm->domisili = $request->domisili;
        $umkm->nama = $request->nama;
        $umkm->telepon = $request->telepon;
        $umkm->alamat = $request->alamat;
        $umkm->desa = $request->kelurahan;
        $umkm->kecamatan = $request->kecamatan;
        $umkm->kabupaten = $request->kabupaten;
        $umkm->nama_usaha = $request->nama_usaha;
        $umkm->bidang = $request->bidang;
        $umkm->modal = $request->modal;
        $umkm->sarana = $request->sarana;
        $umkm->alamat_usaha = $request->alamat_usaha;
        $umkm->kelurahan_usaha = $request->kelurahan_usaha;
        $umkm->kecamatan_usaha = $request->kecamatan_usaha;
        $umkm->ttd = $request->ttd;
        return $umkm->save();
    }

    public function updateSkdu(Request $request)
    {
        $skdu = Skdu::with('identitas')->where('identitas_id', '=', $request->id)->first();
        $filename = $skdu->sk_rtrw;

        if ($request->file('file')) {
            Storage::delete('public/sk_rtrw/' . $request->sk_rtrw);
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        $this->updateIdentity($request);
        $skdu->nomor_surat = $request->nomer_surat;
        $skdu->perlu = $request->perlu;
        $skdu->sk_rtrw = $filename;
        $skdu->domisili = $request->domisili;
        $skdu->nomor_surat = $request->nomer_surat;
        $skdu->tanggal_surat = $request->tgl_surat;
        $skdu->kelurahan = $request->kelurahan;
        $skdu->kecamatan = $request->kecamatan;
        $skdu->kabupaten = $request->kabupaten;
        $skdu->nama_usaha = $request->nama_usaha;
        $skdu->bidang = $request->bidang;
        $skdu->alamat_usaha = $request->alamat_usaha;
        $skdu->rtrw = $request->rtrw;
        $skdu->ttd = $request->ttd;
        return $skdu->save();
    }

    public function updateSkn(Request $request)
    {
        $skn = Skn::with('identitas')->where('identitas_id', '=', $request->id)->first();
        $ayah = Ortu::with('skn')->where('skn_id', '=', $skn->id)->first();
        $ibu = Ortu::with('skn')->where('skn_id', '=', $skn->id)->orderBy('id', 'desc')->first();
        $this->updateIdentity($request);
        $skn->nomor_surat = $request->nomer_surat;
        $skn->update($request->all());
        $ayah->status = $request->status_ayah;
        $ayah->domisili = $request->domisili_ayah;
        $ayah->nama = $request->nama_ayah;
        $ayah->bin = $request->bin_ayah;
        $ayah->ttl = $request->ttl_ayah;
        $ayah->agama = $request->agama_ayah;
        $ayah->pekerjaan = $request->pekerjaan_ayah;
        $ayah->alamat  = $request->alamat_ayah;
        $ayah->desa = $request->kelurahan_ayah;
        $ayah->kecamatan = $request->kecamatan_ayah;
        $ayah->kabupaten = $request->kota_ayah;
        $ibu->status = $request->status_ibu;
        $ibu->domisili = $request->domisili_ibu;
        $ibu->nama = $request->nama_ibu;
        $ibu->bin = $request->bin_ibu;
        $ibu->ttl = $request->ttl_ibu;
        $ibu->agama = $request->agama_ibu;
        $ibu->pekerjaan = $request->pekerjaan_ibu;
        $ibu->alamat  = $request->alamat_ibu;
        $ibu->desa = $request->kelurahan_ibu;
        $ibu->kecamatan = $request->kecamatan_ibu;
        $ibu->kabupaten = $request->kota_ibu;
        $ayah->save();
        $ibu->save();
        // $ayah->save();
        // $ibu->save();
        // return $skn->save();
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

    public function updateSkl(Request $request)
    {
        // return $request;
        $skl = Skl::with('identitas')->where('identitas_id', '=', $request->id)->first();
        // return $skl;
        $filename = $skl->sk_rtrw;

        if ($request->file('file')) {
            Storage::delete('public/sk_rtrw/' . $request->sk_rtrw);
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        $this->updateIdentity($request);
        $skl->nomor_surat = $request->nomer_surat;
        $skl->tujuan = $request->tujuan;
        $skl->perlu = $request->perlu;
        $skl->sk_rtrw = $filename;
        $skl->berlaku_mulai = $request->berlaku;
        $skl->berlaku_sampai = $request->sampai;
        $skl->keterangan = $request->keterangan;
        $skl->ttd = $request->ttd;
        // return $skl;
        return $skl->save();
    }


    public function saveSkck(Request $request)
    {
        $data = Identitas::create($request->all());


        $filename = $request->file('file')->getClientOriginalName();

        if ($request->file('file')) {
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        Skck::create([
            'identitas_id' => $data->id,
            'nomor_surat' => $request->nomer_surat,
            'tujuan' => $request->tujuan,
            'perlu' => $request->perlu,
            // 'alamat' => $request->alamat,
            'sk_rtrw' => $filename,
            'berlaku_mulai' => $request->berlaku,
            'berlaku_sampai' => $request->sampai,
            'ttd' => $request->ttd
        ]);
    }

    public function updateSkck(Request $request)
    {
        // return $request;
        $skck = Skck::with('identitas')->where('identitas_id', '=', $request->id)->first();
        $filename = $skck->sk_rtrw;

        if ($request->file('file')) {
            Storage::delete('public/sk_rtrw/' . $request->sk_rtrw);
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        $this->updateIdentity($request);
        $skck->nomor_surat = $request->nomer_surat;
        $skck->tujuan = $request->tujuan;
        $skck->perlu = $request->perlu;
        $skck->sk_rtrw = $filename;
        $skck->berlaku_mulai = $request->berlaku;
        $skck->berlaku_sampai = $request->sampai;
        $skck->ttd = $request->ttd;
        return $skck->save();
    }

    public function saveSkik(Request $request)
    {
        $data = Identitas::create($request->all());


        $filename = $request->file('file')->getClientOriginalName();

        if ($request->file('file')) {
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        Skik::create([
            'identitas_id' => $data->id,
            'nomor_surat' => $request->nomer_surat,
            'tujuan' => $request->tujuan,
            'perlu' => $request->perlu,
            'sk_rtrw' => $filename,
            'berlaku_mulai' => $request->berlaku,
            'berlaku_sampai' => $request->sampai,
            'nama_acara' => $request->nama_acara,
            'tanggal_acara' =>  $request->tgl_acara,
            'ttd' => $request->ttd
        ]);
    }

    public function updateSkik(Request $request)
    {
        // return $request;
        $skik = Skik::with('identitas')->where('identitas_id', '=', $request->id)->first();
        $filename = $skik->sk_rtrw;

        if ($request->file('file')) {
            Storage::delete('public/sk_rtrw/' . $request->sk_rtrw);
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        $this->updateIdentity($request);
        $skik->nomor_surat = $request->nomer_surat;
        $skik->tujuan = $request->tujuan;
        $skik->perlu = $request->perlu;
        $skik->sk_rtrw = $filename;
        $skik->berlaku_mulai = $request->berlaku;
        $skik->berlaku_sampai = $request->sampai;
        $skik->nama_acara = $request->nama_acara;
        $skik->tanggal_acara = $request->tgl_acara;
        $skik->ttd = $request->ttd;
        return $skik->save();
    }


    public function saveSkiu(Request $request)
    {
        $data = Identitas::create($request->all());


        $filename = $request->file('file')->getClientOriginalName();

        if ($request->file('file')) {
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        Skiu::create([
            'identitas_id' => $data->id,
            'nomor_surat' => $request->nomer_surat,
            'tujuan' => $request->tujuan,
            'perlu' => $request->perlu,
            'sk_rtrw' => $filename,
            'berlaku_mulai' => $request->berlaku,
            'berlaku_sampai' => $request->sampai,
            'nama_usaha' => $request->nama_usaha,
            'alamat_usaha' =>  $request->alamat_usaha,
            'ttd' => $request->ttd
        ]);
    }

    public function updateSkiu(Request $request)
    {
        // return $request;
        $skiu = Skiu::with('identitas')->where('identitas_id', '=', $request->id)->first();
        // return $skl;
        $filename = $skiu->sk_rtrw;

        if ($request->file('file')) {
            Storage::delete('public/sk_rtrw/' . $request->sk_rtrw);
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        $this->updateIdentity($request);
        $skiu->nomor_surat = $request->nomer_surat;
        $skiu->tujuan = $request->tujuan;
        $skiu->perlu = $request->perlu;
        $skiu->sk_rtrw = $filename;
        $skiu->berlaku_mulai = $request->berlaku;
        $skiu->berlaku_sampai = $request->sampai;
        $skiu->nama_usaha = $request->nama_usaha;
        $skiu->alamat_usaha = $request->alamat_usaha;
        $skiu->ttd = $request->ttd;
        // return $skl;
        return $skiu->save();
    }

    public function saveSp(Request $request)
    {
        $data = Identitas::create($request->all());


        $filename = $request->file('file')->getClientOriginalName();

        if ($request->file('file')) {
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        Sp::create([
            'identitas_id' => $data->id,
            'nomor_surat' => $request->nomer_surat,
            'tujuan' => $request->tujuan,
            'perlu' => $request->perlu,
            'sk_rtrw' => $filename,
            'berlaku_mulai' => $request->berlaku,
            'berlaku_sampai' => $request->sampai,
            'tgl_sk_rtrw' => $request->tgl_sk_rtrw,
            'ttd' => $request->ttd
        ]);
    }

    public function updateSp(Request $request)
    {
        // return $request;
        $sp = Sp::with('identitas')->where('identitas_id', '=', $request->id)->first();
        // return $skl;
        $filename = $sp->sk_rtrw;

        if ($request->file('file')) {
            Storage::delete('public/sk_rtrw/' . $request->sk_rtrw);
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        $this->updateIdentity($request);
        $sp->nomor_surat = $request->nomer_surat;
        $sp->tujuan = $request->tujuan;
        $sp->perlu = $request->perlu;
        $sp->sk_rtrw = $filename;
        $sp->berlaku_mulai = $request->berlaku;
        $sp->berlaku_sampai = $request->sampai;
        $sp->tgl_sk_rtrw = $request->tgl_sk_rtrw;
        $sp->ttd = $request->ttd;
        // return $skl;
        return $sp->save();
    }

    public function saveSkpn(Request $request)
    {
        $data = Identitas::create($request->all());


        $filename = $request->file('file')->getClientOriginalName();

        if ($request->file('file')) {
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        Skpn::create([
            'identitas_id' => $data->id,
            'nomor_surat' => $request->nomer_surat,
            'alamat_tujuan' => $request->tujuan,
            'kebangsaan' => $request->kebangsaan,
            'perlu' => $request->perlu,
            'sk_rtrw' => $filename,
            'alamat_asal' => $request->alamat_asal,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'tgl_nikah' => $request->tgl_nikah,
            // 'alamat_pindah' => $request->alamat_pindah,
            'ttd' => $request->ttd
        ]);
    }

    public function updateSkpn(Request $request)
    {
        // return $request;
        $data = Skpn::with('identitas')->where('identitas_id', '=', $request->id)->first();
        // return $skl;
        $filename = $data->sk_rtrw;

        if ($request->file('file')) {
            Storage::delete('public/sk_rtrw/' . $request->sk_rtrw);
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        $this->updateIdentity($request);
        $data->nomor_surat = $request->nomer_surat;
        $data->alamat_tujuan = $request->tujuan;
        $data->perlu = $request->perlu;
        $data->sk_rtrw = $filename;
        $data->desa = $request->desa;
        $data->kecamatan = $request->kecamatan;
        $data->kabupaten = $request->kabupaten;
        $data->provinsi = $request->provinsi;
        $data->tgl_nikah = $request->tgl_nikah;

        $data->ttd = $request->ttd;
        // return $skl;
        return $data->save();
    }

    public function saveSkpm(Request $request)
    {
        $data = Identitas::create($request->all());


        $filename = $request->file('file')->getClientOriginalName();

        if ($request->file('file')) {
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        Skpm::create([
            'identitas_id' => $data->id,
            'nomor_surat' => $request->nomer_surat,
            'alamat_asal' => $request->alamat_asal,
            'perlu' => $request->perlu,
            'sk_rtrw' => $filename,
            'berlaku_dari' => $request->berlaku,
            'berlaku_sampai' => $request->sampai,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'tgl_pindah' => $request->tgl_pindah,
            'alamat_pindah' => $request->alamat_pindah,
            'ttd' => $request->ttd
        ]);
    }

    public function updateSkpm(Request $request)
    {
        // return $request;
        $data = Skpm::with('identitas')->where('identitas_id', '=', $request->id)->first();
        // return $skl;
        $filename = $data->sk_rtrw;

        if ($request->file('file')) {
            Storage::delete('public/sk_rtrw/' . $request->sk_rtrw);
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        $this->updateIdentity($request);
        $data->nomor_surat = $request->nomer_surat;
        $data->alamat_asal = $request->alamat_asal;
        $data->perlu = $request->perlu;
        $data->sk_rtrw = $filename;
        $data->berlaku_dari = $request->berlaku;
        $data->berlaku_sampai = $request->sampai;
        $data->desa = $request->desa;
        $data->kecamatan = $request->kecamatan;
        $data->kabupaten = $request->kabupaten;
        $data->provinsi = $request->provinsi;
        $data->tgl_pindah = $request->tgl_pindah;
        $data->alamat_pindah = $request->alamat_pindah;
        // $data->keterangan = $request->keterangan;
        $data->ttd = $request->ttd;
        // return $skl;
        return $data->save();
    }

    public function saveSk(Request $request)
    {
        $data = Identitas::create($request->all());


        Sk::create([
            'identitas_id' => $data->id,
            'nomor_surat' => $request->nomer_surat,
            'alamat' => $request->alamat,
            'tujuan' => $request->tujuan,
            'uraian' => $request->uraian,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'nama_kuasa' => $request->nama_kuasa,
            'ttl_kuasa' => $request->ttl_kuasa,
            'kelamin_kuasa' => $request->kelamin_kuasa,
            'domisili_kuasa' => $request->domisili_kuasa,
            'pekerjaan_kuasa' => $request->pekerjaan_kuasa,
            'alamat_kuasa' => $request->alamat_kuasa,
            'desa_kuasa' => $request->desa_kuasa,
            'kecamatan_kuasa' => $request->kecamatan_kuasa,
            'kabupaten_kuasa' => $request->kabupaten_kuasa,
            'ttd' => $request->ttd
        ]);
    }

    public function saveUmkm(Request $request)
    {
        // return $request;
        $data = Identitas::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kategori_id' => $request->kategori_id,
            'ttd' => $request->ttd,
            'nomor_surat' => $request->nomor_surat,
        ]);

        $umkm = Umkm::create([
            'identitas_id' => $data->id,
            'domisili' => $request->domisili,
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'nomor_surat' => $request->nomor_surat,
            'nama_usaha' => $request->nama_tempat,
            'bidang' => $request->bidang_usaha,
            'modal' => $request->modal,
            'sarana' => $request->sarana,
            'alamat_usaha' => $request->alamat_usaha,
            'kelurahan_usaha' => $request->kelurahan_usaha,
            'kecamatan_usaha' => $request->kecamatan_usaha,
            'ttd' => $request->ttd
        ]);

        if ($umkm) {
            return $umkm;
        } else {
            return Identitas::where('id', $data->id)->delete();
        }
    }

    public function saveSkdu(Request $request)
    {
        $data = Identitas::create($request->all());

        if ($request->file('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        }

        $skdu = Skdu::create([
            'identitas_id' => $data->id,
            'nomor_surat' => $request->nomer_surat,
            'alamat' => $request->alamat,
            'domisili' => $request->domisili,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'tanggal_surat' => $request->tanggal_surat,
            'perlu' => $request->perlu,
            'sk_rtrw' => $filename,
            'nama_usaha' => $request->nama_usaha,
            'bidang' => $request->bidang,
            'alamat_usaha' => $request->alamat_usaha,
            'rtrw' => $request->rt . '/' . $request->rw,
            'ttd' => $request->ttd
        ]);

        if ($skdu) {
            return $skdu;
        } else {
            return Identitas::where('id', $data->id)->delete();
        }
    }

    public function saveSpm(Request $request)
    {
        $data = Identitas::create($request->all());

        $spm = Spm::create([
            'identitas_id' => $data->id,
            'nomor_surat' => $request->nomer_surat,
            'domisili' => $request->domisili,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'nama_mati' => $request->nama_mati,
            'tgl_mati' => $request->tgl_mati,
            'ttd' => $request->ttd
        ]);

        if ($spm) {
            return $spm;
        } else {
            return Identitas::where('id', $data->id)->delete();
        }
    }

    public function updateSpm(Request $request)
    {
        // return $request;
        $this->updateIdentity($request);
        $data = Identitas::find($request->id);
        Spm::where('identitas_id', $data->id)->update([
            'nomor_surat' => $request->nomer_surat,
            'domisili' => $request->domisili,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'nama_mati' => $request->nama_mati,
            'tgl_mati' => $request->tgl_mati,
            'ttd' => $request->ttd
        ]);

        // if ($spm) {
        //     return $spm;
        // } else {
        //     return Identitas::where('id', $data->id)->delete();
        // }
    }


    public function updateSk(Request $request)
    {
        // return $request;
        $data = Sk::with('identitas')->where('identitas_id', '=', $request->id)->first();
        // return $skl;
        // $filename = $data->sk_rtrw;

        // if ($request->file('file')) {
        //     Storage::delete('public/sk_rtrw/' . $request->sk_rtrw);
        //     $filename = $request->file('file')->getClientOriginalName();
        //     $request->file('file')->storeAs('sk_rtrw', $filename, 'public');
        // }

        $this->updateIdentity($request);
        $data->nomor_surat = $request->nomor_surat;
        $data->alamat = $request->alamat;
        $data->tujuan = $request->tujuan;
        $data->uraian = $request->uraian;
        $data->desa = $request->desa;
        $data->kecamatan = $request->kecamatan;
        $data->kabupaten = $request->kabupaten;
        $data->provinsi = $request->provinsi;
        $data->nama_kuasa = $request->nama_kuasa;
        $data->ttl_kuasa = $request->ttl_kuasa;
        $data->kelamin_kuasa = $request->kelamin_kuasa;
        $data->domisili_kuasa = $request->domisili_kuasa;
        $data->pekerjaan_kuasa = $request->pekerjaan_kuasa;
        $data->alamat_kuasa = $request->alamat_kuasa;
        $data->desa_kuasa = $request->desa_kuasa;
        $data->kecamatan_kuasa = $request->kecamatan_kuasa;
        $data->kabupaten_kuasa = $request->kabupaten_kuasa;
        $data->ttd = $request->ttd;
        // return $skl;
        return $data->save();
    }


    public function saveSkn(Request $request)
    {
        // return $request;
        $data = Identitas::create([
            'nama' => $request->nama,
            'agama' => $request->agama,
            'nik' => $request->nik,
            'ttl' => $request->ttl,
            'kelamin' => $request->kelamin,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'kategori_id' => $request->kategori_id,
            'ttd' => $request->ttd,
            'nomer_surat' => $request->nomor_surat,
        ]);



        $skn =  Skn::create(['identitas_id' => $data->id]);
        $skn->update($request->all());
        $skn->save();

        if ($skn) {
            return $skn;
        } else {
            return Identitas::where('id', $data->id)->delete();
        }
        Ortu::create([
            'skn_id' => $skn->id,
            'status' => $request->status_ayah,
            'domisili' => $request->domisili_ayah,
            'nama' => $request->nama_ayah,
            'bin' => $request->bin_ayah,
            'ttl' => $request->ttl_ayah,
            'warganegara' => $request->warganegara_ayah,
            'agama' => $request->agama_ayah,
            'pekerjaan' => $request->pekerjaan_ayah,
            'alamat' => $request->alamat_ayah,
            'desa' => $request->desa_ayah,
            'kecamatan' => $request->kecamatan_ayah,
            'kabupaten' => $request->kabupaten_ayah,
        ]);

        Ortu::create([
            'skn_id' => $skn->id,
            'status' => $request->status_ibu,
            'domisili' => $request->domisili_ibu,
            'nama' => $request->nama_ibu,
            'bin' => $request->bin_ibu,
            'ttl' => $request->ttl_ibu,
            'warganegara' => $request->warganegara_ibu,
            'agama' => $request->agama_ibu,
            'pekerjaan' => $request->pekerjaan_ibu,
            'alamat' => $request->alamat_ibu,
            'desa' => $request->desa_ibu,
            'kecamatan' => $request->kecamatan_ibu,
            'kabupaten' => $request->kabupaten_ibu,
        ]);

        return;
    }

    public function reportPrint(Request $request)
    {
        $data = DB::select('SELECT identitas.* , users.nama_depan as nd, users.nama_belakang as nb FROM identitas JOIN users ON identitas.ttd = users.id WHERE kategori_id = ' . $request->kategoriSurat . ' AND DATE_FORMAT(identitas.created_at,"%Y-%m-%d") BETWEEN "' . $request->dari . '" AND "' . $request->sampai . '"');
        return view('report-all', ['data' => $data, 'dari' => $request->dari, 'sampai' => $request->sampai]);
    }

    public function reportArsip(Request $request)
    {
        $data = DB::select('SELECT surat_masuk.*, users.nama_depan as nd, users.nama_belakang as nb  FROM surat_masuk JOIN users ON users.id = surat_masuk.user_id WHERE DATE_FORMAT(surat_masuk.created_at,"%Y-%m-%d") BETWEEN "' . $request->dari . '" AND "' . $request->sampai . '"');
        return view('report-arsip', ['data' => $data, 'dari' => $request->dari, 'sampai' => $request->sampai]);
    }

    public function findSkbm(Request $request)
    {
        $data = Skbm::with('identitas')->where('nomer_surat', '=', $request->nosurat)->firstOrFail();
        return $data;
    }

    public function findUmkm(Request $request)
    {
        $data = Umkm::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        return $data;
    }

    public function findSktm(Request $request)
    {
        $data = Sktm::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        return $data;
    }

    public function findSkl(Request $request)
    {
        $data = Skl::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        return $data;
    }

    public function findSkck(Request $request)
    {
        $data = Skck::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        return $data;
    }

    public function findSkik(Request $request)
    {
        $data = Skik::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        return $data;
    }

    public function findSkiu(Request $request)
    {
        $data = Skiu::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        return $data;
    }

    public function findSp(Request $request)
    {
        $data = Sp::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        return $data;
    }

    public function findSkpn(Request $request)
    {
        $data = Skpn::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        return $data;
    }

    public function findSk(Request $request)
    {
        $data = Sk::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        return $data;
    }

    public function findSkpm(Request $request)
    {
        $data = Skpm::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        return $data;
    }

    public function findSkn(Request $request)
    {
        $data = Skn::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        $ayah = Ortu::with('skn')->where('skn_id', '=', $data->id)->get();
        // $ibu = Ortu::with('skn')->where('skn_id', '=', $data->id)->where('id', '=', $data->id % 2 == 0)->firstOrFail();

        return [$data, $ayah];
    }

    public function findSkdu(Request $request)
    {
        $data = Skdu::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        return $data;
    }

    public function findSpm(Request $request)
    {
        $data = Spm::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
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
            $data = DB::select('SELECT identitas.nomer_surat as nomer_surat ,kategori.nama_kategori as kategori, identitas.kategori_id as kategori_id, identitas.nomer_surat as nomer_surat,  identitas.nama as nama, identitas.created_at as created_at, identitas.nomer_surat as nomer_surat, identitas.ttd as ttd  FROM identitas INNER JOIN kategori ON kategori.id = identitas.kategori_id  ORDER BY identitas.created_at DESC');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('ttd', function ($row) {
                    // $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editIdentitas">Edit</a>';
                    $ttd = User::where('id', '=', $row->ttd)->firstOrFail();
                    $nama = $ttd->nama_depan . ' ' . $ttd->nama_belakang;
                    // $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteIdentitas">Delete</a>';
                    return $nama;
                })
                ->addColumn('action', function ($row) {
                    $kategori = Kategori::where('id', '=', $row->kategori_id)->firstOrFail();
                    return '<a data-kategori="' . $row->kategori_id . '" data-nosurat="' . $row->nomer_surat . '"  class="btn btn-xs btn-primary edit-surat"><i class="glyphicon glyphicon-edit"></i> Edit</a>  <button class="btn btn-danger print-surat" data-kategori="' . $row->kategori_id . '" data-nosurat="' . $row->nomer_surat . '">print</button> <button class="btn btn-secondary hapus-surat" data-kategori="' . $row->kategori_id . '" data-nosurat="' . $row->nomer_surat . '">Hapus</button>';
                })
                ->rawColumns(['action', 'ttd'])
                ->make(true);
        }
    }


    public function printSkbm(Request $request)
    {

        $skbm = Skbm::with('identitas')->where('nomer_surat', '=', $request->nosurat)->firstOrFail();
        $ttd = User::with('jabatan')->where('id', '=', $skbm->ttd)->firstOrFail();
        return view('report', ['skbm' => $skbm, 'ttd' => $ttd]);
    }

    public function printUmkm(Request $request)
    {
        $umkm = Umkm::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        $ttd = User::with('jabatan')->where('id', '=', $umkm->ttd)->firstOrFail();
        return view('report.report-umkm', ['umkm' => $umkm, 'ttd' => $ttd]);
    }

    public function printSktm(Request $request)
    {

        $sktm = Sktm::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        $ttd = User::with('jabatan')->where('id', '=', $sktm->ttd)->firstOrFail();
        return view('report.report-sktm', ['sktm' => $sktm, 'ttd' => $ttd]);
    }

    public function printSkl(Request $request)
    {

        $skl = Skl::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        $ttd = User::with('jabatan')->where('id', '=', $skl->ttd)->firstOrFail();
        return view('report.report-skl', ['skbm' => $skl, 'ttd' => $ttd]);
    }

    public function printSkck(Request $request)
    {

        $skck = Skck::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        $ttd = User::with('jabatan')->where('id', '=', $skck->ttd)->firstOrFail();
        return view('report.report-skck', ['skck' => $skck, 'ttd' => $ttd]);
    }
    public function printSkik(Request $request)
    {

        $skik = Skik::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        $ttd = User::with('jabatan')->where('id', '=', $skik->ttd)->firstOrFail();
        return view('report.report-skik', ['skik' => $skik, 'ttd' => $ttd]);
    }
    public function printSkiu(Request $request)
    {

        $skiu = Skiu::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        $ttd = User::with('jabatan')->where('id', '=', $skiu->ttd)->firstOrFail();
        return view('report.report-skiu', ['skiu' => $skiu, 'ttd' => $ttd]);
    }
    public function printSp(Request $request)
    {
        $sp = Sp::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        $ttd = User::with('jabatan')->where('id', '=', $sp->ttd)->firstOrFail();
        return view('report.report-sp', ['sp' => $sp, 'ttd' => $ttd]);
    }

    public function printSpm(Request $request)
    {
        $spm = Spm::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        $ttd = User::with('jabatan')->where('id', '=', $spm->ttd)->firstOrFail();
        return view('report.report-spm', ['spm' => $spm, 'ttd' => $ttd]);
    }

    public function printSkdu(Request $request)
    {
        $skdu = Skdu::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        $ttd = User::with('jabatan')->where('id', '=', $skdu->ttd)->firstOrFail();
        return view('report.report-skdu', ['skdu' => $skdu, 'ttd' => $ttd]);
    }

    public function printSkpn(Request $request)
    {
        $skpn = Skpn::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        $ttd = User::where('id', '=', $skpn->ttd)->firstOrFail();
        return view('report.report-skpn', ['skpn' => $skpn, 'ttd' => $ttd]);
    }
    public function printSk(Request $request)
    {
        $sk = Sk::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        $ttd = User::where('id', '=', $sk->ttd)->firstOrFail();
        return view('report.report-sk', ['sk' => $sk, 'ttd' => $ttd]);
    }

    public function printSkn(Request $request)
    {
        $skn = Skn::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        $ttd = User::where('id', '=', $skn->ttd)->firstOrFail();
        return view('report.report-skn', ['skn' => $skn, 'ttd' => $ttd]);
    }

    public function printSkpm(Request $request)
    {
        $skpm = Skpm::with('identitas')->where('nomor_surat', '=', $request->nosurat)->firstOrFail();
        $ttd = User::with('jabatan')->where('id', '=', $skpm->ttd)->firstOrFail();
        return view('report.report-skpm', ['skpm' => $skpm, 'ttd' => $ttd]);
    }

    public function hapus(Request $request)
    {
        $kategori = Kategori::where('id', '=', $request->kategori)->firstOrFail();
        // return $kategori;
        Identitas::where('nomer_surat', '=', $request->nosurat)->where('kategori_id', '=', $request->kategori)->delete();
        switch ($kategori->link) {
            case 'form-skbm':
                $skbm = Skbm::with('identitas')->where('nomer_surat', '=', $request->nosurat);
                return $skbm->delete();
                break;

            case 'form-skl':
                $skl = Skl::with('identitas')->where('nomor_surat', '=', $request->nosurat);
                return $skl->delete();
                break;

            case 'form-skck':
                $skck = Skck::with('identitas')->where('nomor_surat', '=', $request->nosurat);
                return $skck->delete();
                break;

            case 'form-skik':
                $skik = Skik::with('identitas')->where('nomor_surat', '=', $request->nosurat);
                return $skik->delete();
                break;

            case 'form-skiu':
                $skiu = Skiu::with('identitas')->where('nomor_surat', '=', $request->nosurat);
                return  $skiu->delete();
                break;

            case 'form-sp':
                $sp = Sp::with('identitas')->where('nomor_surat', '=', $request->nosurat);
                return  $sp->delete();
                break;

            case 'form-skpn':
                $skpn = Skpn::with('identitas')->where('nomor_surat', '=', $request->nosurat);
                return $skpn->delete();
                break;

            case 'form-sk':
                $sk = Sk::with('identitas')->where('nomor_surat', '=', $request->nosurat);
                return $sk->delete();
                break;

            case 'form-skpm':
                $skpm = Skpm::with('identitas')->where('nomor_surat', '=', $request->nosurat);
                return  $skpm->delete();
                break;

            case 'form-skn':
                $skn = Skn::with('identitas')->where('nomor_surat', '=', $request->nosurat);
                return  $skn->delete();
                break;
            case 'form-umkm':
                $umkm = Umkm::with('identitas')->where('nomor_surat', '=', $request->nosurat);
                return  $umkm->delete();
                break;
            case 'form-sktm':
                $sktm = Sktm::with('identitas')->where('nomor_surat', '=', $request->nosurat);
                return  $sktm->delete();
                break;


            default:
                # code...
                break;
        }
        // Identitas::where('nomer_surat', '=', $request->nosurat)->where('kategori', '=', $request->kategori)->delete();
    }
}
