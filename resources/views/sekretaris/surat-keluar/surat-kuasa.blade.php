{{-- FIXED --}}
@extends('layout.app')


@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row d-flex justify-content-between mx-3">
                <div class="col-md-6">
                    <div class="row mb-4">
                        <input type="text" id="jenis_id" value="" hidden>
                        <div class="col-md-3  text-right">
                            <label for="">NIK</label>
                        </div>
                        <div class="col">
                        <input type="text" name="nik" id="nik" class="form-control nik">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Nama</label>
                        </div>
                        <div class="col">
                        <input type="text" name="nama" id="nama" class="form-control nama">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Tempat, Tanggal Lahir</label>
                        </div>
                        <div class="col">
                            <input type="text" name="tempat" id="tempat" class="form-control tempat">
                        </div>
                        <div class="col">
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control tgl_lahir">
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
                        <div class="col-md-3  text-right">
                            <label for="">Alamat</label>
                        </div>
                        <div class="col">
                            <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control alamat"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kelurahan</label>
                        </div>
                        <div class="col">
                        <input type="text" name="kelurahan" id="kelurahan" class="form-control kelurahan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kecamatan</label>
                        </div>
                        <div class="col">
                        <input type="text" name="kecamatan" id="kecamatan" class="form-control kecamatan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kota/Kabupaten</label>
                        </div>
                        <div class="col">
                        <input type="text" name="kota" id="kota" class="form-control kota">
                        </div>
                    </div>
                </div>
            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Memberi Kuasa Kepada</h5>
                <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <b>Domisili Penerima Kuasa</b>
                        </div>
                        <div class="col">
                            {{-- <select name="" class="form-control" id="domisili_kuasa"></select> --}}
                            <input type="text" name="domisili_kuasa" id="domisili_kuasa" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <b>Nama Penerima Kuasa</b>
                        </div>
                        <div class="col">
                            {{-- <select name="" class="form-control" id="nama"></select> --}}
                            <input type="text" class="form-control" name="nama" id="nama_kuasa">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Tempat, Tanggal Lahir Penerima Kuasa</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="tempat" id="tempat_kuasa" class="form-control tempat">
                        </div>
                        <div class="col-md-5">
                            <input type="date" name="tgl-lahir" id="tgl-lahir_kuasa" class="form-control tgl-lahir">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Jenis Kelamin Penerima Kuasa</label>
                        </div>
                        <div class="col-md-4">
                            <select name="kelamin" class="form-control kelamin" id="kelamin_kuasa">
                                <option value="">-- Pilih Jenis kelamin --</option>
                                <option value="laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Pekerjaan Penerima Kuasa</label>
                        </div>
                        <div class="col-md-4">
                            <select name="pekerjaan" class="form-control pekerjaan" id="pekerjaan_kuasa">
                                <option value="">-- Pilih Jenis pekerjaan --</option>
                                <option value="swasta">Swasta</option>
                                <option value="wirausaha">Wirausaha</option>
                                <option value="pegawai negeri">Pegawai Negeri</option>
                                <option value="tidak bekerja">Tidak bekerja</option>
                                <option value="lain">Lain</option>
                            </select>
                            <input type="text" class="form-control mt-4 kerja-lain" id="kerja-lain_kuasa" name="pekerjaan" hidden>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Alamat Penerima Kuasa</label>
                        </div>
                        <div class="col">
                            <textarea name="alamat" id="alamat_kuasa" cols="30" rows="2" class="form-control alamat"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kelurahan Penerima Kuasa</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="kelurahan_kuasa" name="kelurahan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kecamatan Penerima Kuasa</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="kecamatan_kuasa" name="kecamatan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kota/Kabupaten Penerima Kuasa</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="kota_kuasa" name="kota">
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
                        <div class="row mb-4">
                            <div class="col-md-3  text-right">
                                <label for="">Tujuan</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="tujuan" id="tujuan">
                                {{-- <textarea  class="form-control" name="tujuan" id="tujuan" cols="30" rows="3"></textarea> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-4">
                            <div class="col-md-3  text-right">
                                <label for="">Uraian</label>
                            </div>
                            <div class="col">
                                <textarea name="uraian" class="form-control" id="uraian" cols="30" rows="2"></textarea>
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
                    <button class="btn btn-sm btn-primary" id="save-sk"> <i class="fas fa-check"></i> Simpan</button>
                    <button class="btn btn-sm btn-danger"> <i class="fas fa-redo"></i> Kembali</button>
                </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        loadTtd()

        $('#pekerjaan').on('change', function () {
        var coba = $(this).find(':selected').val()
        console.log(coba);
        if(coba == 'lain'){
            $('body #kerja-lain').prop('hidden', false)
        } else {
            $('body #kerja-lain').prop('hidden', true)
        }
    })

    $('#save-sk').on('click', function() {
        var fd = new FormData();
        var identity = getIdentity()
        var noSurat = $('#nomer_surat').val()
        var perlu = $('#perlu').val()
        var kabupaten = $('#kota').val()
        var desa = $('#kelurahan').val()
        var kecamatan = $('#kecamatan').val()
        var provinsi = $('#provinsi').val()
        var domisili_kuasa = $('#domisili_kuasa').val()
        var nama_kuasa =$('#nama_kuasa').val()
        var ttl_kuasa = $('#tempat_kuasa').val() + ', ' + $('#tgl-lahir_kuasa').val()
        var kelamin_kuasa = $('#kelamin_kuasa').val()
        var alamat_kuasa = $('#alamat_kuasa').val()
        var kabupaten_kuasa = $('#kota_kuasa').val()
        var desa_kuasa = $('#kelurahan_kuasa').val()
        var kecamatan_kuasa = $('#kecamatan_kuasa').val()
        var pekerjaan_kuasa = $('#pekerjaan_kuasa').val()
        var berlaku = $('#berlaku').val()
        var sampai = $('#sampai').val()
        var tujuan = $('#tujuan').val()
        var uraian = $('#uraian').val()
        var ttd = $('#ttd').val()

        fd.append('_token', '{{ csrf_token() }}')
        fd.append('nik', identity.nik)
        fd.append('nama', identity.nama)
        fd.append('ttl', identity.ttl)
        fd.append('kelamin', identity.kelamin)
        fd.append('pekerjaan', identity.kerja == 'lain' ? identity.kerjaLain : identity.kerja)
        fd.append('kategori_id', identity.kategoriId)
        fd.append('alamat', identity.alamat)
        fd.append('kabupaten',kabupaten)
        fd.append('desa',desa)
        fd.append('kecamatan',kecamatan)
        fd.append('domisili_kuasa', domisili_kuasa)
        fd.append('nama_kuasa', nama_kuasa)
        fd.append('ttl_kuasa', ttl_kuasa)
        fd.append('kelamin_kuasa', kelamin_kuasa)
        fd.append('pekerjaan_kuasa', pekerjaan_kuasa )
        fd.append('alamat_kuasa', alamat_kuasa)
        fd.append('kabupaten_kuasa',kabupaten_kuasa)
        fd.append('desa_kuasa',desa_kuasa)
        fd.append('kecamatan_kuasa',kecamatan_kuasa)

        fd.append('nomer_surat', noSurat)
        fd.append('tujuan',tujuan)
        fd.append('uraian',uraian)
        fd.append('ttd',ttd)

        $.ajax({
            url : '/save-sk',
            type : 'POST',
            data : fd,
            contentType : false,
            processData : false,
            success : function () {
                alert('success')
            }
        })
        // console.log(identity.nik,identity.nama,identity.ttl,identity.kelamin,identity.kerja,identity.kerjaLain,identity.nokk,identity.alamat,identity.agama,identity.statusKawin,identity.pendidikan, noSurat, perlu,berlaku, sampai,tujuan,file);
    })

    $(document).ready(function () {
        $.ajax({
            url : '/get-last-sk',
            type : 'GET',
            success : function (data) {
                console.log(data);
                data == '' ? $('#nomer_surat').val(1) : $('#nomer_surat').val(parseInt(data.nomer_surat) + 1)
                // console.log(data == '' ? true : false);
            }
        })

        $('body #jenis_id').val(localStorage.getItem('surat_id'))
    //    console.log(localStorage.getItem('surat_id'));
    })
    </script>
@endsection
