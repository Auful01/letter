@extends('layout.app')

@section('content')

<table class="table table-hover" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Jabatan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 0 ;
        @endphp
        @foreach ($user as $u)

            <tr>
                <td>{{$no}}</td>
                <td>{{$u->nama_depan . ' ' . $u->nama_belakang}}</td>
                <td>{{$u->username}}</td>
                <td>{{$u->jabatan->jabatan}}</td>
                <td> <button class="btn btn-sm btn-primary" id="detail-anggota" title="Detail Anggota" data-toggle="modal"><i class="fas fa-eye"></i></button> </td>
            </tr>
            @php
                $no++;
            @endphp
        @endforeach
    </tbody>
</table>


<div class="modal fade" id="modal-detailAnggota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Anggota</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" name="" id="nama_lengkap"  class="form-control">
              </div>
              <div class="col form-group">
                <label for="">Username</label>
                <input type="text" name="" id="username"  class="form-control">
              </div>
          </div>
          <label for="">Alamat</label>
          <textarea name=""  class="form-control" id="" cols="30" rows="4"></textarea>

          <div class="row">
            <div class="col form-group">
                <label for="">Jabatan</label>
                <input type="text" name="" id="jabatan"  class="form-control">
              </div>
              <div class="col form-group">
                <label for="">Tanggal Registrasi</label>
                <input type="text" name="" id="tanggal_regis"  class="form-control">
              </div>
              <div class="col form-group">
                <label for="">Status Akun</label>
                <input type="text" name="" id="status_akun"  class="form-control">
              </div>
          </div>
          <div class="row">
            <div class="col form-group">
                <label for="">Status</label>
                <input type="text" name="" id="status"  class="form-control">
              </div>
              <div class="col form-group">
                <label for="">No Hp</label>
                <input type="text" name="" id="phone"  class="form-control">
              </div>
              <div class="col form-group">
                <label for="">Email Aktif</label>
                <input type="text" name="" id="email"  class="form-control">
              </div>
              <div class="col form-group">
                  <img src="" alt="">
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $('#detail-anggota').on('click', function () {
        $('#modal-detailAnggota').modal('show');
    })
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endsection
