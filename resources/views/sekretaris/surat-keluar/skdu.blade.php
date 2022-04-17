@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow border-0 mb-4">
                        <div class="card-header alert-warning bg-warning">
                            Catatan
                        </div>
                        <div class="card-body">
                            <ol>
                                <li>Untuk Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                                <li>Untuk Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                            </ol>
                        </div>
                    </div>
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
                            <b>Nama</b>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <b>Tempat, Tanggal Lahir</b>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <b>Jenis kelamin</b>
                        </div>
                        <div class="col">
                            <select name="" class="form-control" id="kelamin">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <b>Agama</b>
                        </div>
                        <div class="col">
                            <select name="" class="form-control" id="agama">
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
                            <b for="">Pekerjaan</b>
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
                        <div class="col-md-3  text-right">
                            <b for="">Alamat</b>
                        </div>
                        <div class="col">
                            <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control alamat"></textarea>
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
                        <div class="row mb-4">
                            <div class="col-md-3  text-right">
                                <b for="">Surat Keterangan RT/RW</b>
                            </div>
                            <div class="col-md-4">
                                <input type="file" class="form-control" name="sk_rtrw" id="sk_rtrw" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-4">
                            <div class="col-md-3  text-right">
                                <b for="">Tanggal Surat</b>
                            </div>
                            <div class="col-md-4">
                                <input type="data" class="form-control" name="tgl_surat" id="tgl_surat" >
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3  text-right">
                                <b for="">Keperluan</b>
                            </div>
                            <div class="col-md-4">
                                <textarea name="keperluan" class="form-control" id="keperluan" cols="30" rows="2" ></textarea>
                                {{-- <input type="data" class="form-control" name="tgl_surat" id="tgl_surat" > --}}
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
                                <b for="">Nama Usaha</b>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="nama_usaha" id="nama_usaha" >
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3  text-right">
                                <b for="">Bergerak dibidang</b>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="bidang" id="bidang" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-4">
                            <div class="col-md-3  text-right">
                                <b for="">Alamat usaha</b>
                            </div>
                            <div class="col">
                                <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2" ></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3  text-right">
                                <b for="">RT/RW</b>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="rt" id="rt">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="rw" id="rw">
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
        $(document).ready(function () {
            $.ajax({
                url : '/load-ttd',
                type : 'GET',
                success : function (data) {
                    console.log(data);
                    $.each(data, function (k,v) {
                        $('#ttd').append($('<option>').val(v.id).text(v.nama_depan + ' ' + v.nama_belakang))
                    })
                }
            })
        })


        $('#pekerjaan').on('change', function () {
            var coba = $(this).find(':selected').val()
            console.log(coba);
            if(coba == 'lain'){
                $('body #kerja-lain').prop('hidden', false)
            } else {
                $('body #kerja-lain').prop('hidden', true)
            }
        })

        $('#save-skbm').on('click', function() {
            var fd = new FormData();
            var identity = getIdentity()
            var noSurat = $('#nomer_surat').val()
            var perlu = $('#perlu').val()
            var berlaku = $('#berlaku').val()
            var sampai = $('#sampai').val()
            var tujuan = $('#tujuan').val()
            var file = $('#sk_rtrw')[0].files[0]
            var ttd = $('#ttd').val()

            fd.append('_token', '{{ csrf_token() }}')
            fd.append('nik', identity.nik)
            fd.append('nama', identity.nama)
            fd.append('ttl', identity.ttl)
            fd.append('kelamin', identity.kelamin)
            fd.append('pekerjaan', identity.kerja == 'lain' ? identity.kerjaLain : identity.kerja)
            fd.append('nkk', identity.nokk)
            fd.append('kategori_id', identity.kategoriId)
            fd.append('alamat', identity.alamat)
            fd.append('agama', identity.agama)
            fd.append('status_kawin', identity.statusKawin)
            fd.append('pendidikan', identity.pendidikan)
            fd.append('nomer_surat', noSurat)
            fd.append('perlu', perlu)
            fd.append('berlaku', berlaku)
            fd.append('sampai', sampai)
            fd.append('tujuan',tujuan)
            fd.append('file',file)
            fd.append('ttd',ttd)

            $.ajax({
                url : '/save-skbm',
                type : 'POST',
                data : fd,
                contentType : false,
                processData : false,
                success : function () {
                    // alert('success')
                    Swal.fire({
                        title : 'Success',
                        text : 'Data saved!',
                        icon : 'success',
                        showConfirmButton : false,
                        timer : 2000,
                        timeProgressBar :  true
                    })
                    setTimeout(() => {
                        window.open('{{route('arsip-surat-keluar')}}')
                    }, 2000);
                }
            })
            // console.log(identity.nik,identity.nama,identity.ttl,identity.kelamin,identity.kerja,identity.kerjaLain,identity.nokk,identity.alamat,identity.agama,identity.statusKawin,identity.pendidikan, noSurat, perlu,berlaku, sampai,tujuan,file);
        })

        $(document).ready(function () {
            $.ajax({
                url : '/get-last-skbm',
                type : 'GET',
                success : function (data) {
                    console.log(data);
                    data == null ? $('#nomer_surat').val(1) : $('#nomer_surat').val(parseInt(data.nomer_surat) + 1)
                }
            })

            $('body #jenis_id').val(localStorage.getItem('surat_id'))
        //    console.log(localStorage.getItem('surat_id'));
        })
    </script>
@endsection
