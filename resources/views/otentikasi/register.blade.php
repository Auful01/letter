<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

</head>

<body class="bg-gradient-primary">

    <div class="container">


        <div class="card border-0 shadow-lg my-5" style="top: 150px">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset('img/coba.png') }}" class="img-fluid" style="height: 400px" alt="">
                    </div>
                    <div class="col-md-7">
                        <h3 class="my-4 text-center">Pendaftaran Anggota</h3>

                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="nama_depan"
                                            class="form-control  @error('nama_depan') is-invalid @enderror"
                                            placeholder="Nama Depan" value="{{ old('nama_depan') }}"
                                            autocomplete="nama_depan" id="" old required>
                                        @error('nama_depan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" name="nama_belakang"
                                            class="form-control @error('nama_belakang') is-invalid @enderror"
                                            placeholder="Nama Belakang" value="{{ old('nama_belakang') }}"
                                            autocomplete="nama_belakang" id="">
                                        @error('nama_belakang')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="username"
                                            class="form-control @error('username') is-invalid @enderror"
                                            placeholder="Username" value="{{ old('username') }}"
                                            autocomplete="username" id="">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        {{-- <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang" id=""> --}}
                                        <select name="jabatan"
                                            class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                            aria-placeholder="">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group mb-4">
                                <div class="row">
                                    <div class="col">
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" id="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="Re-Password" id="re-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}
                            <button type="submit" class="btn btn-primary" style="width: 100%">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <script>
        $.ajax({
            url: 'load-jabatan',
            type: 'GET',
            success: function(data) {
                $.each(data, function(k, v) {
                    $('#jabatan').append($('<option>').val(v.id).text(v.jabatan).prop('selected', v
                        .jabatan == 'user' ? true : false))
                })
            }
        })
    </script>
</body>

</html>
