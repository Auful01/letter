@extends('layout.app')

@section('content')
    <div class="card">
        {{-- <div class="card-header">
            <h5>List Anggota Aktif</h5>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Foto</th>
                            <th>Username</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($usera as $ua)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $ua->user->nama_depan . ' ' . $ua->user->nama_belakang }}</td>
                                <td><img src="{{ asset('storage/profile/'.$ua->foto . '')}}" style="height: 80px" alt=""></td>
                                <td>{{ $ua->user->username }}</td>
                                <td>{{ $ua->user->jabatan->jabatan }}</td>
                                <td> <button class="btn btn-sm btn-primary detail-anggota" data-id="{{ $ua->id }}"
                                        title="Detail Anggota" data-toggle="modal"><i class="fas fa-eye"></i></button>

                                        <button class="btn btn-sm btn-danger hapus-anggota" data-id="{{ $ua->id }}"
                                            title="Detail Anggota" data-toggle="modal"><i class="fas fa-trash-alt"></i></button>
                                </td>
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

    {{-- <div class="card mt-4">
        <div class="card-header">
            <h5>List Anggota Nonaktif</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="iTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($userb as $ub)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $ub->user->nama_depan . ' ' . $ub->user->nama_belakang }}</td>
                                <td>{{ $ub->user->username }}</td>
                                <td>{{ $ub->user->jabatan->jabatan }}</td>
                                <td> <button class="btn btn-sm btn-primary detail-anggota" title="Detail Anggota"
                                        data-id="{{ $ub->id }}" data-toggle="modal"><i
                                            class="fas fa-eye"></i></button> </td>
                            </tr>

                            @php
                                $no++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}


    <div class="modal fade" id="modal-detailAnggota" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <img src="" id="p-profile" style="height: 200px" alt="">
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="" id="nama_lengkap" class="form-control">
                        </div>
                        <div class="col form-group">
                            <label for="">Username</label>
                            <input type="text" name="" id="username" class="form-control">
                        </div>
                    </div>
                    <label for="">Alamat</label>
                    <textarea name="" class="form-control" id="alamat" cols="30" rows="4"></textarea>

                    <div class="row">
                        <div class="col form-group">
                            <label for="">Jabatan</label>
                            <input type="text" name="" id="jabatan" class="form-control">
                        </div>
                        <div class="col form-group">
                            <label for="">Tanggal Registrasi</label>
                            <input type="text" name="" id="tanggal_regis" class="form-control">
                        </div>
                        <div class="col form-group">
                            <label for="">Status Akun</label>
                            <input type="text" name="" id="status_akun" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="">Status</label>
                            <input type="text" name="" id="status" class="form-control">
                        </div>
                        <div class="col form-group">
                            <label for="">No Hp</label>
                            <input type="text" name="" id="phone" class="form-control">
                        </div>
                        <div class="col form-group">
                            <label for="">Email Aktif</label>
                            <input type="text" name="" id="email" class="form-control">
                        </div>
                        <div class="col form-group">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $('.detail-anggota').on('click', function() {
            var id = $(this).data('id')

            console.log(id);
            $('#modal-detailAnggota').appendTo('body').modal('show');

            $.ajax({
                url: 'detail-user',
                type: 'GET',
                data: {
                    'id': id
                },
                success: function(data) {
                    const monthNames = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"
                    ];
                    var buat = new Date(data[0].user.created_at)
                    var d = buat.getDate()
                    var m = buat.getMonth()
                    var y = buat.getFullYear()
                    if (d < 10) {
                        d = '0' + d;
                    }
                    // console.log(d);

                    var tgl = d + ' ' + monthNames[m].substring('0', '3') + ' ' + y
                    console.log(data);
                    var foto = data[0].foto
                    $('#p-profile').attr('src', `{{asset('storage/profile/${foto}')}}`)
                    $('#nama_lengkap').val(data[0].user.nama_depan + ' ' + data[0].user.nama_belakang)
                        .prop('disabled', true)
                    $('#username').val(data[0].user.username).prop('disabled', true)
                    $('#alamat').val(data[0].alamat).prop('disabled', true)
                    $('#jabatan').val(data[0].user.jabatan.jabatan).prop('disabled', true)
                    $('#tanggal_regis').val(tgl).prop('disabled', true)
                    $('#status_akun').val(data[0].status_akun).prop('disabled', true)
                    $('#status').val(data[0].status).prop('disabled', true)
                    $('#phone').val(data[0].phone).prop('disabled', true)
                    $('#email').val(data[0].email).prop('disabled', true)
                }
            })


        })

        $('.hapus-anggota').on('click', function () {
            var id = $(this).data('id')
            console.log(id);
            // $('#modal-hapus-anggota').appendTo('body').modal('show');

            Swal.fire({
                title: 'Anda Yakin?',
                text: "Kamu akan menghapus user ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url : '/hapus-user',
                        type : "DELETE",
                        data : {
                            '_token' : '{{ csrf_token() }}',
                            'id' : id,
                        },
                        success : function (data) {
                            Swal.fire({
                                            title: 'Deleted!',
                                            text: 'User telah dihapus',
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
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('#iTable').DataTable();
        });
    </script>
@endsection
