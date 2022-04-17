<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SLS </title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

</head>

<body id="page-top">
<style>
    a.isDisabled {
  pointer-events: none;
}

    a.isDisabled {
  color: currentColor;
  cursor: not-allowed;
  opacity: 0.5;
  text-decoration: none;
}
</style>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('layout.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layout.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            {{ ucfirst(Str::replace('-', ' ', Request::segment('1'))) }}</h1>

                    </div>

                    @yield('content')


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    {{-- <a class="btn btn-primary" href="login.html">Logout</a> --}}
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
         function getIdentity() {
            var nik = $('#nik').val()
            var kategoriId = $('#jenis_id').val()
            var nama = $('#nama').val()
            var ttl = $('#tempat').val() + ', ' + $('#tgl-lahir').val()
            var kelamin = $('#kelamin').find(':selected').val()
            var kerja = $('#pekerjaan').find(':selected').val()
            var kerjaLain = $('#kerja-lain').val()
            var nokk = $('#kk').val()
            var alamat = $('#alamat').val()
            var agama = $('#agama').find(':selected').val()
            var statusKawin = $('#status-kawin').find(':selected').val()
            var pendidikan = $('#pendidikan').val()
            var kebangsaan = $('#kebangsaan').val()
            return {
                'nik' : nik,
                'nama' : nama,
                'ttl' : ttl,
                'kelamin' : kelamin,
                'kerja' : kerja,
                'kerjaLain' : kerjaLain,
                'kategoriId' : kategoriId,
                'nokk' : nokk,
                'alamat' : alamat,
                'kebangsaan' : kebangsaan,
                'agama' : agama ,
                'statusKawin' : statusKawin,
                'pendidikan' : pendidikan
            }
            // console.log(nik,nama,ttl,kelamin,kerja,kerjaLain,nokk,alamat,agama,statusKawin,pendidikan);
        }

        function loadTtd() {
            $.ajax({
                url : '/load-ttd',
                type : 'GET',
                success : function (data) {
                    console.log(data);
                    $.each(data, function (k,v) {
                        $('#ttd').append($('<option>').val(v.id).text(v.nama_depan + ' ' + v.nama_belakang))
                    })
                }
            })
        }
    </script>
    @include('layout.js')
    @yield('modal')
    @yield('script')

</body>

</html>
