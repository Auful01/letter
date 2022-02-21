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
                        <b>SURAT KELUAR HARI INI</b>
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
        <button class="btn btn-primary" id="cek-dokumen">Cek Arsip Dokumen</button>
    </div>


</div>
<div class="table-responsive mx-3">
    <table class="table table-hover" id="table-sktm">
        <thead>
            <tr>
                <th>No - No Surat</th>
                <th>Pembuat</th>
                <th>Pengaju</th>
                <th>Tanggal Buat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id='isi-table'>
            @php
                $no = 0 ;
            @endphp
            @foreach ($sktm as $u)

                <tr>
                    <td>{{$no}} - {{$u->nomer_surat}}</td>
                    <td>{{Auth::user()->nama_depan . ' ' . Auth::user()->nama_belakang}}</td>
                    <td>{{$u->nama_pengaju}}</td>
                    <td>{{ date('d M Y', strtotime($u->created_at)) }}</td>
                    <td> <button class="btn btn-sm btn-primary detail-surat" data-id="{{$u->id}}" title="Detail Surat"><i class="fas fa-eye"></i></button> <a href="{{route('print-pdf')}}" class="btn btn-sm btn-warning" data-id="{{$u->nomer_surat}}"><i class="fas fa-print"></i></a> <button class="btn btn-sm btn-danger hapus-surat" data-id="{{$u->id}}"><i class="fas fa-eraser"></i></button></td>
                </tr>
                @php
                    $no++;
                @endphp
            @endforeach
        </tbody>
    </table>
</div>



{{-- Modal --}}
<div class="modal fade" id="modal-detail-surat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label for="">Nomer Surat</label>
                    <input type="text" name="nomer_surat" class="form-control" id="nomer_surat">
                </div>
                <div class="form-group col">
                    <label for="">Pembuat</label>
                    <input type="text" name="pembuat" class="form-control" id="pembuat">
                </div>
                <div class="form-group col">
                    <label for="">Tanggal Pembuatan</label>
                    <input type="text" name="tanggal_pembuatan" class="form-control" id="tanggal_pembuatan">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="form-group col">
                    <label for="">Nama Pengaju</label>
                    <input type="text" class="form-control" name="nama_pengaju" id="nama_pengaju">
                </div>
                <div class="form-group col">
                    <label for="">Jenis Kelamin</label>
                    {{-- <input type="text" class="form-control" name="" id=""> --}}
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group col">
                    <label for="">Agama</label>
                    {{-- <input type="text" class="form-control" name="" id=""> --}}
                    <select name="agama" id="agama" class="form-control">
                        <option value="">-- Pilih Agama --</option>
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen</option>
                        <option value="konghucu">Konghucu</option>
                        <option value="hindu">Hindu</option>
                        <option value="budha">Budha</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="">Tempat, Tanggal Lahir</label>
                    <input type="text" class="form-control" name="ttl" id="ttl">
                </div>
                <div class="form-group col">
                    <label for="">NIK</label>
                    <input type="text" class="form-control" name="nik" id="nik">
                    {{-- <select name="kelamin" id="" class="form-control"></select> --}}
                </div>
                <div class="form-group col">
                    <label for="">NO KTP</label>
                    <input type="text" class="form-control" name="ktp" id="ktp">
                    {{-- <select name="agama" id="" class="form-control"></select> --}}
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="">Pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
                </div>
                <div class="form-group col">
                    <label for="">Pendidikan</label>
                    <input type="text" class="form-control" name="pendidikan" id="pendidikan">
                    {{-- <select name="kelamin" id="" class="form-control"></select> --}}
                </div>
                <div class="form-group col">
                    <label for="">Status Pernikahan</label>
                    {{-- <input type="text" class="form-control" name="ktp" id=""> --}}
                    <select name="status" id="status" class="form-control">
                        <option value="">-- Pilih Status --</option>
                        <option value="sudah menikah">sudah menikah</option>
                        <option value="belum menikah">belum menikah</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat"  class="form-control" id="alamat" cols="20" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="">Keperluan</label>
                <textarea name="keperluan"  class="form-control" id="keperluan" cols="20" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <textarea name="keterangan"  class="form-control" id="keterangan" cols="20" rows="5"></textarea>
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

    $('.hapus-surat').on('click', function () {
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

    $('body').on('click','.detail-surat', function () {
        var id = $(this).data('id')
        $('#modal-detail-surat').modal('show')

        $.ajax({
            url : 'detail-surat',
            type : 'GET',
            data : {
                'id' : id
            },
            success: function (data) {
                const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
                var buat = new Date(data.tanggal_pembuatan)
                var d = buat.getDate()
                var m = buat.getMonth()
                var y = buat.getFullYear()
                if (d < 10) {
                    d = '0' + d;
                }

                var tgl = d + ' ' + monthNames[m].substring('0','3') + ' ' + y
                // var tgl = `date('d M Y', strtotime(`+buat+`))`
                // console.log(`{{date('d M Y', strtotime('2022-02-10'))}}`);
                // console.log(`{{date('d M Y', strtotime(`+buat+`))}}`);
                // // console.log(`"{{date('d M Y', strtotime('"`+ buat +"'))}}"`);
                // console.log(buat);
                // console.log(`{{date('d M Y', strtotime('22-10-2022'))}}`);

                $('body #nomer_surat').val(data.nomer_surat).prop('disabled',true)
                $('body #pembuat').val(data.pembuat).prop('disabled',true)
                // $('body #tanggal_pembuatan').val(`{{date('d M Y', strtotime( `+ data.created_at + `  ))}}`)
                $('body #tanggal_pembuatan').val(tgl).prop('disabled',true)
                $('body #pembuat').val(data.pembuat).prop('disabled',true)
                $('body #nama_pengaju').val(data.nama_pengaju).prop('disabled',true)
                $('body #jenis_kelamin').val(data.jenis_kelamin).prop('selected',true).prop('disabled',true)
                $('body #agama').val(data.agama).prop('selected', true).prop('disabled',true)
                $('body #ttl').val(data.ttl).prop('disabled',true)
                $('body #nik').val(data.nik).prop('disabled',true)
                $('body #ktp').val(data.ktp).prop('disabled',true)
                $('body #pekerjaan').val(data.pekerjaan).prop('disabled',true)
                $('body #pendidikan').val(data.pendidikan).prop('disabled',true)
                $('body #status').val(data.status).prop('selected', true).prop('disabled',true)
                $('body #alamat').val(data.alamat).prop('disabled',true)
                $('body #keperluan').val(data.keperluan).prop('disabled',true)
                $('body #keterangan').val(data.keterangan).prop('disabled',true)
            }
        })
    })


    $('#cek-dokumen').on('click', function () {
        var tanggal = $('#tanggal').find(':selected').val()
        var bulan = $('#bulan').find(':selected').val()
        var tahun = $('#tahun').find(':selected').val()
        // console.log(tanggal, bulan, tahun);
        $('#table-sktm').DataTable()
        $.ajax({
            url : 'selected-date',
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
                        $('<td>').text(v.nomer_surat),
                        $('<td>').text(v.pembuat),
                        $('<td>').text(v.nama_pengaju),
                        $('<td>').append(tgl),
                        $('<td>').append('<button class="btn btn-sm btn-primary detail-surat" data-id='+v.id+' title="Detail Surat"><i class="fas fa-eye"></i></button> <button class="btn btn-sm btn-warning" data-id='+v.id+'><i class="fas fa-print"></i></button> <button class="btn btn-sm btn-danger hapus-surat" data-id='+ v.id +'><i class="fas fa-eraser"></i></button>')
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
