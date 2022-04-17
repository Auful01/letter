@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <b>Domisili Pemohon</b>
                        </div>
                        <div class="col">
                            <select name="" class="form-control" id="domisili"></select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <b>Nama Pemohon</b>
                        </div>
                        <div class="col">
                            {{-- <select name="" class="form-control" id="nama"></select> --}}
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <b>Nomor Telepon</b>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="telepon" id="telepon">
                            {{-- <select name="" class="form-control" id="telepon"></select> --}}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <b>Alamat</b>
                        </div>
                        <div class="col">
                            <textarea name="" class="form-control" id="alamat" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <b for="">Kelurahan</b>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="kelurahan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <b for="">Kecamatan</b>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="kecamatan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <b for="">Kota/Kabupaten</b>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="kota">
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
                            <b for="">Nomor</b>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="nomor_surat" id="nomer_surat" >
                            <small class="text-muted">*nomor surat bertambah otomatis</small>
                        </div>
                    </div>
                </div>
            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Keterangan Usaha</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <b for="">Nama tempat usaha</b>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="nama_tempat" id="nama_tempat" >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <b for="">Bidang usaha</b>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="bidang" id="nama_tempat" >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <b for="">Jumlah modal usaha</b>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="modal" id="modal" >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <b for="">Sarana Usaha yang digunakan</b>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="sarana" id="sarana" >
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <b for="">Alamat Usaha</b>
                        </div>
                        <div class="col">
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="2"></textarea>
                            {{-- <input type="text" class="form-control" name="alamat" id="alamat" > --}}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <b for="">Kelurahan</b>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="kelurahan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <b for="">Kecamatan</b>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="kecamatan">
                        </div>
                    </div>
                </div>
            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Tanda tangan surat</h5>
                <hr>
                <div class="col-md-6">
                    <div class="row">

                        <div class="col-md-3  text-right">
                            <b for="">Tanda tangan surat</b>
                        </div>
                        <div class="col">
                            <select name="ttd" id="ttd" class="form-control">
                                <option value="">-- Silahkan pilih nama --</option>
                                {{-- <option value="auful">Muhammad Auful Kirom</option> --}}

                            </select>
                            {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
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
