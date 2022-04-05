<div class="row d-flex justify-content-between mx-3">
    <div class="col-md-6">
        <div class="row mb-4">
            <input type="text" id="jenis_id" value="" hidden>
            <div class="col-md-3  text-right">
                <label for="">NIK</label>
            </div>
            <div class="col-md-9">
            <input type="text" name="nik" id="nik" class="form-control">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-3  text-right">
                <label for="">Nama</label>
            </div>
            <div class="col-md-9">
            <input type="text" name="nama" id="nama" class="form-control">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-3  text-right">
                <label for="">Tempat, Tanggal Lahir</label>
            </div>
            <div class="col-md-4">
                <input type="text" name="tempat" id="tempat" class="form-control">
            </div>
            <div class="col-md-5">
                <input type="date" name="tgl-lahir" id="tgl-lahir" class="form-control">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-3  text-right">
                <label for="">Jenis Kelamin</label>
            </div>
            <div class="col-md-4">
                <select name="kelamin" class="form-control" id="kelamin">
                    <option value="">-- Pilih Jenis kelamin --</option>
                    <option value="laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-3  text-right">
                <label for="">Pekerjaan</label>
            </div>
            <div class="col-md-4">
                <select name="pekerjaan" class="form-control" id="pekerjaan">
                    <option value="">-- Pilih Jenis pekerjaan --</option>
                    <option value="swasta">Swasta</option>
                    <option value="wirausaha">Wirausaha</option>
                    <option value="pegawai negeri">Pegawai Negeri</option>
                    <option value="tidak bekerja">Tidak bekerja</option>
                    <option value="lain">Lain</option>
                </select>
                <input type="text" class="form-control mt-4" id="kerja-lain" name="pekerjaan" hidden>
            </div>

        </div>
    </div>


    <div class="col-md-6">
        <div class="row mb-4">
            <div class="col-md-3  text-right">
                <label for="">Nomor KK</label>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="kk" id="kk">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-3  text-right">
                <label for="">Alamat</label>
            </div>
            <div class="col">
                <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control"></textarea>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-3  text-right">
                <label for="">Agama</label>
            </div>
            <div class="col-md-4">
                <select class="form-control" name="agama" id="agama" >
                    <option value="">-- Pilih Agama --</option>
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="hindu">Hindu</option>
                    <option value="budha">Budha</option>
                    <option value="konghucu">Konghucu</option>
                </select>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-3  text-right">
                <label for="">Status perkawinan</label>
            </div>
            <div class="col-md-4">
                <select class="form-control" name="status_kawin" id="status-kawin" >
                    <option value="">-- Pilih Status --</option>
                    <option value="menikah">Menikah</option>
                    <option value="belum menikah">Belum menikah</option>

                </select>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-3  text-right">
                <label for="">Pendidikan</label>
            </div>
            <div class="col-md-4">
                <select class="form-control" name="pendidikan" id="pendidikan" >
                    <option value="">-- Pilih pendidikan --</option>
                    <option value="sd">SD Sederajat</option>
                    <option value="smp">SMP Sederajat</option>
                    <option value="sma">SMA Sederajat</option>
                    <option value="d1">D1</option>
                    <option value="d3">D3</option>
                    <option value="s1">D4/S1</option>
                    <option value="lain">Lain</option>
                </select>
            </div>
        </div>
    </div>


</div>



