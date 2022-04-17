@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-body">
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Masukkan Data Pemohon</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row  mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">NIK</label>
                        </div>
                        <div class="col">
                            <input type="text" name="nik" class="form-control" id="nik">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Nama lengkap dan alias</label>
                        </div>
                        <div class="col">
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Jenis Kelamin</label>
                        </div>
                        <div class="col-md-4">
                            <select name="kelamin" class="form-control kelamin" id="kelamin">
                                <option value="">-- Pilih Jenis kelamin --</option>
                                <option value="laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Tempat, Tanggal Lahir</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="tempat" id="tempat" class="form-control tempat">
                        </div>
                        <div class="col-md-5">
                            <input type="date" name="tgl-lahir" id="tgl-lahir" class="form-control tgl-lahir">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Agama</label>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control agama" name="agama" id="agama" >
                                <option value="">-- Pilih Agama --</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="hindu">Hindu</option>
                                <option value="budha">Budha</option>
                                <option value="konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Pekerjaan</label>
                        </div>
                        <div class="col-md-4">
                            <select name="pekerjaan" class="form-control pekerjaan" id="pekerjaan">
                                <option value="">-- Pilih Jenis pekerjaan --</option>
                                <option value="swasta">Swasta</option>
                                <option value="wirausaha">Wirausaha</option>
                                <option value="pegawai negeri">Pegawai Negeri</option>
                                <option value="tidak bekerja">Tidak bekerja</option>
                                <option value="lain">Lain</option>
                            </select>
                            <input type="text" class="form-control mt-4 kerja-lain" id="kerja-lain" name="pekerjaan" hidden>
                        </div>
                    </div>


                </div>
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Tempat Tinggal</label>
                        </div>
                        <div class="col">
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="2"></textarea>
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
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Bin/Binti</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="bin" name="bin">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Status perkawinan</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="status_kawin" name="status_kawin">
                            <small>
                                <ol type="a">
                                <li>Laki : Jejaka, Duda, atau istri ke-..</li>
                                <li>Perempuan : Perawan, Janda</li>
                            </ol></small>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Istri/Suami terdahulu</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="pasangan" name="pasangan">
                            <small>
                                <ol type="a">
                                <li>Isikan nama istri jika dudan dan suami jika janda</li>
                                <li>Lewati jika jejaka atau janda</li>
                            </ol></small>
                        </div>
                    </div>
                </div>
            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Masukkan Data Orang Tua</h5>
            <hr>
            <div class="row  mb-4">
                <div class="col-md-6">
                    <div class="card" style="border: 1px solid rgb(3, 108, 156)">
                        <div class="card-header bg-info" style="color: #fff; ">
                            Data Orang tua Pria
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Status</label>
                                </div>
                                <div class="col">
                                    <input type="checkbox" name="status_wali" id="status_wali">
                                    klik jika sudah meninggal
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Domisili Wali Pria</label>
                                </div>
                                <div class="col">
                                   <select name="domisili_wali" class="form-control" id="domisili_wali">
                                       <option value="">-- Pilih Domisili Wali --</option>
                                   </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Nama lengkap dan alias</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="nama" id="nama">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Bin</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="bin" id="bin">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Tempat, Tanggal lahir</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="tempat" id="tempat">
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Warganegara</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="warganegara" id="warganegara">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3  text-right">
                                    <label for="">Agama</label>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control agama" name="agama" id="agama" >
                                        <option value="">-- Pilih Agama --</option>
                                        <option value="islam">Islam</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="budha">Budha</option>
                                        <option value="konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3  text-right">
                                    <label for="">Pekerjaan</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="pekerjaan" class="form-control pekerjaan" id="pekerjaan">
                                        <option value="">-- Pilih Jenis pekerjaan --</option>
                                        <option value="swasta">Swasta</option>
                                        <option value="wirausaha">Wirausaha</option>
                                        <option value="pegawai negeri">Pegawai Negeri</option>
                                        <option value="tidak bekerja">Tidak bekerja</option>
                                        <option value="lain">Lain</option>
                                    </select>
                                    <input type="text" class="form-control mt-4 kerja-lain" id="kerja-lain" name="pekerjaan" hidden>
                                </div>

                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Tempat Tinggal</label>
                                </div>
                                <div class="col">
                                    <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2"></textarea>
                                    {{-- <input type="text" class="form-control" name="warganegara" id="warganegara"> --}}
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Kelurahan</label>
                                </div>
                                <div class="col">
                                    {{-- <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2"></textarea> --}}
                                    <input type="text" class="form-control" name="kelurahan" id="kelurahan">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Kecamatan</label>
                                </div>
                                <div class="col">
                                    {{-- <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2"></textarea> --}}
                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Kota/Kabupaten</label>
                                </div>
                                <div class="col">
                                    {{-- <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2"></textarea> --}}
                                    <input type="text" class="form-control" name="kota" id="kota">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="border: 1px solid rgb(3, 108, 156)">
                        <div class="card-header bg-info" style="color: #fff; ">
                            Data Orang tua Wanita
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Status</label>
                                </div>
                                <div class="col">
                                    <input type="checkbox" name="status_wali" id="status_wali">
                                    klik jika sudah meninggal
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Domisili Wali Pria</label>
                                </div>
                                <div class="col">
                                   <select name="domisili_wali" class="form-control" id="domisili_wali">
                                       <option value="">-- Pilih Domisili Wali --</option>
                                   </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Nama lengkap dan alias</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="nama" id="nama">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Binti</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="bin" id="bin">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Tempat, Tanggal lahir</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="tempat" id="tempat">
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Warganegara</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="warganegara" id="warganegara">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3  text-right">
                                    <label for="">Agama</label>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control agama" name="agama" id="agama" >
                                        <option value="">-- Pilih Agama --</option>
                                        <option value="islam">Islam</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="budha">Budha</option>
                                        <option value="konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3  text-right">
                                    <label for="">Pekerjaan</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="pekerjaan" class="form-control pekerjaan" id="pekerjaan">
                                        <option value="">-- Pilih Jenis pekerjaan --</option>
                                        <option value="swasta">Swasta</option>
                                        <option value="wirausaha">Wirausaha</option>
                                        <option value="pegawai negeri">Pegawai Negeri</option>
                                        <option value="tidak bekerja">Tidak bekerja</option>
                                        <option value="lain">Lain</option>
                                    </select>
                                    <input type="text" class="form-control mt-4 kerja-lain" id="kerja-lain" name="pekerjaan" hidden>
                                </div>

                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Tempat Tinggal</label>
                                </div>
                                <div class="col">
                                    <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2"></textarea>
                                    {{-- <input type="text" class="form-control" name="warganegara" id="warganegara"> --}}
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Kelurahan</label>
                                </div>
                                <div class="col">
                                    {{-- <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2"></textarea> --}}
                                    <input type="text" class="form-control" name="kelurahan" id="kelurahan">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Kecamatan</label>
                                </div>
                                <div class="col">
                                    {{-- <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2"></textarea> --}}
                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Kota/Kabupaten</label>
                                </div>
                                <div class="col">
                                    {{-- <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2"></textarea> --}}
                                    <input type="text" class="form-control" name="kota" id="kota">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Masukkan Data Pasangan</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row  mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">NIK</label>
                        </div>
                        <div class="col">
                            <input type="text" name="nik" class="form-control" id="nik">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Nama lengkap dan alias</label>
                        </div>
                        <div class="col">
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Jenis Kelamin</label>
                        </div>
                        <div class="col-md-4">
                            <select name="kelamin" class="form-control kelamin" id="kelamin">
                                <option value="">-- Pilih Jenis kelamin --</option>
                                <option value="laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Tempat, Tanggal Lahir</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="tempat" id="tempat" class="form-control tempat">
                        </div>
                        <div class="col-md-5">
                            <input type="date" name="tgl-lahir" id="tgl-lahir" class="form-control tgl-lahir">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Agama</label>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control agama" name="agama" id="agama" >
                                <option value="">-- Pilih Agama --</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="hindu">Hindu</option>
                                <option value="budha">Budha</option>
                                <option value="konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Pekerjaan</label>
                        </div>
                        <div class="col-md-4">
                            <select name="pekerjaan" class="form-control pekerjaan" id="pekerjaan">
                                <option value="">-- Pilih Jenis pekerjaan --</option>
                                <option value="swasta">Swasta</option>
                                <option value="wirausaha">Wirausaha</option>
                                <option value="pegawai negeri">Pegawai Negeri</option>
                                <option value="tidak bekerja">Tidak bekerja</option>
                                <option value="lain">Lain</option>
                            </select>
                            <input type="text" class="form-control mt-4 kerja-lain" id="kerja-lain" name="pekerjaan" hidden>
                        </div>
                    </div>


                </div>
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Tempat Tinggal</label>
                        </div>
                        <div class="col">
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="2"></textarea>
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
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Bin/Binti</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="bin" name="bin">
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
