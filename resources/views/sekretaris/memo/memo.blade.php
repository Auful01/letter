@extends('layout.app')


@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h4><b>Buat Memo</b></h4>
        </div>
        <div class="card-body">
            <form id="form-memo">
                <div class="form-group">
                    <label for="">Isi Memo</label>
                    <textarea name="isi" class="form-control" id="isi" cols="30" rows="10"></textarea>
                </div>
            </form>
            <button class="btn btn-primary" id="save-memo">Submit</button>
            <button class="btn btn-secondary">Cancel</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>

        $('#save-memo').on('click', function () {
            var isi = $('#isi').val()
            $.ajax({
                url : 'save-memo',
                type : 'POST',
                data : {
                    '_token' : '{{ csrf_token() }}',
                    'user_id' : '{{ Auth::user()->id}}',
                    'isi' : isi
                },
                success : function () {
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'Memo Tersimpan!',
                        icon: 'success',
                        timer : 2000,
                        timerProgressBar: true,
                        showConfirmButton : false
                    })

                    setTimeout(function () {
                        window.location.href = '/dashboard'
                    }, 2000)
                    $('#form-memo')[0].reset()
                }
            })
        })
    </script>
@endsection
