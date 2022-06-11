@extends('layout.app')

@section('content')
    {{-- @foreach ($user as $u)
    @endforeach --}}
    <div class="row">
        {{-- <div class="col-md-3  ">
            <div class="card shadow border-left-primary">
                <div class="card-body py-4">
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-9">
                            <b class="text-primary"> PEGAWAI (TERDAFTAR)</b>
                            <br>
                            <b> {{ $user }}</b>
                        </div>
                        <div class="col-md-3">
                            <i class="fas fa-clipboard-list fa-3x" style="color: rgba(138, 138, 138, 0.459)"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3  ">
            <div class="card shadow border-left-info">
                <div class="card-body py-4">
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-9">
                            <b class="text-info"> SURAT (HARI INI)</b>
                            <br>
                            <b> {{ $sktmNow }}</b>
                        </div>
                        <div class="col-md-3">
                            <i class="fas fa-envelope-open fa-3x" style="color: rgba(138, 138, 138, 0.459)"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3  ">
            <div class="card shadow border-left-success">
                <div class="card-body py-4">
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-9">
                            <b class="text-success"> SURAT (KESELURUHAN)</b>
                            <br>
                            <b> {{ $sktm }}</b>
                        </div>
                        <div class="col-md-3">

                            <i class="fas fa-inbox fa-3x" style="color: rgba(138, 138, 138, 0.459)"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="col-lg-3 col-6">

            <div class="small-box bg-primary">
                <div class="inner">
                    <h3 style="color: #fff">{{ $user }}</h3>
                    <p style="color: #fff">PEGAWAI (TERDAFTAR)</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clipboard-list " ></i>
                </div>
                <a href="{{route('data-anggota')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    @foreach ($sktmNow as $now)

                    <h3 style="color: #fff">{{ $now->id }}</h3>
                    @endforeach
                    <p style="color: #fff">SURAT KELUAR(HARI INI)</p>
                </div>
                <div class="icon">
                    <i class="fas fa-envelope-open" ></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>
        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3 style="color: #fff"> {{ $sktm }}</h3>
                    <p style="color: #fff"> SURAT KELUAR(KESELURUHAN)</p>
                </div>
                <div class="icon">
                    <i class="fas fa-inbox "></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            {{-- <div style="background-image: url('/public/image/jam.jpg')"></div> --}}
            <div class="small-box bg-secondary">
                <div class="inner">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 style="color: #fff" id="hari"></h3>
                            <p style="color: #fff" id="tanggal"></p>
                        </div>
                        <div class="col-md-6">
                            <p  class="text-right" style="color: #fff; font-size: 15pt;margin-top: 10px">
                                <b id="jam"></b> :  <b id="menit"></b> : <b id="detik"></b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="icon">
                    <div class="position-relative">
                        <div class="position-absolute top-0 end-0" >
                                <b id="jam"></b> :  <b id="menit"></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @if (Auth::user()->jabatan->jabatan == 'Kepala Desa')
            <div class="col-md-3  ">
                <div class="card shadow border-left-success">
                    <div class="card-body py-4">
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-9">
                                <b class="text-success"> MEMO</b>
                                <br>
                                <b> {{ $memo }}</b>
                            </div>
                            <div class="col-md-3">
                                {{-- <i class="fas "></i> --}}
                                {{-- <i class="fas fa-inbox-in"></i> --}}
                                {{-- <i class="fas fa-inbox-in"></i> --}}
                                <i class="fas fa-inbox fa-3x" style="color: rgba(138, 138, 138, 0.459)"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
        <h5>Hallo, Selamat Datang {{Auth::user()->nama_depan . ' '. Auth::user()->nama_belakang}}</h5>


        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <b><i class="fas fa-file-alt"></i>  &nbsp;MEMO</b>
            <hr>
            {{-- <strong>Coba</strong> --}}
            <p id="last-memo"></p>
            <small id="tgl-memo"></small>
        </div>
        <hr>
        <h5>Latest Memo</h5>
        <div class="table-responsive">
            <table class="table table-bordered"  id="memo">
                <thead>
                    <th>No</th>
                    <th>Memo</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

@endsection

@section('modal')
<div class="modal fade" id="edit-memo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="text" name="" id="memo_id" hidden>
            <div class="form-group">
                <label for="">Memo</label>
                <textarea name="memo" id="memo_isi" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="update-memo">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script>

    $(document).ready(function(){
        $.ajax({
            url: "/last-memo",
            method: "GET",
            success: function(data){
                // console.log(data);
                var date = data.created_at
                $("#last-memo").append(data.isi);
                $("#tgl-memo").append(date.split('T')[0]);

            }
        });
    })

    $(document).ready(function(){
        var date = Date(Date.now())
        var tgl = date.toString()
        var dt = tgl.trim().split(/\s+/)
        console.log(dt);
        var hari = ""
        switch (dt[0]) {
            case 'Sun':
                hari = "Minggu"
                break;
            case 'Mon':
                hari = "Senin"
                break;
            case 'Tue':
                hari = "Selasa"
                break;
            case 'Wed':
                hari = "Rabu"
                break;
            case 'Thu':
                hari = "Kamis"
                break;
            case 'Fri':
                hari = "Jumat"
                break;
            case 'Sat':
                hari = "Sabtu"
                break;
            default:
                break;
        }
                $("#hari").append(hari);
                $("#tanggal").append(dt[2] + ' ' + dt[1] + ' ' + dt[3] );
        // $.ajax({
        //     url: "/last-memo",
        //     method: "GET",
        //     success: function(data){
        //         // console.log(data);


        //     }
        // });
    })

    setInterval(() => {
        $('#jam').empty()
        $('#menit').empty()
        $('#detik').empty()
    d = new Date(); //object of date()
    hr = d.getHours();
    min = d.getMinutes();
    sec = d.getSeconds();
    // hr_rotation = 30 * hr + min / 2; //converting current time
    // min_rotation = 6 * min;
    // sec_rotation = 6 * sec;

    $('#jam').append(hr < 10 ? '0' + hr : hr);
    $('#menit').append(min < 10 ? '0' + min : min);
    $('#detik').append(sec < 10 ? '0' + sec : sec);


    // hour.style.transform = `rotate(${hr_rotation}deg)`;
    // minute.style.transform = `rotate(${min_rotation}deg)`;
    // second.style.transform = `rotate(${sec_rotation}deg)`;
}, 1000);


    $('body').on('click','.edit-memo', function () {
        var id = $(this).data('id');
        $.ajax({
            url: "/edit-memo",
            method: "GET",
            data: {id: id},
            success: function(data){
                console.log(data);
                $("#edit-memo").modal('show');
                $("#memo_id").val(data.id);
                $("#memo_isi").append(data.isi);
            }
        });
    })

    $('body').on('click','#update-memo', function () {
        var id = $("#memo_id").val();
        var isi = $("#memo_isi").val();
        $.ajax({
            url: "/update-memo",
            method: "POST",
            data: {
                _token : "{{ csrf_token() }}",
                id: id,
                isi: isi},
            success: function(data){
                console.log(data);
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Memo berhasil diupdate',
                    showConfirmButton: false,
                    timer: 1500
                });
                $("#edit-memo").modal('hide');
                setTimeout(() => {
                    // location.reload();
                    $('#memo').DataTable().ajax.reload();
                }, 1500);
            }
        });
    })

    $('body').on('click','.hapus-memo', function () {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda tidak dapat mengembalikan data yang sudah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "/hapus-memo",
                    method: "POST",
                    data: {
                        _token : "{{ csrf_token() }}",
                        id: id},
                    success: function(data){
                        console.log(data);
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Memo berhasil dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            $('#memo').DataTable().ajax.reload();
                        }, 1500);

                    }
                });
            }
        })
    })

    // $(document).ready(function () {
    //     $.ajax({
    //         url: "/all-memo",
    //         method: "GET",
    //         success : function (data) {
    //             console.log(data);
    //         }
    //     })
    // })

    $('#memo').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/all-memo',
            order: [[0,'desc']],
            columns: [
                { data: 'DT_RowIndex',
                name: 'DT_RowIndex'
                },{
                    data: "isi_memo",
                    name: "isi_memo"
                 },{
                    data: "tgl_memo",
                    name: "tgl_memo"
                },{
                    data: "action",
                    name: "action"   },

            ]
        }
    );


</script>
@endsection
