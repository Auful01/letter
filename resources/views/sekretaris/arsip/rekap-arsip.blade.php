@extends('layout.app')

@section('content')

<div class="row d-flex justify-content-between">
    <div class="col-md-5 m-3">
        <div class="card shadow border-bottom-primary">
            <div class="card-body">
                <b>REKAPAN SURAT KETERANGAN TIDAK MAMPU</b>
                <br>
                <b>.</b>
            </div>
        </div>
    </div>

    <div class="col-md-3 m-3">
        <div class="card shadow border-bottom-info">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <b>KESELURUHAN SURAT</b>
                    </div>
                    <div class="col-md-3">
                        <i class="fas fa-envelope-open fa-3x" style="color: rgba(138, 138, 138, 0.459)"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 m-3">
        <div class="card shadow border-bottom-warning">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <b>SURAT MASUK HARI INI</b>
                    </div>
                    <div class="col-md-3">
                        <i class="fas fa-envelope-open-text fa-3x" style="color: rgba(138, 138, 138, 0.459)"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5 mx-3">
    {{-- form --}}
    <div class="form-group col-md-3">
        <div class="row">
            <div class="col">
                <select name="tanggal" id="tanggal" class="form-control">

                </select>
            </div>
            <div class="col">
                <select name="bulan" id="bulan" class="form-control">
                </select>
            </div>
            <div class="col">
                <select name="tahun" id="tahun" class="form-control">
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <button class="btn btn-primary" id="cek-arsip">Cek Arsip Dokumen</button>
    </div>


</div>
<div class="table-responsive mx-3">
    <table class="table table-hover" id="table-sktm">
        <thead>
            <tr>
                <th>No - No Surat</th>
                <th>Asal Instansi</th>
                <th>Perihal</th>
                <th>Tanggal Surat</th>
                <th>Tanggal Terima</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id='isi-table'>
            @php
                $no = 0 ;
            @endphp
            @foreach ($surat as $s)

                <tr>
                    <td>{{$no}} - {{$s->no_surat}}</td>
                    <td>{{$s->asal_instansi}}</td>
                    <td>{{$s->perihal}}</td>
                    <td>{{ date('d M Y', strtotime($s->created_at)) }}</td>
                    <td>{{ date('d M Y', strtotime($s->created_at)) }}</td>
                    <td> <button class="btn btn-sm btn-primary detail-arsip" data-id="{{$s->id}}" title="Detail Surat"><i class="fas fa-eye"></i></button> <button class="btn btn-sm btn-danger hapus-arsip" data-id="{{$s->id}}"><i class="fas fa-eraser"></i></button></td>
                </tr>
                @php
                    $no++;
                @endphp
            @endforeach
        </tbody>
    </table>
</div>



{{-- Modal --}}
<div class="modal fade" id="modal-detail-arsip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Surat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group col">
                    <label for="">Nomer Surat Masuk</label>
                    <input type="text" class="form-control"  value=""  id="no_surat" disabled>
                    <input type="text" class="form-control"  value="002/L/409.52.06/V/2022" name="nomer_surat"  id="nomer_surat" hidden>
                </div>

                <div class="form-group col">
                    <label for="">Perihal</label>
                    <input type="text" class="form-control" placeholder="Perihal" name="perihal" id="perihal">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="form-group col">
                    <label for="">Asal Instansi</label>
                    <input type="text" class="form-control" name="instansi" id="instansi">
                </div>

                <div class="form-group col">
                    <label for="">Penginput</label>
                    <input type="text" class="form-control" value="" id="penginput" disabled>
                    {{-- <input type="text" class="form-control" value="{{Auth::user()->nama_depan}} {{Auth::user()->nama_belakang}}" name="penginput_masuk" id="penginput_masuk" hidden> --}}
                </div>
            </div>
            <div class="form-group col">
                <label for="">File Surat Masuk</label>
                <br>
                <a href="" class="btn btn-sm btn-primary" id="file_surat"><i class="fas fa-download"></i></a>
                {{-- <input type="file" class="form-control" value="{{date('d M Y')}}" name="file_surat"> --}}
            </div>
        </div>

      </div>
    </div>
  </div>


