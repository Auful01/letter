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
                            <input type="text" class="form-control" name="nomor_surat" id="nomer_surat" >
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
                            <input type="date" class="form-control" name="berlaku_dari" id="berlaku">
                        </div>
                        <div class="col-md-1  text-right">
                            <label for="">Sampai</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="berlaku_sampai" id="sampai">
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
                            <input type="file" id="sk_rtrw" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Menerangkan Bahwa</label>
                        </div>
                        <div class="col">
                            <textarea type="file" cols="30" rows="2" name="keterangan" id="keterangan" class="form-control"></textarea>
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
                            <option value="rafliruk">Rafli Rukantala</option>

                        </select>
                        <small class="text-info"><i class="fas fa-info-circle"></i> surat ini mendukung ttd elektor</small>
                        {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button class="btn btn-sm btn-primary" id="save-skl"> <i class="fas fa-check"></i> Simpan</button>
                <button class="btn btn-sm btn-danger"> <i class="fas fa-redo"></i> Kembali</button>
            </div>
        </div>
    </div>
@endsection


@section('script')
<script>
    $('#pekerjaan').on('change', function () {
        var coba = $(this).find(':selected').val()
        console.log(coba);
        if(coba == 'lain'){
            $('body #kerja-lain').prop('hidden', false)
        } else {
            $('body #kerja-lain').prop('hidden', true)
        }
    })

    $('#save-skl').on('click', function() {
        var fd = new FormData();
        var identity = getIdentity()
        var noSurat = $('#nomer_surat').val()
        var perlu = $('#perlu').val()
        var berlaku = $('#berlaku').val()
        var sampai = $('#sampai').val()
        var tujuan = $('#tujuan').val()
        var keterangan = $('#keterangan').val()
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
        fd.append('keterangan',keterangan)
        fd.append('ttd',ttd)

        $.ajax({
            url : '/save-skl',
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
            url : '/get-last-skl',
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
