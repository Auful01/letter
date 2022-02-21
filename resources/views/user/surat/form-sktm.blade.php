@extends('layout.app')


@section('content')
    <div class="card border-0 shadow">
        <div class="card-body">
            <form action="{{route('store-sktm')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col">
                        <label for="">Nomer Surat</label>
                        <input type="text" name="" class="form-control" id="" value="002/L/409.52.06/V/2022" disabled>
                        <input type="text" name="nomer_surat" class="form-control" id="nomer_surat" value="002/L/409.52.06/V/2022" hidden>
                    </div>
                    <div class="form-group col">
                        <label for="">Pembuat</label>
                        <input type="text" name="" class="form-control" id="" value="{{Auth::user()->nama_depan}} {{Auth::user()->nama_belakang}}" disabled>
                        <input type="text" name="pembuat" class="form-control" id="pembuat" value="{{Auth::user()->nama_depan}} {{Auth::user()->nama_belakang}}" hidden>
                    </div>
                    <div class="form-group col">
                        <label for="">Tanggal Pembuatan</label>
                        <input type="text" name="" value="{{date('d M Y') }}" class="form-control" id="" disabled>
                        <input type="text" name="tanggal_pembuatan" value="{{date('Y-m-d') }}" class="form-control" id="tanggal_pembuatan"  hidden>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col">
                        <label for="">Nama Pengaju</label>
                        <input type="text" class="form-control" name="nama_pengaju" id="nama_pengaju">
                    </div>
                    <div class="form-group col">
                        <label for="">Jenis Kelamin</label>
                        {{-- <input type="text" class="form-control" name="" id=""> --}}
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="">Agama</label>
                        {{-- <input type="text" class="form-control" name="" id=""> --}}
                        <select name="agama" id="agama" class="form-control">
                            <option value="">-- Pilih Agama --</option>
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="konghucu">Konghucu</option>
                            <option value="hindu">Hindu</option>
                            <option value="budha">Budha</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control" name="ttl" id="">
                    </div>
                    <div class="form-group col">
                        <label for="">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nik">
                        {{-- <select name="kelamin" id="" class="form-control"></select> --}}
                    </div>
                    <div class="form-group col">
                        <label for="">NO KTP</label>
                        <input type="text" class="form-control" name="ktp" id="ktp">
                        {{-- <select name="agama" id="" class="form-control"></select> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
                    </div>
                    <div class="form-group col">
                        <label for="">Pendidikan</label>
                        <input type="text" class="form-control" name="pendidikan" id="pendidikan">
                        {{-- <select name="kelamin" id="" class="form-control"></select> --}}
                    </div>
                    <div class="form-group col">
                        <label for="">Status Pernikahan</label>
                        {{-- <input type="text" class="form-control" name="ktp" id=""> --}}
                        <select name="status" id="status" class="form-control">
                            <option value="">-- Pilih Status --</option>
                            <option value="sudah menikah">sudah menikah</option>
                            <option value="belum menikah">belum menikah</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat"  class="form-control" id="alamat" cols="20" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Keperluan</label>
                    <textarea name="keperluan"  class="form-control" id="keperluan" cols="20" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan"  class="form-control" id="keterangan" cols="20" rows="5"></textarea>
                </div>
                <button type="submit"  class="btn btn-primary">
                    Buat Surat
                </button>
            </form>
        </div>
    </div>
@endsection
