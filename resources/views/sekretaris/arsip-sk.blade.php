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
