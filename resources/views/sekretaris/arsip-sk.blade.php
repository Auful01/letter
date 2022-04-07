@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="myTable">
                <thead>
                    <th>No</th>
                    <th>Nomor Surat</th>
                    <th>Jenis Surat</th>
                    <th>Nama Pemohon</th>
                    <th>Tanggal</th>
                    <th>Tanda Tangan</th>
                    <th>Aksi</th>
                </thead>
                <tbody>

                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@section('modal')
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
                            <input type="file" class="form-control" id="sk_rtrw">
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
                            <option value="auful">Muhammad Auful Kirom</option>

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
    </div>
  </div>
@endsection

@section('script')
<script>
    $(document).ready(function () {

        $.ajax({
            url : '/load-arsip-surat',
            type : 'get',
            success : function (data) {
                console.log(data);
            }
        })
    })
    var table = $('#myTable').DataTable({
        processing : true,
        serverSide : true,
        ajax : '{!! route('load-all-letter') !!}',
        columns : [
            {
                data : 'DT_RowIndex',
                name :'DT_RowIndex'
            },{
                data : 'skbm_id',
                name : 'skbm_id'
            },{
                data : 'kategori',
                name : 'kategori'
            },
            {
                data : 'nama',
                name : 'nama'
            },
            {
                data : 'created_at',
                name : 'created_at'
            },
            {
                data : 'ttd',
                name : 'ttd'
            },
            {
                data : 'action',
                name : 'action'
            }
        ]
    })

    $('body').on('click', '.edit-surat', function () {
        var nosurat = $(this).data('nosurat')
        var kategori = $(this).data('kategori')
        // console.log(alert());
        $('#edit-modal').modal('show')

        $.ajax({
            url : '/find-category',
            type : "GET",
            data : {
                'kategori' : kategori
            },
            success : function (data) {
                console.log(data.link);
                switch (data.link) {
                    case 'form-skbm':
                            $.ajax({
                                url : '/find-skbm',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    console.log(data);
                                    $('#nik').val(data.identitas.nik)
                                    $('#jenis_id').val(data.identitas.jenis_id)
                                    $('#nama').val(data.identitas.nama)
                                    $('#tempat').val(data.identitas.ttl.split(',')[0]) + ', ' + $('#tgl-lahir').val(data.identitas.ttl)
                                    $('#kelamin').val(data.identitas.kelamin).prop('selected', true)
                                    $('#pekerjaan').val(data.identitas.pekerjaan).prop('selected', true)
                                    var kerjaLain = $('#kerja-lain').val()
                                    $('#kk').val(data.identitas.nkk)
                                    $('#alamat').val(data.identitas.alamat)
                                    $('#agama').val(data.identitas.agama).prop('selected', true)
                                    $('#status-kawin').val(data.identitas.status_kawin)
                                    $('#pendidikan').val(data.identitas.pendidikan).prop('selected', true)
                                    $('#nomer_surat').val(data.nomer_surat)
                                    $('#perlu').val(data.perlu)
                                    $('#berlaku').val(data.berlaku)
                                    $('#sampai').val(data.sampai)
                                    $('#tujuan').val(data.tujuan)
                                    $('#ttd').val(data.ttd).prop('selected', true)
                                }
                            })
                        break;

                    default:
                        break;
                }
            }
        })
    })

    $('body').on('click', '.print-surat', function () {
        var nosurat = $(this).data('nosurat')
        var kategori = $(this).data('kategori')
        // console.log(alert());
        $.ajax({
            url : '/find-category',
            type : "GET",
            data : {
                'kategori' : kategori,
            },
            success : function (data) {
                console.log(data.link);
                switch (data.link) {
                    case 'form-skbm':
                            $.ajax({
                                url : '/print-skbm',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    $('body').empty()
                                    $('body').append(data)
                                    window.print()

                                }
                            })
                        break;

                    default:
                        break;
                }
            }
        })
    })

</script>
@endsection
