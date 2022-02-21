@extends('layout.app')

@section('content')
<div class="row">
    <div class="col m-3">
        <div class="card shadow border-left-primary" >
            <div class="card-body py-4" >
                <div class="row d-flex justify-content-between">
                    <div class="col-md-9">
                        <h6 class="text-primary"><b class="primary"> PEGAWAI (TERDAFTAR)</b></h6>
                        <b> 6</b>
                    </div>
                    <div class="col-md-3">
                        <i class="fas fa-clipboard-list fa-3x" style="color: rgba(138, 138, 138, 0.459)"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col m-3">
        <div class="card shadow border-left-info" >
            <div class="card-body py-4" >
                <div class="row d-flex justify-content-between">
                    <div class="col-md-9">
                        <h6 class="text-info"><b class="primary"> SURAT (HARI INI)</b></h6>
                        <b> 6</b>
                    </div>
                    <div class="col-md-3">
                        {{-- <i class="fa-solid fa-envelope-open" ></i> --}}
                        {{-- <i class="fas fa-clipboard-list "></i> --}}
                        <i class="fas fa-envelope-open fa-3x" style="color: rgba(138, 138, 138, 0.459)"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col m-3">
        <div class="card shadow border-left-success" >
            <div class="card-body py-4" >
                <div class="row d-flex justify-content-between">
                    <div class="col-md-9">
                        <h6 class="text-success"><b class="primary"> SURAT (KESELURUHAN)</b></h6>
                        <b> 6</b>
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

    <div class="col m-3">
        <div class="card shadow border-left-warning" >
            <div class="card-body py-4" >
                <div class="row d-flex justify-content-between">
                    <div class="col-md-9">
                        <h6 class="text-warning"><b class="primary">PERMINTAAN TERTUNDA</b></h6>
                        <b> 6</b>
                    </div>
                    <div class="col-md-3">
                        {{-- <i class="fas "></i> --}}
                        {{-- <i class="fas "></i>    --}}
                        <i class="fas fa-concierge-bell fa-3x" style="color: rgba(138, 138, 138, 0.459)"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
