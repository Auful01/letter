@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-body">
        <input type="text" id="jenis_id" value="" hidden>
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
                            <input type="text" class="form-control" id="pasangan_sebelum" name="pasangan">
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
                                    <input type="checkbox" name="status_ayah" id="status_ayah">
                                    klik jika sudah meninggal
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Domisili Wali Pria</label>
                                </div>
                                <div class="col">
                                    <input type="text" id="domisili_ayah" class="form-control">
                                   {{-- <select name="domisili_ayah" class="form-control" id="domisili_ayah">
                                       <option value="">-- Pilih Domisili Wali --</option>
                                   </select> --}}
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Nama lengkap dan alias</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="nama" id="nama_ayah">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Bin</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="bin" id="bin_ayah">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Tempat, Tanggal lahir</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="tempat" id="tempat_ayah">
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl-lahir_ayah">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Warganegara</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="warganegara" id="warganegara_ayah">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3  text-right">
                                    <label for="">Agama</label>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control agama" name="agama" id="agama_ayah" >
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
                                    <select name="pekerjaan" class="form-control pekerjaan" id="pekerjaan_ayah">
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
                                    <textarea name="alamat" class="form-control" id="alamat_ayah" cols="30" rows="2"></textarea>
                                    {{-- <input type="text" class="form-control" name="warganegara" id="warganegara"> --}}
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Kelurahan</label>
                                </div>
                                <div class="col">
                                    {{-- <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2"></textarea> --}}
                                    <input type="text" class="form-control" name="kelurahan" id="kelurahan_ayah">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Kecamatan</label>
                                </div>
                                <div class="col">
                                    {{-- <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2"></textarea> --}}
                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan_ayah">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Kota/Kabupaten</label>
                                </div>
                                <div class="col">
                                    {{-- <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2"></textarea> --}}
                                    <input type="text" class="form-control" name="kota" id="kota_ayah">
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
                                    <input type="checkbox" name="status_ibu" id="status_ibu">
                                    klik jika sudah meninggal
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Domisili Wali Pria</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="domisili_ibu">
                                   {{-- <select name="domisili_wali" class="form-control" id="domisili_ibu">
                                       <option value="">-- Pilih Domisili Wali --</option>
                                   </select> --}}
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Nama lengkap dan alias</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="nama" id="nama_ibu">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Binti</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="bin" id="bin_ibu">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Tempat, Tanggal lahir</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="tempat" id="tempat_ibu">
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir_ibu">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Warganegara</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="warganegara" id="warganegara_ibu">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3  text-right">
                                    <label for="">Agama</label>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control agama" name="agama" id="agama_ibu" >
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
                                    <select name="pekerjaan" class="form-control pekerjaan" id="pekerjaan_ibu">
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
                                    <textarea name="alamat" class="form-control" id="alamat_ibu" cols="30" rows="2"></textarea>
                                    {{-- <input type="text" class="form-control" name="warganegara" id="warganegara"> --}}
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Kelurahan</label>
                                </div>
                                <div class="col">
                                    {{-- <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2"></textarea> --}}
                                    <input type="text" class="form-control" name="kelurahan" id="kelurahan_ibu">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Kecamatan</label>
                                </div>
                                <div class="col">
                                    {{-- <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2"></textarea> --}}
                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan_ibu">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 text-right">
                                    <label for="">Kota/Kabupaten</label>
                                </div>
                                <div class="col">
                                    {{-- <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2"></textarea> --}}
                                    <input type="text" class="form-control" name="kota" id="kota_ibu">
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
                            <input type="text" name="nik" class="form-control" id="nik_pasangan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Nama lengkap dan alias</label>
                        </div>
                        <div class="col">
                            <input type="text" name="nama" class="form-control" id="nama_pasangan">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Jenis Kelamin</label>
                        </div>
                        <div class="col-md-4">
                            <select name="kelamin" class="form-control kelamin" id="kelamin_pasangan">
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
                            <input type="text" name="tempat" id="tempat_pasangan" class="form-control">
                        </div>
                        <div class="col-md-5">
                            <input type="date" name="tgl-lahir" id="tgl-lahir_pasangan" class="form-control ">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Agama</label>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control agama" name="agama" id="agama_pasangan" >
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
                            <select name="pekerjaan" class="form-control pekerjaan" id="pekerjaan_pasangan">
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
                            <textarea name="alamat" id="alamat_pasangan" class="form-control" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kelurahan</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="kelurahan_pasangan" name="kelurahan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kecamatan</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="kecamatan_pasangan" name="kecamatan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kota/Kabupaten</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="kota_pasangan" name="kota">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Bin/Binti</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="bin_pasangan" name="bin">
                        </div>
                    </div>

                </div>
            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Nomor surat</h5>
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
                <button class="btn btn-sm btn-primary" id="save-skn"> <i class="fas fa-check"></i> Simpan</button>
                <button class="btn btn-sm btn-danger"> <i class="fas fa-redo"></i> Kembali</button>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>

        loadTtd()

        $('#save-skn').on('click', function () {
            let data = {
                _token: '{{ csrf_token() }}',
                kategori_id : $('#jenis_id').val(),
                nik: $('#nik').val(),
                nama: $('#nama').val(),
                kelamin: $('#kelamin').val(),
                ttl: $('#tempat').val() + ', ' + $('#tgl-lahir').val(),
                agama: $('#agama').val(),
                pekerjaan: $('#pekerjaan').val(),
                alamat: $('#alamat').val(),
                desa: $('#kelurahan').val(),
                kecamatan: $('#kecamatan').val(),
                kabupaten: $('#kota').val(),
                bin: $('#bin').val(),
                status_kawin : $('#status_kawin').val(),
                pasangan_sebelum : $('#pasangan_sebelum').val(),
                nik_pasangan: $('#nik_pasangan').val(),
                nama_pasangan: $('#nama_pasangan').val(),
                ttl_pasangan: $('#tgl-lahir_pasangan').val(),
                agama_pasangan: $('#agama_pasangan').val(),
                kelamin_pasangan: $('#kelamin_pasangan').val(),
                pekerjaan_pasangan: $('#pekerjaan_pasangan').val(),
                alamat_pasangan: $('#alamat_pasangan').val(),
                desa_pasangan: $('#kelurahan_pasangan').val(),
                kecamatan_pasangan: $('#kecamatan_pasangan').val(),
                kabupaten_pasangan: $('#kota_pasangan').val(),
                bin_pasangan: $('#bin_pasangan').val(),
                ttd: $('#ttd').val(),
                nomor_surat: $('#nomer_surat').val(),
                status_ayah : $('#status_ayah').prop('checked') ? 'Hidup' : 'Meninggal',
                domisili_ayah: $('#domisili_ayah').val(),
                nama_ayah: $('#nama_ayah').val(),
                bin_ayah: $('#bin_ayah').val(),
                ttl_ayah: $('#tempat_ayah').val() + ', ' + $('#tgl-lahir_ayah').val(),
                warganegara_ayah: $('#warganegara_ayah').val(),
                agama_ayah: $('#agama_ayah').val(),
                pekerjaan_ayah: $('#pekerjaan_ayah').val(),
                alamat_ayah: $('#alamat_ayah').val(),
                desa_ayah: $('#kelurahan_ayah').val(),
                kecamatan_ayah: $('#kecamatan_ayah').val(),
                kota_ayah: $('#kota_ayah').val(),
                status_ibu : $('#status_ibu').prop('checked') ? 'Hidup' : 'Meninggal',
                domisili_ibu: $('#domisili_ibu').val(),
                nama_ibu: $('#nama_ibu').val(),
                bin_ibu: $('#bin_ibu').val(),
                ttl_ibu: $('#ttl_ibu').val(),
                warganegara_ibu: $('#warganegara_ibu').val(),
                agama_ibu: $('#agama_ibu').val(),
                pekerjaan_ibu: $('#pekerjaan_ibu').val(),
                alamat_ibu: $('#alamat_ibu').val(),
                kelurahan_ibu: $('#kelurahan_ibu').val(),
                kecamatan_ibu: $('#kecamatan_ibu').val(),
                kota_ibu: $('#kota_ibu').val(),
            }

            // let ortu = {

            // }

            $.ajax({
                url: "/save-skn",
                type: 'POST',
                data: data,
                success: function (response) {
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data berhasil disimpan',
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = "/arsip-surat-keluar"
                        }
                    })
                }
            })


        })
        $(document).ready(function () {
        $.ajax({
            url : '/get-last-skn',
            type : 'GET',
            success : function (data) {
                console.log(data);
                data == '' ? $('#nomer_surat').val(1) : $('#nomer_surat').val(parseInt(data.nomor_surat) + 1)
                // console.log(data == '' ? true : false);
            }
        })

        $('body #jenis_id').val(localStorage.getItem('surat_id'))
    //    console.log(localStorage.getItem('surat_id'));
    })
    </script>
@endsection
