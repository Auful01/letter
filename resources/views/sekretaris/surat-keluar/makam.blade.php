@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header bg-warning">
                            Catatan!
                        </div>
                        <div class="card-body">
                            <ol>
                                <li>coba</li>
                                <li>coba</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Domisili Pemohon</label>
                        </div>
                        <div class="col">
                            <select name="" class="form-control" id="domisili">
                                <option value="">-- Pilih Domisili Pemohon --</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Nama Pemohon</label>
                        </div>
                        <div class="col">
                           <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Tempat, Tanggal Lahir</label>
                        </div>
                        <div class="col">
                           <input type="text" class="form-control" id="tempat" name="tempat">
                        </div>
                        <div class="col">
                           <input type="date" class="form-control" id="tgl_lahir" name="lahir">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kewarganegaraan</label>
                        </div>
                        <div class="col">
                           <input type="text" class="form-control" id="warganegara" name="warganegara">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Agama</label>
                        </div>
                        <div class="col">
                            <select class="form-control agama" name="agama" id="agama" >
                                <option value="">-- Pilih Agama --</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="hindu">Hindu</option>
                                <option value="budha">Budha</option>
                                <option value="konghucu">Konghucu</option>
                            </select>
                           {{-- <input type="text" class="form-control" id="warganegara" name="warganegara"> --}}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Alamat</label>
                        </div>
                        <div class="col">
                            <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kelurahan</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kecamatan</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kota/Kabupaten</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="kota" name="kota">
                        </div>
                    </div>
                </div>
            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Keterangan</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Nomor</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="nomor_surat" id="nomer_surat" >
                            <small class="text-muted">*nomor surat bertambah otomatis</small>
                        </div>
                    </div>
                </div>
            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Keterangan Kematian</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Nama</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="nama_mayit" id="nama_mayit" >
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Tanggal Meninggal</label>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" name="tgl_wafat" id="tgl_wafat" >
                        </div>
                    </div>
                </div>
            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Tanda tangan surat</h5>
                <hr>
                <div class="col-md-6">
                    <div class="row">

                        <div class="col-md-3  text-right">
                            <label for="">Tanda tangan surat</label>
                        </div>
                        <div class="col">
                            <select name="ttd" id="ttd" class="form-control">
                                <option value="">-- Silahkan pilih nama --</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-sm btn-primary" id="save-skbm"> <i class="fas fa-check"></i> Simpan</button>
                    <button class="btn btn-sm btn-danger"> <i class="fas fa-redo"></i> Kembali</button>
                </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        loadTtd()
    </script>
@endsection
