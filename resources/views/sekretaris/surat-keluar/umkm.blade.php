@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <input type="text" id="jenis_id" value="" hidden>
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <b>Domisili Pemohon</b>
                        </div>
                        <div class="col">
                            {{-- <select name="" class="form-control" id="domisili"></select> --}}
                            <input type="text" class="form-control" id="domisili">
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
                            <input type="text" class="form-control" name="bidang" id="bidang_usaha" >
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
                            <textarea name="alamat" id="alamat_usaha" class="form-control" cols="30" rows="2"></textarea>
                            {{-- <input type="text" class="form-control" name="alamat" id="alamat" > --}}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <b for="">Kelurahan</b>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="kelurahan_usaha">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <b for="">Kecamatan</b>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="kecamatan_usaha">
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
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-sm btn-primary" id="save-umkm"> <i class="fas fa-check"></i> Simpan</button>
                    <button class="btn btn-sm btn-danger"> <i class="fas fa-redo"></i> Kembali</button>
                </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        loadTtd()

        $(document).ready(function () {
            $('body #jenis_id').val(localStorage.getItem('surat_id'))

            $.ajax({
                url:'/get-last-umkm',
                type : 'GET',
                success : function(data){
                    $('#nomer_surat').val(data.nomor_surat == null ? '1' : parseInt(data.nomor_surat) + 1)
                }
            })
        })

        $('#save-umkm').on('click', function() {
            var data = {
                _token: '{{ csrf_token() }}',
                kategori_id : $('#jenis_id').val(),
                domisili : $('#domisili').val(),
                nama : $('#nama').val(),
                telepon : $('#telepon').val(),
                alamat : $('#alamat').val(),
                desa : $('#kelurahan').val(),
                kecamatan : $('#kecamatan').val(),
                kabupaten : $('#kota').val(),
                nomor_surat : $('#nomer_surat').val(),
                nama_tempat : $('#nama_tempat').val(),
                bidang_usaha : $('#bidang_usaha').val(),
                modal : $('#modal').val(),
                sarana : $('#sarana').val(),
                alamat_usaha : $('#alamat_usaha').val(),
                kelurahan_usaha : $('#kelurahan_usaha').val(),
                kecamatan_usaha : $('#kecamatan_usaha').val(),
                ttd : $('#ttd').find(':selected').val(),
            }

            $.ajax({
                url:'/save-umkm',
                type: 'POST',
                data: data,
                success: function(data) {
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil disimpan',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            // confirmButtonText: 'Ok'
                        })

                        setTimeout(function() {
                            window.location.href = '/arsip-surat-keluar'
                        }, 2000)
                }
            })
        })
    </script>
@endsection
