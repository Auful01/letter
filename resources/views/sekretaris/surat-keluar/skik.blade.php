{{-- FIXED --}}
@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('sekretaris.surat-keluar.identitas')
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Keterangan</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Nomor</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="nomor_surat" id="nomor_surat" >
                            <small class="text-muted">*nomor surat bertambah otomatis</small>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">keperluan</label>
                        </div>
                        <div class="col">
                            <textarea name="perlu" class="form-control" id="perlu" cols="30" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Berlaku</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="berlaku" id="berlaku">
                        </div>
                        <div class="col-md-1  text-right">
                            <label for="">Sampai</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="sampai" id="sampai">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Tujuan</label>
                        </div>
                        <div class="col">
                            <textarea name="tujuan" class="form-control" id="tujuan" cols="30" rows="2"></textarea>
                            {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Surat Keterangan RT/RW</label>
                        </div>
                        <div class="col">
                            <input type="file" class="form-control" id="sk_rtrw">
                        </div>
                    </div>
                </div>

            </div>


            <h5 class="mt-3" style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Keterangan Acara</h5>
            <hr>
            <div class="row my-5">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3  text-right">
                            <label for="">Nama Acara</label>
                        </div>
                        <div class="col">
                            <input type="text" name="nama_acara" id="nama_acara" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3  text-right">
                            <label for="">Tanggal Acara</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" name="tgl_acara" id="tgl_acara" class="form-control">
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
                        <small class="text-info"><i class="fas fa-info-circle"></i> surat ini mendukung ttd elektor</small>
                        {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button class="btn btn-sm btn-primary" id="save-skik"> <i class="fas fa-check"></i> Simpan</button>
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

        $('#save-skik').on('click', function() {
            var fd = new FormData();
            var identity = getIdentity()
            var noSurat = $('#nomor_surat').val()
            var perlu = $('#perlu').val()
            var berlaku = $('#berlaku').val()
            var sampai = $('#sampai').val()
            var tgl_acara = $('#tgl_acara').val()
            var nama_acara = $('#nama_acara').val()
            var tujuan = $('#tujuan').val()
            var file = $('#sk_rtrw')[0].files[0]
            var ttd = $('#ttd').find(':selected').val()
            console.log(berlaku,sampai);
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
            fd.append('tgl_acara', tgl_acara)
            fd.append('nama_acara', nama_acara)
            fd.append('berlaku', berlaku)
            fd.append('sampai', sampai)
            fd.append('tujuan',tujuan)
            fd.append('file',file)
            fd.append('ttd',ttd)

            $.ajax({
                url : '/save-skik',
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
                url : '/get-last-skik',
                type : 'GET',
                success : function (data) {
                    console.log(data == '' ? true : false);
                    data == '' ? $('#nomor_surat').val(1) : $('#nomor_surat').val(parseInt(data.nomer_surat) + 1)
                }
            })

            $('body #jenis_id').val(localStorage.getItem('surat_id'))
        //    console.log(localStorage.getItem('surat_id'));
        })
    </script>
@endsection

