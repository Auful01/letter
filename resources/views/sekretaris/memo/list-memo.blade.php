@extends('layout.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h5><b>List Memo</b></h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table-memo">
                <thead>
                    <tr>
                        <th>No - Id Memo</th>
                        <th>Pengirim</th>
                        <th>Isi</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $a = 1;
                    @endphp
                    @foreach ($memo as $m)
                        <td>{{$a}} - {{$m->id}}</td>
                        <td>{{$m->user->nama_depan}}  {{$m->user->nama_belakang}}</td>
                        <td>{{ Str::limit($m->isi, 20, '...')}}</td>
                        <td>{{ date('d M Y', strtotime($m->created_at))}}</td>
                        <td><button class="btn btn-primary" id="detail-memo"  data-id="{{$m->id}}" title="Look Detail"><i class="fas fa-eye"></i></button></td>
                        @php
                            $a++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>

    $(document).ready( function () {
        $('#table-memo').DataTable()
    });

    $('body').on('click', '.close', function () {
        $('#modal-detail-memo').modal('hide')
    })

    $('#detail-memo').on('click', function () {
        var id = $(this).data(id)
        $('#modal-detail-memo').modal('show')

        $.ajax({
            url : 'detail-memo',
            type : 'GET',
            data : {
                'id' : id
            },
            success : function (data) {
                console.log(data.isi);
                $('body #pengirim').text(data.user.nama_depan + ' ' + data.user.nama_belakang)
                $('body #detail-isi').val(data.isi).prop('disabled', true)
                $('body #id-memo').text(data.id)
            }
        })
    })
</script>

<div class="modal fade" id="modal-detail-memo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Memo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h6>ID Memo  : <b id="id-memo"></b></h6>
          <h6>Pengirim : <b id="pengirim"></b></h6>
          <div class="form-group">
              <label for="">Isi Memo : </label>
              <textarea name="" id="detail-isi" class="form-control" cols="30" rows="10"></textarea>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
