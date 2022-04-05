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
                <button class="btn btn-primary">
                    Edit
                </button>



            </div>
        </div>
    </div>
@endsection
