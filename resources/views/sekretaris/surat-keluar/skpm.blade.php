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
                            <label for="">Surat Keterangan RT/RW</label>
                        </div>
                        <div class="col">
                            <input type="file" class="form-control" id="sk_rtrw">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Keperluan</label>
                        </div>
                        <div class="col">
                            <textarea name="perlu" class="form-control" id="perlu" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Berlaku</label>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" name="" id="berlaku">
                            {{-- <textarea name="perlu" class="form-control" id="perlu" cols="30" rows="2"></textarea> --}}
                        </div>
                        <div class="col-md-3  text-right">
                            <label for="">Sampai</label>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" name="" id="sampai">
                            {{-- <textarea name="perlu" class="form-control" id="perlu" cols="30" rows="2"></textarea> --}}
                        </div>
                    </div>
                </div>

            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Pindah Dari</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Alamat Asal</label>
                        </div>
                        <div class="col">
                            <textarea name="alamat" class="form-control" id="alamat_asal" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Kab/Kota</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="kota" id="kota">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Kelurahan/Desa</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="kelurahan" id="kelurahan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Kecamatan</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="kecamatan" id="kecamatan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Provinsi</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="provinsi" id="provinsi">
                        </div>
                    </div>
                </div>
            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Keterangan Pindah</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3  text-right">
                            <label for="">Tanggal pindah</label>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" name="tgl_pindah" id="tgl_pindah">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <label for="">Alamat Pindah</label>
                        </div>
                        <div class="col">
                            <textarea name="alamat_pindah" class="form-control" id="alamat_pindah" cols="30" rows="2"></textarea>
                            {{-- <input type="date" class="form-control" name="tgl_pindah" id="tgl_pindah"> --}}
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="mt-4" style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Pengikut</h5>
            <hr>
            <button class="btn btn-success form-control">Klik Untuk tambah pengikut</button>
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>No. KTP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tgl. Lahir</th>
                    <th>Status Perkawinan</th>
                    <th>Pendidikan</th>
                    <th>Keterangan</th>
                </thead>
                <tbody></tbody>
            </table>
            <h5 class="mt-4" style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Tanda tangan surat</h5>
            <hr>
            <div class="col-md-6">
                <div class="row">

                    <div class="col-md-3  text-right">
                        <label for="">Tanda tangan surat</label>
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
                <button class="btn btn-sm btn-primary" id="save-skpm"> <i class="fas fa-check"></i> Simpan</button>
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

        $('#save-skpm').on('click', function() {
            var fd = new FormData();
            var identity = getIdentity()
            var noSurat = $('#nomer_surat').val()
            var perlu = $('#perlu').val()
            var berlaku = $('#berlaku').val()
            var sampai = $('#sampai').val()
            var alamat_asal = $('#alamat_asal').val()
            var tgl_pindah = $('#tgl_pindah').val()
            var alamat_pindah = $('#alamat_pindah').val()
            var kabupaten = $('#kota').val()
            var desa = $('#kelurahan').val()
            var kecamatan = $('#kecamatan').val()
            var provinsi = $('#provinsi').val()
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
            fd.append('kebangsaan', identity.kebangsaan)
            fd.append('nomer_surat', noSurat)
            fd.append('perlu', perlu)
            fd.append('berlaku', berlaku)
            fd.append('sampai', sampai)
            fd.append('alamat_asal',alamat_asal)
            fd.append('alamat_pindah',alamat_pindah)
            fd.append('tgl_pindah',tgl_pindah)
            fd.append('kabupaten',kabupaten)
            fd.append('desa',desa)
            fd.append('kecamatan',kecamatan)
            fd.append('provinsi',provinsi)
            fd.append('file',file)
            fd.append('ttd',ttd)

            $.ajax({
                url : '/save-skpm',
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
                url : '/get-last-skpm',
                type : 'GET',
                success : function (data) {
                    console.log(data);
                    data == '' ? $('#nomer_surat').val(1) : $('#nomer_surat').val(parseInt(data.nomer_surat) + 1)
                }
            })

            $('body #jenis_id').val(localStorage.getItem('surat_id'))
        //    console.log(localStorage.getItem('surat_id'));
        })
    </script>
@endsection

