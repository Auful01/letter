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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" >

</head>

<body class="bg-gradient-primary">

    <div class="container">

        {{-- <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <a href="login.html" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </a>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="card border-0 shadow-lg my-5" style="top: 150px">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{asset('img/coba.png')}}" class="img-fluid" style="height: 400px" alt="">
                    </div>
                    <div class="col-md-7">
                        <h3 class="my-4 text-center">Pendaftaran Anggota</h3>

                        <form action="{{route('register')}}" method="POST">
                            @csrf
                        <div class="form-group mb-4">
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="nama_depan" class="form-control  @error('nama_depan') is-invalid @enderror" placeholder="Nama Depan" value="{{old('nama_depan')}}" autocomplete="nama_depan" id="" old required>
                                    @error('nama_depan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col">
                                    <input type="text" name="nama_belakang" class="form-control @error('nama_belakang') is-invalid @enderror" placeholder="Nama Belakang" value="{{old('nama_belakang')}}" autocomplete="nama_belakang" id="">
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
                                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{old('username')}}" autocomplete="username" id="">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col">
                                    {{-- <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang" id=""> --}}
                                    <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" aria-placeholder="">
                                        <option value="">Pilih Jabatan</option> </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <div class="col">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col">
                                    {{-- <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang" id=""> --}}
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Re-Password" id="re-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%">Daftar</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        $.ajax({
            url : 'load-jabatan',
            type : 'GET',
            success : function (data) {
                $.each(data, function (k,v) {
                    $('#jabatan').append($('<option>').val(v.id).text(v.jabatan))
                })
            }
        })
    </script>
</body>

</html>