<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready( function () {
        $('#table-sktm').DataTable();
    });

    $(document).ready(function () {
        $('body #tanggal').prepend("<option value='' selected='selected'>Tanggal</option>")
        $('body #bulan').prepend("<option value='' selected='selected'>Bulan</option>")
        $('body #tahun').prepend("<option value='' selected='selected'>Tahun</option>")
    })

    $(document).ready(function()
    {
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        let qntYears = 10;

        let selectYear = $("#tahun");
        let selectMonth = $("#bulan");
        let selectDay = $("#tanggal");
        let currentYear = new Date().getFullYear();


        for (var y = 0; y < qntYears; y++) {
            let date = new Date(currentYear);
            let yearElem = document.createElement("option");
            yearElem.value = currentYear
            yearElem.textContent = currentYear;
            selectYear.append(yearElem);
            currentYear--;
        }

        for (var m = 0; m < 12; m++) {
            let month = monthNames[m];
            let monthElem = document.createElement("option");
            monthElem.value = m+1;
            monthElem.textContent = month;
            selectMonth.append(monthElem);
        }

        var d = new Date();
        var month = d.getMonth();
        var year = d.getFullYear();
        //   var day = d.getDate();

        // selectYear.val(year);
        selectYear.on("change", AdjustDays);
        // selectMonth.val(month);
        selectMonth.on("change", AdjustDays);

        AdjustDays();
        //   selectDay.val(day)

        function AdjustDays() {

            // var year = selectYear.val();
            // var month = parseInt(selectMonth.val()) + 1;
            // selectDay.empty();

            //get the last day, so the number of days in that month
            var days = new Date(year, month, 0).getDate();

            //lets create the days of that month

            for (var d = 1; d <= days; d++) {
            var dayElem = document.createElement("option");
            dayElem.value = d;
            dayElem.textContent = d;
            selectDay.append(dayElem);
            }
        }
    });

    $('.hapus-arsip').on('click', function () {
        var id = $(this).data('id')

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : 'hapus-surat',
                    type : 'DELETE',
                    data : {
                        '_token' : '{{csrf_token()}}',
                        'id' : id
                    },
                    success : function () {
                        Swal.fire({
                            title:'Deleted!',
                            text:'Your file has been deleted.',
                            icon:'success',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        setTimeout(() => {
                            window.location.reload()
                        }, 1500);
                    }
                })

            }
        })

    })

    $('body').on('click','.detail-arsip', function () {
        var id = $(this).data('id')
        $('#modal-detail-arsip').modal('show')

        $.ajax({
            url : 'detail-arsip',
            type : 'GET',
            data : {
                'id' : id
            },
            success: function (data) {
                console.log(data);
        //         const monthNames = ["January", "February", "March", "April", "May", "June",
        //     "July", "August", "September", "October", "November", "December"
        // ];
        //         var buat = new Date(data.tanggal_pembuatan)
        //         var d = buat.getDate()
        //         var m = buat.getMonth()
        //         var y = buat.getFullYear()
        //         if (d < 10) {
        //             d = '0' + d;
        //         }

        //         var tgl = d + ' ' + monthNames[m].substring('0','3') + ' ' + y
                // var tgl = `date('d M Y', strtotime(`+buat+`))`
                // console.log(`{{date('d M Y', strtotime('2022-02-10'))}}`);
                // console.log(`{{date('d M Y', strtotime(`+buat+`))}}`);
                // // console.log(`"{{date('d M Y', strtotime('"`+ buat +"'))}}"`);
                // console.log(buat);
                // console.log(`{{date('d M Y', strtotime('22-10-2022'))}}`);

                $('body #no_surat').val(data.no_surat).prop('disabled',true)
                $('body #perihal').val(data.perihal).prop('disabled',true)
                // $('body #tanggal_pembuatan').val(`{{date('d M Y', strtotime( `+ data.created_at + `  ))}}`)
                $('body #instansi').val(data.asal_instansi).prop('disabled',true)
                $('body #file_surat').attr('href', `{{asset('storage/file/${data.file_surat}')}}`)
                $('body #penginput').val(data.user_id).prop('disabled',true)
                // $('body #jenis_kelamin').val(data.jenis_kelamin).prop('selected',true).prop('disabled',true)
                // $('body #agama').val(data.agama).prop('selected', true).prop('disabled',true)
                // $('body #ttl').val(data.ttl).prop('disabled',true)
                // $('body #nik').val(data.nik).prop('disabled',true)
                // $('body #ktp').val(data.ktp).prop('disabled',true)
                // $('body #pekerjaan').val(data.pekerjaan).prop('disabled',true)
                // $('body #pendidikan').val(data.pendidikan).prop('disabled',true)
                // $('body #status').val(data.status).prop('selected', true).prop('disabled',true)
                // $('body #alamat').val(data.alamat).prop('disabled',true)
                // $('body #keperluan').val(data.keperluan).prop('disabled',true)
                // $('body #keterangan').val(data.keterangan).prop('disabled',true)
            }
        })
    })


    $('#cek-arsip').on('click', function () {
        var tanggal = $('#tanggal').find(':selected').val()
        var bulan = $('#bulan').find(':selected').val()
        var tahun = $('#tahun').find(':selected').val()
        // console.log(tanggal, bulan, tahun);
        $('#table-sktm').DataTable()
        $.ajax({
            url : 'selected-arsip',
            type : 'GET',
            data : {
                'tanggal' : tanggal,
                'bulan' : bulan,
                'tahun' : tahun
            },
            success : function (data) {
                $('#isi-table').empty()
                const monthNames = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
                $.each(data, function (k,v) {
                var buat = new Date(v.created_at)
                var d = buat.getDate()
                var m = buat.getMonth()
                var y = buat.getFullYear()
                if (d < 10) {
                    d = '0' + d;
                }

                var tgl = d + ' ' + monthNames[m].substring('0','3') + ' ' + y

                    $('<tr>').append(
                        $('<td>').text(v.no_surat),
                        $('<td>').text(v.asal_instansi),
                        $('<td>').text(v.perihal),
                        $('<td>').append(tgl),
                        $('<td>').append(tgl),
                        $('<td>').append('<button class="btn btn-sm btn-primary detail-arsip" data-id='+v.id+' title="Detail Surat"><i class="fas fa-eye"></i></button>  <button class="btn btn-sm btn-danger hapus-arsip" data-id='+ v.id +'><i class="fas fa-eraser"></i></button>')
                            ).appendTo('#isi-table')
                })


            //         console.log(data);
            //     $('#table-sktm').DataTable().destroy()

            //    var table= $('#table-sktm').DataTable({
            //         destroy: true,
            //         processing: true,
            //         serverSide: true,
            //         responsive: true,
            //         // destroy : true,
            //         columns:[
            //                 {data : 'nomer_surat'},
            //                 {data : 'pembuat'},
            //                 {data: 'nama_pengaju'},
            //                 {data : 'created_at'},
            //                 {data : 'id', render: function (data, type, row) {
            //                     return '<button class="btn btn-sm btn-primary detail-surat" data-id='+data+' title="Detail Surat"><i class="fas fa-eye"></i></button> <button class="btn btn-sm btn-warning" data-id='+ data +'><i class="fas fa-print"></i></button> <button class="btn btn-sm btn-danger hapus-surat" data-id='+ data +'><i class="fas fa-eraser"></i></button>'
            //                 }}
            //             ],

            //     })

            //     setInterval(() => {
            //         table.ajax.reload()
            //     }, 5000);

            }


        })
    })
</script>
@endsection
