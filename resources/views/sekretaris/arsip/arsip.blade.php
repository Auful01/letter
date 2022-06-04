@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Form Tambah Surat Masuk Baru
        </div>
        <div class="card-body">
            <form action="{{ route('store-arsip') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col">
                        <label for="">Nomer Surat Masuk</label>
                        <input type="text" class="form-control"  name="nomer_surat" id="nomer_surat" >
                        {{-- <input type="text" class="form-control" value="002/L/409.52.06/V/2022" name="nomer_surat"
                            id="nomer_surat" hidden> --}}
                    </div>

                    <div class="form-group col">
                        <label for="">Perihal</label>
                        <input type="text" class="form-control" placeholder="Perihal" name="perihal" id="perihal">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="">Tanggal Surat</label>
                        <input type="date" class="form-control" name="tgl_surat">
                    </div>
                    <div class="form-group col">
                        <label for="">Tanggal Menerima</label>
                        <input type="date" class="form-control" name="tgl_menerima">
                    </div>
                    <div class="form-group col">
                        <label for="">Sifat Surat</label>
                        <input type="text" class="form-control" name="sifat_surat">
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="form-group col">
                        <label for="">Asal Instansi</label>
                        <input type="text" class="form-control" name="instansi" id="instansi" placeholder="UM" required>
                    </div>
                    <div class="form-group col">
                        <label for="">File Surat Masuk</label>
                        <input type="file" class="form-control" value="{{ date('d M Y') }}" name="file_surat" required>
                    </div>
                    <div class="form-group col">
                        <label for="">Admin</label>
                        <input type="text" class="form-control"
                            value="{{ Auth::user()->nama_depan }} {{ Auth::user()->nama_belakang }}" id="" disabled>
                        <input type="text" class="form-control"
                            value="{{ Auth::user()->nama_depan }} {{ Auth::user()->nama_belakang }}"
                            name="penginput_masuk" id="penginput_masuk" hidden>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" id="submit-arsip">
                   Arsipkan File
                </button>
            </form>
        </div>
    </div>
@endsection
