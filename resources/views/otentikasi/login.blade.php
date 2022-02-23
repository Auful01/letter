<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - SLS</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

</head>

<body id="page-top">


    <div class="container">
        <div class="row d-flex justify-content-center">

            <div class="card" style="margin-top: 10%">
                <div class="card-header">
                    <h3>Login</h3>
                    <p>Sign in to your account to continue</p>
                </div>
                <div class="card-body">
                    <form method="POST" class="p-4" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 form-group">
                            <label for="username" class=" text-md-end">{{ __('username Address') }}</label>

                            {{-- <div class="col-md-6"> --}}
                            <input id="text" type="username" class="form-control @error('username') is-invalid @enderror"
                                name="username" value="{{ old('username') }}" required autocomplete="username"
                                autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- </div> --}}
                        </div>

                        <div class="row d-flex justify-content-between mb-3 form-group">
                            <label for="password " class=" text-md-end">{{ __('Password') }}</label>
                            <a class="btn" id="show-pw"><small>Show Password</small></a>

                            {{-- <div class="col-md-6"> --}}
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- </div> --}}
                        </div>


                        <div class="row mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>


                        </div>
                </div>
                </form>

            </div>
        </div>
    </div>
    </div>

    @include('layout.js')

    <script>
        $('body #show-pw').on('click', function() {
            if ($('#password').attr('type') == 'password') {
                $('#password').attr('type', 'text')
            } else {
                $('#password').attr('type', 'password')
            }

        })
    </script>
</body>

</html>