@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('sekretaris.surat-keluar.identitas')
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Keterangan</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Nomor</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="nomor_surat"  >
                            <small class="text-muted">*nomor surat bertambah otomatis</small>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">keperluan</label>
                        </div>
                        <div class="col">
                            <textarea name="perlu" class="form-control" id="perlu" cols="30" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Berlaku</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="berlaku_dari" id="">
                        </div>
                        <div class="col-md-1  text-right">
                            <label for="">Sampai</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="berlaku_sampai" id="">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Tujuan</label>
                        </div>
                        <div class="col">
                            <textarea name="tujuan" class="form-control" id="tujuan" cols="30" rows="2"></textarea>
                            {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Surat Keterangan RT/RW</label>
                        </div>
                        <div class="col">
                            <input type="file" class="form-control">
                        </div>
                    </div>
                </div>

            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Tanda tangan surat</h5>
            <hr>
            <div class="col-md-6">
                <div class="row">

                    <div class="col-md-3  text-right">
                        <label for="">Tanda tangan surat</label>
                    </div>
                    <div class="col">
                        <select name="ttd" id="ttd" class="form-control">
                            <option value="">-- Silahkan pilih nama --</option>

                        </select>
                        <small class="text-info"><i class="fas fa-info-circle"></i> surat ini mendukung ttd elektor</small>
                        {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button class="btn btn-sm btn-primary"> <i class="fas fa-check"></i> Simpan</button>
                <button class="btn btn-sm btn-danger"> <i class="fas fa-redo"></i> Kembali</button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#pekerjaan').on('change', function () {
            var coba = $(this).find(':selected').val()
            console.log(coba);
            if(coba == 'lain'){
                $('body #kerja-lain').prop('hidden', false)
            } else {
                $('body #kerja-lain').prop('hidden', true)
            }
        })
    </script>
@endsection
