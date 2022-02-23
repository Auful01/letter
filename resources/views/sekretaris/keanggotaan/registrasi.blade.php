@extends('layout.app')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <form enctype="multipart/form-data" id="form-anggota">
                @csrf
                <div class="row">
                    <div class="form-group col">
                        <label for="">Nama Depan</label>
                        <input type="text" class="form-control" id="nama-depan" name="nama_depan" placeholder="Nama Depan">
                    </div>
                    <div class="form-group col">
                        <label for="">Nama Belakang</label>
                        <input type="text" class="form-control" id="nama-belakang" name="nama_belakang"
                            placeholder="Nama Belakang">
                    </div>
                    <div class="form-group col">
                        <label for="">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"
                        placeholder="Alamat Lengkap"></textarea>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label for="">Jabatan</label>
                        {{-- <input type="text" name="jabatan" class="form-control" id="jabatan"> --}}
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option value="">-- Pilih Jabatan --</option>
                            <option value="1">Kepala Desa</option>
                            <option value="2">Sekretaris</option>
                            <option value="3">Staff</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="">Status Akun</label>
                        {{-- <input type="text" name="jabatan" class="form-control" id=""> --}}
                        <select name="status_akun" id="status_akun" class="form-control">
                            <option value="aktif" selected>aktif</option>
                            <option value="tidak aktif">tidak aktif</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="">Status</label>
                        {{-- <input type="text" name="jabatan" class="form-control" id=""> --}}
                        <select name="status" id="status" class="form-control">
                            <option value="menikah">menikah</option>
                            <option value="belum menikah" selected>belum menikah</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="">No Hp</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Nomer HP">
                    </div>
                    <div class="form-group col">
                        <label for="">Email aktif</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Foto profil</label>
                    <input type="file" name="foto" class="form-control" id="foto">
                </div>

                <button type="button" class="btn btn-primary" id="submit-register">Submit</button>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $('#submit-register').on('click', function() {
            var namdep = $('#nama-depan').val()
            var nambel = $('#nama-belakang').val()
            var username = $('#username').val()
            var jabatan = $('#jabatan').find(":selected").val()
            var alamat = $('#alamat').val()
            var status_akun = $('#status_akun').find(':selected').val()
            var phone = $('#phone').val()
            var email = $('#email').val()
            var status = $('#status').find(":selected").val()
            var foto = $('#foto')[0].files;
            var fd = new FormData()
            fd.append('_token', '{{ csrf_token() }}')
            fd.append('nama_depan', namdep)
            fd.append('nama_belakang', nambel)
            fd.append('username', username)
            fd.append('jabatan', jabatan)
            fd.append('alamat', alamat)
            fd.append('status_akun', status_akun)
            fd.append('phone', phone)
            fd.append('email', email)
            fd.append('status', status)
            fd.append('file', foto[0])


            $.ajax({
                url: "register-anggota",
                type: 'POST',
                processData: false,
                dataType: 'JSON',
                contentType: false,
                data: fd,
                success: function(data) {
                    Swal.fire({
                        title: 'Good job!',
                        text: 'You clicked the button!',
                        icon: 'success',
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    })
                    setTimeout(() => {
                        window.location.href = "/data-anggota"
                    }, 2000);
                    // $('#form-anggota')[0].reset()
                }
            })
        })
    </script>
@endsection
