@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <input type="text" id="jenis_id" value="" hidden>
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
                            <input type="text" id="domisili" class="form-control">

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
                           <input type="date" class="form-control" id="tgl-lahir" name="lahir">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kewarganegaraan</label>
                        </div>
                        <div class="col">
                           <input type="text" class="form-control" id="kebangsaan" name="warganegara">
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
                            <input type="text" class="form-control" id="kabupaten" name="kabupaten">
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
                            <input type="text" class="form-control" name="nama_mati" id="nama_mati" >
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Tanggal Meninggal</label>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" name="tgl_mati" id="tgl_mati" >
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
                    <button class="btn btn-sm btn-primary" id="save-spm"> <i class="fas fa-check"></i> Simpan</button>
                    <button class="btn btn-sm btn-danger"> <i class="fas fa-redo"></i> Kembali</button>
                </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        loadTtd()

        $(document).ready(function () {
            $.ajax({
                url : '/get-last-spm',
                type : 'GET',
                success : function (data) {
                    console.log(data);
                    data == '' ? $('#nomer_surat').val(1) : $('#nomer_surat').val(parseInt(data.nomer_surat) + 1)
                }
            })

            $('body #jenis_id').val(localStorage.getItem('surat_id'))
        //    console.log(localStorage.getItem('surat_id'));
        })

        $('#save-spm').on('click', function () {
            var fd = new FormData();
            var identity = getIdentity()
            var noSurat = $('#nomer_surat').val()

            fd.append('_token', '{{ csrf_token() }}')
            fd.append('nama', identity.nama)
            fd.append('ttl', identity.ttl)
            fd.append('domisili', $('#domisili').val())
            fd.append('kategori_id', identity.kategoriId)
            fd.append('alamat', identity.alamat)
            fd.append('agama', identity.agama)
            fd.append('kebangsaan', identity.kebangsaan)
            fd.append('agama', identity.agama)
            fd.append('domisili', $('#domisili').val())
            fd.append('kelurahan', $('#kelurahan').val())
            fd.append('kecamatan', $('#kecamatan').val())
            fd.append('kabupaten', $('#kabupaten').val())
            fd.append('nomer_surat', $('#nomer_surat').val())
            fd.append('nomor_surat', $('#nomer_surat').val())
            fd.append('nama_mati', $('#nama_mati').val())
            fd.append('tgl_mati', $('#tgl_mati').val())
            fd.append('ttd', $('#ttd').val())

            $.ajax({
                url : '/save-spm',
                type : 'POST',
                data : fd,
                contentType : false,
                processData : false,
                success : function (data) {
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
        })
    </script>
@endsection
