@extends('layout.app')

@section('content')
<style>
    #popup {
  display: none;
  border: 1px black solid;
  width: 400px; height: 200px;
  top:20px; left:20px;
  background-color: white;
  z-index: 10;
  padding: 2em;
  position: fixed;
}

.darken { background: rgba(0, 0, 0, 0.7); }

#iframe { border: 0; }
</style>
    {{-- <div class="row d-flex justify-content-between">
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
    </div> --}}

    <div class="row mt-5 mx-3">
        {{-- form --}}
        <div class="form-group col-md-5">
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
        <div class="col"></div>
        <div class="col-md-2 text-right">
            <button class="btn btn-primary" id="print-arsip">Print Arsip Dokumen</button>
        </div>


    </div>
    <div class="card">
        <div class="card-body">
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
                            $no = 0;
                        @endphp
                        @foreach ($surat as $s)
                            <tr>
                                <td>{{ $no }} - {{ $s->no_surat }}</td>
                                <td>{{ $s->asal_instansi }}</td>
                                <td>{{ $s->perihal }}</td>
                                <td>{{ date('d M Y', strtotime($s->created_at)) }}</td>
                                <td>{{ date('d M Y', strtotime($s->created_at)) }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning edit-arsip" data-id="{{ $s->id }}"
                                        title="Detail Surat"><i class="fas fa-pencil-alt"></i></button>
                                    <button class="btn btn-sm btn-primary detail-arsip" data-id="{{ $s->id }}"
                                        title="Detail Surat"><i class="fas fa-eye"></i></button>
                                        <button
                                        class="btn btn-sm btn-danger hapus-arsip" data-id="{{ $s->id }}"><i
                                            class="fas fa-eraser"></i></button></td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-sktm').DataTable();
        });

        $('body').on('click', '.tutup', function (params) {
            $('.modal').modal('hide');
        })

        $(document).ready(function() {
            $('body #tanggal').prepend("<option value='' selected='selected'>Tanggal</option>")
            $('body #bulan').prepend("<option value='' selected='selected'>Bulan</option>")
            $('body #tahun').prepend("<option value='' selected='selected'>Tahun</option>")
        })

        $('#print-arsip').on('click', function () {
            $('#filter-arsip').modal('show')
            console.log('coba');

            $.ajax({
                url : '/load-kategori',
                type : 'GET',
                success : function (data) {
                    $('#kategoriSurat').append($('<option>').text('-- Choose One -- '))
                    $.each(data, function (k,v) {
                        $('#kategoriSurat').append(
                            $('<option>').val(v.id).text(v.nama_kategori)
                        )
                    })
                }
            })
        })

        $(document).ready(function() {
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
                monthElem.value = m + 1;
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

        $('.hapus-arsip').on('click', function() {
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
                        url: 'hapus-surat',
                        type: 'DELETE',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': id
                        },
                        success: function() {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                icon: 'success',
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

        $('body').on('click', '.detail-arsip', function() {
            var id = $(this).data('id')
            $('#modal-detail-arsip').appendTo('body').modal('show')
            console.log(id);
            $.ajax({
                url: 'detail-arsip',
                type: 'GET',
                data: {
                    'id': id
                },
                success: function(data) {
                    console.log(data);
                    $('body #no_surat').val(data.no_surat).prop('disabled', true)
                    $('body #perihal').val(data.perihal).prop('disabled', true)
                    $('body #tgl_surat').val(data.tgl_surat).prop('disabled', true)
                    $('body #sifat_surat').val(data.sifat_surat).prop('disabled', true)
                    $('body #tgl_menerima').val(data.tgl_menerima).prop('disabled', true)
                    // $('body #tanggal_pembuatan').val(`{{ date('d M Y', strtotime(`+ data.created_at + `)) }}`)
                    $('body #instansi').val(data.asal_instansi).prop('disabled', true)
                    $('body .file_surat').attr('href',
                        `{{ asset('storage/file/${data.file_surat}') }}`)
                    $('body .embed').attr('src',
                        `{{ asset('storage/file/${data.file_surat}') }}`)
                    localStorage.setItem('file', data.file_surat)
                    $('body #penginput').val(data.user.nama_depan + ' ' + data.user.nama_belakang).prop('disabled', true)

                }
            })
        })

        $('body').on('click', '.edit-arsip', function() {
            var id = $(this).data('id')
            $('#modal-edit-arsip').appendTo('body').modal('show')
            console.log(id);
            $.ajax({
                url: 'detail-arsip',
                type: 'GET',
                data: {
                    'id': id
                },
                success: function(data) {
                    $('body #nama_file').empty()
                    console.log(data);
                    $('body #id').val(data.id).prop('hidden', true)
                    $('body #no_surat').val(data.no_surat)
                    $('body #perihal').val(data.perihal)
                    $('body #tgl_surat').val(data.tgl_surat)
                    $('body #sifat_surat').val(data.sifat_surat)
                    $('body #tgl_menerima').val(data.tgl_menerima)
                    $('body #instansi').val(data.asal_instansi)
                    $('body #nama_file').append(data.file_surat)
                    $('body .file_surat').attr('href',
                        `{{ asset('storage/file/${data.file_surat}') }}`)
                    $('body .embed').attr('src',
                        `{{ asset('storage/file/${data.file_surat}') }}`)
                    localStorage.setItem('file', data.file_surat)
                    $('body #penginput').val(data.user.nama_depan + ' ' + data.user.nama_belakang).prop('disabled', true)

                }
            })
        })

        $('body').on('click', '#update-arsip', function() {
            var fd = new FormData();
            var modal = '#modal-edit-arsip'
            var id = $(modal).find('#id').val()
            var no_surat = $(modal).find('#no_surat').val()
            var perihal = $(modal).find('#perihal').val()
            var tgl_surat = $(modal).find('#tgl_surat').val()
            var sifat_surat = $(modal).find('#sifat_surat').val()
            var tgl_menerima = $(modal).find('#tgl_menerima').val()
            var instansi = $(modal).find('#instansi').val()
            var file =  $(modal).find('#file')[0].files[0]
            var penginput = $(modal).find('#penginput').val()

            fd.append('_token', '{{ csrf_token() }}')
            fd.append('id', id)
            fd.append('no_surat', no_surat)
            fd.append('perihal', perihal)
            fd.append('tgl_surat', tgl_surat)
            fd.append('sifat_surat', sifat_surat)
            fd.append('tgl_menerima', tgl_menerima)
            fd.append('instansi', instansi)
            fd.append('file', file)
            fd.append('penginput', penginput)

            $.ajax({
                url: 'update-arsip',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function() {
                    Swal.fire({
                        title: 'Updated!',
                        text: 'Your file has been updated.',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    setTimeout(() => {
                        window.location.reload()
                    }, 1500);
                }
            })
        })



        $('body').on('click', '.print_surat', function () {
            var file = localStorage.getItem('file')
            var url = `{{ asset('storage/file/${file}') }}`

            window.open(url, '_blank')
            // $('#embed-modal').appendTo('body').modal('show')
            // $('iframe').attr('src', url)
        })

        $('#cek-arsip').on('click', function() {
            var tanggal = $('#tanggal').find(':selected').val()
            var bulan = $('#bulan').find(':selected').val()
            var tahun = $('#tahun').find(':selected').val()
            // console.log(tanggal, bulan, tahun);
            $('#table-sktm').DataTable()
            $.ajax({
                url: 'selected-arsip',
                type: 'GET',
                data: {
                    'tanggal': tanggal,
                    'bulan': bulan,
                    'tahun': tahun
                },
                success: function(data) {
                    $('#isi-table').empty()
                    const monthNames = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"
                    ];
                    $.each(data, function(k, v) {
                        var buat = new Date(v.created_at)
                        var d = buat.getDate()
                        var m = buat.getMonth()
                        var y = buat.getFullYear()
                        if (d < 10) {
                            d = '0' + d;
                        }

                        var tgl = d + ' ' + monthNames[m].substring('0', '3') + ' ' + y

                        $('<tr>').append(
                            $('<td>').text(v.no_surat),
                            $('<td>').text(v.asal_instansi),
                            $('<td>').text(v.perihal),
                            $('<td>').append(tgl),
                            $('<td>').append(tgl),
                            $('<td>').append(
                                ' <button class="btn btn-sm btn-warning edit-arsip" data-id="' + v.id + '" title="Detail Surat"><i class="fas fa-pencil-alt"></i></button> <button class="btn btn-sm btn-primary detail-arsip" data-id=' +
                                v.id +
                                ' title="Detail Surat"><i class="fas fa-eye"></i></button>  <button class="btn btn-sm btn-danger hapus-arsip" data-id=' +
                                v.id + '><i class="fas fa-eraser"></i></button>')
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

@section('modal')
<div class="modal fade" id="embed-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
            <iframe src="" frameborder="0"  style="width: 100%; height: 100%;"></iframe>
      </div>
    </div>
  </div>

   {{-- Modal --}}
   <div class="modal fade" id="modal-detail-arsip" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
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
                       <input type="text" class="form-control" value="" id="no_surat" disabled>
                       <input type="text" class="form-control" value="002/L/409.52.06/V/2022" name="nomer_surat"
                           id="nomer_surat" hidden>
                   </div>

                   <div class="form-group col">
                       <label for="">Perihal</label>
                       <input type="text" class="form-control" placeholder="Perihal" name="perihal" id="perihal">
                   </div>
               </div>
               <div class="row">
                   <div class="form-group col">
                       <label for="">Tanggal Surat</label>
                       <input type="date" class="form-control" name="tgl_surat" id="tgl_surat">
                   </div>
                   <div class="form-group col">
                       <label for="">Tanggal Menerima</label>
                       <input type="date" class="form-control" name="tgl_menerima" id="tgl_menerima">
                   </div>
                   <div class="form-group col">
                       <label for="">Sifat Surat</label>
                       <input type="text" class="form-control" name="sifat_surat" id="sifat_surat">
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
                   {{-- <embed src="" class="embed" type=""> --}}
                       {{-- <iframe src="" class="embed" frameborder="0"></iframe> --}}
                   <button class="btn btn-danger print_surat"><i class="fas fa-print"></i></button>
                   <a href="" class="btn btn-sm btn-primary file_surat" id="file_surat"><i class="fas fa-download"></i></a>
                   {{-- <input type="file" class="form-control" value="{{date('d M Y')}}" name="file_surat"> --}}
               </div>
           </div>

       </div>
   </div>
</div>

{{-- Filter Arsip --}}
<div class="modal fade" id="filter-arsip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog  modal-xl">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Filter Arsip</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
           <form action="{{ route('report-arsip')}}">
               <div class="mb-2 row">
                   <div class="col-md-2 text-right">Dari Tanggal</div>
                   <div class="col-md-4"><input type="date" class="form-control" name="dari" id="dari"></div>
                   <div class="col-md-2 text-right">Sampai Tanggal</div>
                   <div class="col-md-4"><input type="date" class="form-control" name="sampai" id="sampai"></div>
               </div>

               <div class="text-right">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" id="print-report">Print</button>
               </div>
           </form>
       </div>

     </div>
   </div>
</div>


{{-- Edit --}}
<div class="modal fade" id="modal-edit-arsip" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-xl modal-dialog-centered">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Edit Surat</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <input type="text" name="" id="id">
               <div class="row">
                   <div class="form-group col">
                       <label for="">Nomer Surat Masuk</label>
                       <input type="text" class="form-control" value="" id="no_surat" >
                       {{-- <input type="text" class="form-control" value="002/L/409.52.06/V/2022" name="nomer_surat"
                           id="nomer_surat" hidden> --}}
                   </div>

                   <div class="form-group col">
                       <label for="">Perihal</label>
                       <input type="text" class="form-control" placeholder="Perihal" name="perihal" id="perihal">
                   </div>
               </div>
               <div class="row">
                   <div class="form-group col">
                       <label for="">Tanggal Surat</label>
                       <input type="date" class="form-control" name="tgl_surat" id="tgl_surat">
                   </div>
                   <div class="form-group col">
                       <label for="">Tanggal Menerima</label>
                       <input type="date" class="form-control" name="tgl_menerima" id="tgl_menerima">
                   </div>
                   <div class="form-group col">
                       <label for="">Sifat Surat</label>
                       <input type="text" class="form-control" name="sifat_surat" id="sifat_surat">
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
               <div class="row">
                   <div class="form-group col-md-6">
                       <label for="">File Surat Masuk</label>
                       <br>
                       {{-- <embed src="" class="embed" type=""> --}}
                           {{-- <iframe src="" class="embed" frameborder="0"></iframe> --}}

                       {{-- <button class="btn btn-danger print_surat"><i class="fas fa-print"></i></button>
                       <a href="" class="btn btn-sm btn-primary file_surat" id="file_surat"><i class="fas fa-download"></i></a> --}}
                       <input type="file" title="Coba" class="form-control" value="{{date('d M Y')}}" name="file_surat" id="file">
                       <small id="nama_file"></small>
                   </div>
               </div>
               <div class="text-right">
                   <button class="btn btn-sm btn-primary" id="update-arsip"> <i class="fas fa-check"></i> Simpan</button>
                   <button class="btn btn-sm btn-danger tutup"> <i class="fas fa-times"></i> Batal</button>
               </div>
           </div>

       </div>
   </div>
</div>

@endsection
