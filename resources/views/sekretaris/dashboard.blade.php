@extends('layout.app')

@section('content')
    {{-- @foreach ($user as $u)
    @endforeach --}}
    <div class="row">
        <div class="col-md-3  ">
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
                            {{-- <i class="fa-solid fa-envelope-open" ></i> --}}
                            {{-- <i class="fas fa-clipboard-list "></i> --}}
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
                            {{-- <i class="fas "></i> --}}
                            {{-- <i class="fas fa-inbox-in"></i> --}}
                            {{-- <i class="fas fa-inbox-in"></i> --}}
                            <i class="fas fa-inbox fa-3x" style="color: rgba(138, 138, 138, 0.459)"></i>
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
@endsection
