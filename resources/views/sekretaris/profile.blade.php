@extends('layout.app')


@section('content')
    <style>
        table #profile {
            border-spacing: 100px
        }

    </style>
    <div class="container">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ asset('storage/profile/' . $user->foto) }}"
                        style="clip-path: circle();max-height: 150px;" alt="">
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-5">
                        <table id="profile" style="width: 100%;">
                            <tr class="spacer"></tr>
                            <tr>
                                <th> Nama </th>
                                <td> : {{ $user->user->nama_depan }} {{ $user->user->nama_belakang }}</td>
                            </tr>
                            <tr class="highlighted"></tr>
                            <tr class="mb-5">
                                <th> Alamat</th>
                                <td> : {{ $user->alamat }}</td>
                            </tr>
                            <tr class="mb-3">
                                <th> Posisi </th>
                                <td> : {{ $user->user->jabatan->jabatan }}</td>
                            </tr>
                        </table>
                    </div>

                </div>
                <button class="btn btn-primary btn-edit">
                    Edit
                </button>



            </div>
        </div>
    </div>
@endsection

@section('modal')
<div class="modal fade" id="edit-profil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <img src="{{ asset('storage/profile/' . $user->foto) }}" style="height: 200px"  alt="" srcset="">
                    </div>
                </div>
            </div>
            <div class="row  my-4 ">
                <div class="col-md-3">
                    <p class="text-right"> <label for="" class="text-right">Foto</label></p>
                </div>
                <div class="col">
                    <input type="file" name="" class="form-control" id="foto">
                    <small>{{$user->foto }}</small>
                    {{-- <input type="text" class="form-control" value="{{ $user->user->nama_depan }} {{ $user->user->nama_belakang }}"> --}}
                </div>
            </div>
            <div class="row mb-4 ">
                <div class="col-md-3">
                    <p class="text-right"> <label for="" class="text-right">Nama</label></p>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="nama" value="{{ $user->user->nama_depan }} {{ $user->user->nama_belakang }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <p class="text-right"> <label for="" >Alamat</label></p>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="alamat" value="{{ $user->alamat }}">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="update-profile">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('script')
    <script>
        $('.btn-edit').on('click', function () {
            $('#edit-profil').modal('show')
        })

        $('#update-profile').on('click', function () {
            var fd = new FormData();
            fd.append('foto', $('#foto')[0].files[0]);
            fd.append('nama', $('#nama').val());
            fd.append('alamat', $('#alamat').val());
            fd.append('_token', '{{ csrf_token() }}');
            // var foto = $('#foto').val()
            // var nama = $('#nama').val()
            // var alamat = $('#alamat').val()
            $.ajax({
                url: "/update-profile",
                type: "POST",
                data: fd,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response)
                    alert('success')
                    $('#edit-profil').modal('hide')
                    location.reload()
                }
            })
        })
    </script>
@endsection
