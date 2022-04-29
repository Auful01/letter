@extends('layout.app')

@section('content')
<div class="row d-flex justify-content-right text-right mb-3" data-aos="fade-up">
    <div class="col">
        <button class="btn btn-primary" id="download-surat-keluar"><i class="fas fa-download"></i>&nbsp;Unduh laporan Surat</button>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="myTable" data-aos="fade-up">
                <thead>
                    <th>No</th>
                    <th>Nomor Surat</th>
                    <th>Jenis Surat</th>
                    <th>Nama Pemohon</th>
                    <th>Tanggal</th>
                    <th>Tanda Tangan</th>
                    <th>Aksi</th>
                </thead>
                <tbody>

                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@section('modal')
{{-- FILTER ARSIP --}}
<div class="modal fade" id="filter-arsip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Filter Arsip</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('report-print')}}">
                <div class="mb-2 row">
                    <div class="col-md-3">Dari Tanggal</div>
                    <div class="col-md-3"><input type="date" class="form-control" name="dari" id="dari"></div>
                    <div class="col-md-3">Sampai Tanggal</div>
                    <div class="col-md-3"><input type="date" class="form-control" name="sampai" id="sampai"></div>
                </div>
                <div class="row">
                    <div class="col-md-3">Pilih Jenis Surat</div>
                    {{-- <div class="col-md-3"><input type="date" class="form-control" id="dari"></div> --}}
                    <div class="col-md-3"><select name="kategoriSurat" class="form-control" id="kategoriSurat"></select></div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" id="print-report">Print</button>
                </div>
            </form>
        </div>

      </div>
    </div>
  </div>

{{-- EDIT SKBM --}}
<div class="modal fade" id="edit-modal-skbm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="text" class="identitas_id"  value="" >
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
                            <input type="text" class="form-control nomer_surat" name="nomor_surat" id="" >
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
                            <input type="date" class="form-control" name="berlaku_dari" id="berlaku_dari">
                        </div>
                        <div class="col-md-1  text-right">
                            <label for="">Sampai</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="berlaku_sampai" id="berlaku_sampai">
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
                            <input type="file" class="form-control" id="sk_rtrw">
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
                            <option value="auful">Muhammad Auful Kirom</option>

                        </select>
                        {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button class="btn btn-sm btn-primary" id="update-skbm"> <i class="fas fa-check"></i> Simpan</button>
                <button class="btn btn-sm btn-danger"> <i class="fas fa-redo"></i> Kembali</button>
            </div>
        </div>

      </div>
    </div>
</div>

  {{-- EDIT SKL --}}
<div class="modal fade" id="edit-modal-skl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="text" class="identitas_id"  value="" >
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
                            <input type="text" class="form-control nomer_surat" name="nomor_surat" id="" >
                            <small class="text-muted">*nomor surat bertambah otomatis</small>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">keperluan</label>
                        </div>
                        <div class="col">
                            <textarea name="perlu" class="form-control perlu" id="" cols="30" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Berlaku</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control berlaku" name="berlaku_dari" id="">
                        </div>
                        <div class="col-md-1  text-right">
                            <label for="">Sampai</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control sampai" name="berlaku_sampai" id="">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Tujuan</label>
                        </div>
                        <div class="col">
                            <textarea name="tujuan" class="form-control tujuan" id="" cols="30" rows="2"></textarea>
                            {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Surat Keterangan RT/RW</label>
                        </div>
                        <div class="col">
                            <input type="file" id="" class="form-control sk_rtrw">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Menerangkan Bahwa</label>
                        </div>
                        <div class="col">
                            <textarea type="file" cols="30" rows="2" name="keterangan" id="" class="form-control keterangan"></textarea>
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
                        <select name="ttd" id="" class="form-control ttd">
                            <option value="">-- Silahkan pilih nama --</option>
                            <option value="auful">Muhammad Auful Kirom</option>

                        </select>
                        {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button class="btn btn-sm btn-primary" id="update-skl"> <i class="fas fa-check"></i> Simpan</button>
                <button class="btn btn-sm btn-danger"> <i class="fas fa-redo"></i> Kembali</button>
            </div>
        </div>

      </div>
    </div>
</div>

  {{-- EDIT skck --}}
<div class="modal fade" id="edit-modal-skck" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="text" class="identitas_id"  value="" >
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
                            <input type="text" class="form-control nomer_surat" name="nomor_surat"  id="" >
                            <small class="text-muted">*nomor surat bertambah otomatis</small>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">keperluan</label>
                        </div>
                        <div class="col">
                            <textarea name="perlu" class="form-control perlu" id="" cols="30" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Berlaku</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control berlaku" name="berlaku_dari" id="">
                        </div>
                        <div class="col-md-1  text-right">
                            <label for="">Sampai</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control sampai" name="berlaku_sampai" id="">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Tujuan</label>
                        </div>
                        <div class="col">
                            <textarea name="tujuan" class="form-control tujuan" id="" cols="30" rows="2"></textarea>
                            {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Surat Keterangan RT/RW</label>
                        </div>
                        <div class="col">
                            <input type="file" class="form-control sk_rtrw" id="">
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
                        <select name="ttd" id="" class="form-control ttd">
                            <option value="">-- Silahkan pilih nama --</option>

                        </select>
                        <small class="text-info"><i class="fas fa-info-circle"></i> surat ini mendukung ttd elektor</small>
                        {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button class="btn btn-sm btn-primary" id="update-skck"> <i class="fas fa-check"></i> Simpan</button>
                <button class="btn btn-sm btn-danger"> <i class="fas fa-redo"></i> Kembali</button>
            </div>
        </div>

      </div>
    </div>
</div>

{{-- MODAL SKIK --}}
<div class="modal fade" id="edit-modal-skik" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Surat Ijin Keramaian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="text" class="identitas_id"  value="" >
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
                            <input type="text" class="form-control nomer_surat" name="nomor_surat" id="" >
                            <small class="text-muted">*nomor surat bertambah otomatis</small>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">keperluan</label>
                        </div>
                        <div class="col">
                            <textarea name="perlu" class="form-control perlu" id="" cols="30" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Berlaku</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control berlaku" name="berlaku" id="">
                        </div>
                        <div class="col-md-1  text-right">
                            <label for="">Sampai</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control sampai" name="sampai" id="">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Tujuan</label>
                        </div>
                        <div class="col">
                            <textarea name="tujuan" class="form-control tujuan" id="" cols="30" rows="2"></textarea>
                            {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Surat Keterangan RT/RW</label>
                        </div>
                        <div class="col">
                            <input type="file" class="form-control sk_rtrw" id="">
                        </div>
                    </div>
                </div>

            </div>


            <h5 class="mt-3" style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Keterangan Acara</h5>
            <hr>
            <div class="row my-5">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3  text-right">
                            <label for="">Nama Acara</label>
                        </div>
                        <div class="col">
                            <input type="text" name="nama_acara" id="" class="form-control nama_acara">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3  text-right">
                            <label for="">Tanggal Acara</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" name="tgl_acara" id="" class="form-control tgl_acara">
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
                        <select name="ttd" id="" class="form-control ttd">
                            <option value="">-- Silahkan pilih nama --</option>

                        </select>
                        <small class="text-info"><i class="fas fa-info-circle"></i> surat ini mendukung ttd elektor</small>
                        {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button class="btn btn-sm btn-primary" id="update-skik"> <i class="fas fa-check"></i> Simpan</button>
                <button class="btn btn-sm btn-danger"> <i class="fas fa-redo"></i> Kembali</button>
            </div>
        </div>

      </div>
    </div>
</div>

{{-- MODAL SKIU --}}
<div class="modal fade" id="edit-modal-skiu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="text" class="identitas_id"  value="" >
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
                            <input type="text" class="form-control nomer_surat" name="nomor_surat" id="" >
                            <small class="text-muted">*nomor surat bertambah otomatis</small>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">keperluan</label>
                        </div>
                        <div class="col">
                            <textarea name="perlu" class="form-control perlu" id="" cols="30" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Berlaku</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control berlaku" name="berlaku_dari" id="">
                        </div>
                        <div class="col-md-1  text-right">
                            <label for="">Sampai</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control sampai" name="berlaku_sampai" id="">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Surat Keterangan RT/RW</label>
                        </div>
                        <div class="col">
                            <input type="file" class="form-control sk_rtrw" id="">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Tujuan</label>
                        </div>
                        <div class="col">
                            <textarea  class="form-control tujuan" name="tujuan" id="" cols="30" rows="3"></textarea>
                        </div>
                    </div>

                </div>

            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Keterangan Usaha</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3  text-right">
                            <label for="">Nama Usaha</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control nama_usaha" id="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3  text-right">
                            <label for="">Alamat Usaha</label>
                        </div>
                        <div class="col">
                            <textarea name="alamat_usaha" class="form-control alamat_usaha" id="" cols="30" rows="2"></textarea>
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
                        <select name="ttd" id="" class="form-control ttd">
                            <option value="">-- Silahkan pilih nama --</option>

                        </select>
                        <small class="text-info"><i class="fas fa-info-circle"></i> surat ini mendukung ttd elektor</small>
                        {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button class="btn btn-sm btn-primary" id="update-skiu"> <i class="fas fa-check"></i> Simpan</button>
                <button class="btn btn-sm btn-danger"> <i class="fas fa-redo"></i> Kembali</button>
            </div>
        </div>

      </div>
    </div>
</div>

{{-- MODAL SP --}}
<div class="modal fade" id="edit-modal-sp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="text" class="identitas_id"  value="" >
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
                            <input type="text" class="form-control nomer_surat" name="nomor_surat" id="" >
                            <small class="text-muted">*nomor surat bertambah otomatis</small>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">keperluan</label>
                        </div>
                        <div class="col">
                            <textarea name="perlu" class="form-control perlu" id="" cols="30" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Berlaku</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control berlaku" name="berlaku_dari" id="">
                        </div>
                        <div class="col-md-1  text-right">
                            <label for="">Sampai</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control sampai" name="berlaku_sampai" id="">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Surat Keterangan RT/RW</label>
                        </div>
                        <div class="col">
                            <input type="file" class="form-control sk_rtrw" id="">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Tanggal Surat Keterangan RT/RW</label>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control tgl_sk_rtrw" id="">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Ditujukan Kepada</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control tujuan" name="tujuan" id="">

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
                        <select name="ttd" id="" class="form-control ttd">
                            <option value="">-- Silahkan pilih nama --</option>

                        </select>
                        <small class="text-info"><i class="fas fa-info-circle"></i> surat ini mendukung ttd elektor</small>
                        {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button class="btn btn-sm btn-primary" id="update-sp"> <i class="fas fa-check"></i> Simpan</button>
                <button class="btn btn-sm btn-danger"> <i class="fas fa-redo"></i> Kembali</button>
            </div>
        </div>

      </div>
    </div>
</div>

{{-- MODAL SK --}}
<div class="modal fade" id="edit-modal-sk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="text" class="identitas_id"  value="" >
            <div class="row d-flex justify-content-between mx-3">
                <div class="col-md-6">
                    <div class="row mb-4">
                        <input type="text" id="jenis_id" value="" hidden>
                        <div class="col-md-3  text-right">
                            <label for="">NIK</label>
                        </div>
                        <div class="col">
                        <input type="text" name="nik" id="nik" class="form-control nik">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Nama</label>
                        </div>
                        <div class="col">
                        <input type="text" name="nama" id="nama" class="form-control nama">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Tempat, Tanggal Lahir</label>
                        </div>
                        <div class="col">
                            <input type="text" name="tempat" id="tempat" class="form-control tempat">
                        </div>
                        <div class="col">
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control tgl_lahir">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Jenis Kelamin</label>
                        </div>
                        <div class="col-md-4">
                            <select name="kelamin" class="form-control kelamin" id="kelamin">
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
                            <select name="pekerjaan" class="form-control pekerjaan" id="pekerjaan">
                                <option value="">-- Pilih Jenis pekerjaan --</option>
                                <option value="swasta">Swasta</option>
                                <option value="wirausaha">Wirausaha</option>
                                <option value="pegawai negeri">Pegawai Negeri</option>
                                <option value="tidak bekerja">Tidak bekerja</option>
                                <option value="lain">Lain</option>
                            </select>
                            <input type="text" class="form-control mt-4 kerja-lain" id="kerja-lain" name="pekerjaan" hidden>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Alamat</label>
                        </div>
                        <div class="col">
                            <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control alamat"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kelurahan</label>
                        </div>
                        <div class="col">
                        <input type="text" name="kelurahan" id="kelurahan" class="form-control kelurahan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kecamatan</label>
                        </div>
                        <div class="col">
                        <input type="text" name="kecamatan" id="kecamatan" class="form-control kecamatan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kota/Kabupaten</label>
                        </div>
                        <div class="col">
                        <input type="text" name="kota" id="kota" class="form-control kota">
                        </div>
                    </div>
                </div>
            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Memberi Kuasa Kepada</h5>
                <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <b>Domisili Penerima Kuasa</b>
                        </div>
                        <div class="col">
                            <select name="" class="form-control domisili_kuasa" id=""></select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <b>Nama Penerima Kuasa</b>
                        </div>
                        <div class="col">
                            {{-- <select name="" class="form-control" id="nama"></select> --}}
                            <input type="text" class="form-control nama_kuasa" name="nama" id="">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Tempat, Tanggal Lahir Penerima Kuasa</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="tempat" id="tempat_kuasa" class="form-control tempat">
                        </div>
                        <div class="col-md-5">
                            <input type="date" name="tgl-lahir" id="tgl-lahir_kuasa" class="form-control tgl-lahir">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Jenis Kelamin Penerima Kuasa</label>
                        </div>
                        <div class="col-md-4">
                            <select name="kelamin" class="form-control kelamin" id="kelamin_kuasa">
                                <option value="">-- Pilih Jenis kelamin --</option>
                                <option value="laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Pekerjaan Penerima Kuasa</label>
                        </div>
                        <div class="col-md-4">
                            <select name="pekerjaan" class="form-control pekerjaan" id="pekerjaan_kuasa">
                                <option value="">-- Pilih Jenis pekerjaan --</option>
                                <option value="swasta">Swasta</option>
                                <option value="wirausaha">Wirausaha</option>
                                <option value="pegawai negeri">Pegawai Negeri</option>
                                <option value="tidak bekerja">Tidak bekerja</option>
                                <option value="lain">Lain</option>
                            </select>
                            <input type="text" class="form-control mt-4 kerja-lain" id="kerja-lain_kuasa" name="pekerjaan" hidden>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Alamat Penerima Kuasa</label>
                        </div>
                        <div class="col">
                            <textarea name="alamat" id="alamat_kuasa" cols="30" rows="2" class="form-control alamat"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kelurahan Penerima Kuasa</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control kelurahan_kuasa" id="" name="kelurahan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kecamatan Penerima Kuasa</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control kecamatan_kuasa" id="" name="kecamatan">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 text-right">
                            <label for="">Kota/Kabupaten Penerima Kuasa</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control kota_kuasa" id="" name="kota">
                        </div>
                    </div>
                </div>
            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Keterangan</h5>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-4">
                            <div class="col-md-3  text-right">
                                <label for="">Nomor</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control nomer_surat" name="nomor_surat" id="" >
                                <small class="text-muted">*nomor surat bertambah otomatis</small>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3  text-right">
                                <label for="">Tujuan</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control tujuan" name="tujuan" id="">
                                {{-- <textarea  class="form-control" name="tujuan" id="tujuan" cols="30" rows="3"></textarea> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-4">
                            <div class="col-md-3  text-right">
                                <label for="">Uraian</label>
                            </div>
                            <div class="col">
                                <textarea name="uraian" class="form-control uraian" id="" cols="30" rows="2"></textarea>
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
                        <select name="ttd" id="" class="form-control ttd">
                            <option value="">-- Silahkan pilih nama --</option>

                        </select>
                        <small class="text-info"><i class="fas fa-info-circle"></i> surat ini mendukung ttd elektor</small>
                        {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button class="btn btn-sm btn-primary" id="update-sk"> <i class="fas fa-check"></i> Simpan</button>
                <button class="btn btn-sm btn-danger"> <i class="fas fa-redo"></i> Kembali</button>
            </div>
        </div>

      </div>
    </div>
</div>

{{-- MODAL SKPN --}}
<div class="modal fade" id="edit-modal-skpn" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
             <input type="text" class="identitas_id"  value="" >
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
                            <input type="text" class="form-control nomer_surat" name="nomor_surat" id="" >
                            <small class="text-muted">*nomor surat bertambah otomatis</small>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Surat Keterangan RT/RW</label>
                        </div>
                        <div class="col">
                            <input type="file" class="form-control  sk_rtrw" id="">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">keperluan</label>
                        </div>
                        <div class="col">
                            <textarea name="perlu" class="form-control perlu" id="" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Pindah Nikah ke</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Alamat Tujuan</label>
                        </div>
                        <div class="col">
                            <textarea name="alamat" class="form-control tujuan" id="" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Kab/Kota</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control kota" name="kota" id="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Kelurahan/Desa</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control kelurahan" name="kelurahan" id="">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Kecamatan</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control kecamatan" name="kecamatan" id="">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Provinsi</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control provinsi" name="provinsi" id="">
                        </div>
                    </div>
                </div>
            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Keterangan Nikah</h5>
            <hr>
            <div class="col-md-6">
                <div class="row">

                    <div class="col-md-3  text-right">
                        <label for="">Tanggal Nikah</label>
                    </div>
                    <div class="col">
                        <input type="date" class="form-control tanggal_nikah" name="tanggal_nikah" id="">
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
                        <select name="ttd" id="" class="form-control ttd">
                            <option value="">-- Silahkan pilih nama --</option>

                        </select>
                        <small class="text-info"><i class="fas fa-info-circle"></i> surat ini mendukung ttd elektor</small>
                        {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button class="btn btn-sm btn-primary" id="update-skpn"> <i class="fas fa-check"></i> Simpan</button>
                <button class="btn btn-sm btn-danger"> <i class="fas fa-redo"></i> Kembali</button>
            </div>
        </div>

      </div>
    </div>
</div>

{{-- MODAL SKPM --}}
<div class="modal fade" id="edit-modal-skpm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="text" class="identitas_id"  value="" >
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
                            <input type="text" class="form-control nomer_surat" name="nomor_surat" id="" >
                            <small class="text-muted">*nomor surat bertambah otomatis</small>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Surat Keterangan RT/RW</label>
                        </div>
                        <div class="col">
                            <input type="file" class="form-control sk_rtrw" id="">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Keperluan</label>
                        </div>
                        <div class="col">
                            <textarea name="perlu" class="form-control perlu" id="" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Berlaku</label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control berlaku" name="" id="">
                            {{-- <textarea name="perlu" class="form-control" id="perlu" cols="30" rows="2"></textarea> --}}
                        </div>
                        <div class="col-md-2  text-right">
                            <label for="">Sampai</label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control sampai" name="" id="">
                            {{-- <textarea name="perlu" class="form-control" id="perlu" cols="30" rows="2"></textarea> --}}
                        </div>
                    </div>
                </div>

            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Pindah Dari</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Alamat Asal</label>
                        </div>
                        <div class="col">
                            <textarea name="alamat " class="form-control alamat_asal" id="" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Kab/Kota</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control kota" name="kota" id="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Kelurahan/Desa</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control kelurahan" name="kelurahan" id="">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Kecamatan</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control kecamatan" name="kecamatan" id="">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3  text-right">
                            <label for="">Provinsi</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control provinsi" name="provinsi" id="">
                        </div>
                    </div>
                </div>
            </div>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Keterangan Pindah</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3  text-right">
                            <label for="">Tanggal pindah</label>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control tgl_pindah" name="tgl_pindah" id="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <label for="">Alamat Pindah</label>
                        </div>
                        <div class="col">
                            <textarea name="alamat_pindah" class="form-control alamat_pindah" id="" cols="30" rows="2"></textarea>
                            {{-- <input type="date" class="form-control" name="tgl_pindah" id="tgl_pindah"> --}}
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="mt-4" style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Pengikut</h5>
            <hr>
            <button class="btn btn-success form-control">Klik Untuk tambah pengikut</button>
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>No. KTP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tgl. Lahir</th>
                    <th>Status Perkawinan</th>
                    <th>Pendidikan</th>
                    <th>Keterangan</th>
                </thead>
                <tbody></tbody>
            </table>
            <h5 style="border-left: 4px solid rgb(145, 145, 145)">&nbsp;&nbsp;Tanda tangan surat</h5>
            <hr>
            <div class="col-md-6">
                <div class="row">

                    <div class="col-md-3  text-right">
                        <label for="">Tanda tangan surat</label>
                    </div>
                    <div class="col">
                        <select name="ttd" id="" class="form-control ttd">
                            <option value="">-- Silahkan pilih nama --</option>

                        </select>
                        <small class="text-info"><i class="fas fa-info-circle"></i> surat ini mendukung ttd elektor</small>
                        {{-- <input type="date" class="form-control" name="berlaku_dari" id=""> --}}
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button class="btn btn-sm btn-primary" id="update-skpm"> <i class="fas fa-check"></i> Simpan</button>
                <button class="btn btn-sm btn-danger"> <i class="fas fa-redo"></i> Kembali</button>
            </div>
        </div>

      </div>
    </div>
</div>



@endsection

@section('script')
<script>
    // $('#print-report').on('click', function () {
    //     var dari = $('#dari').val()
    //     var sampai = $('#sampai').val()
    //     console.log(dari, sampai);
    // })

    $('#download-surat-keluar').on('click', function () {
        $('#filter-arsip').modal('show')
        console.log('coba');

        $.ajax({
            url : '/load-kategori',
            type : 'GET',
            success : function (data) {
                $('#kategoriSurat').append($('<option>').text('-- Choose One -- '))
                $.each(data, function (k,v) {
                    $('#kategoriSurat').append(
                        $('<option>').val(v.id).text(v.nama_kategori)
                    )
                })
            }
        })
    })

    $(document).ready(function () {

        $.ajax({
            url : '/load-arsip-surat',
            type : 'get',
            success : function (data) {
                console.log(data);
            }
        })
    })
    var table = $('#myTable').DataTable({
        processing : true,
        serverSide : true,
        ajax : '{!! route('load-all-letter') !!}',
        columns : [
            {
                data : 'DT_RowIndex',
                name :'DT_RowIndex'
            },{
                data : 'nomer_surat',
                name : 'nomer_surat'
            },{
                data : 'kategori',
                name : 'kategori'
            },
            {
                data : 'nama',
                name : 'nama'
            },
            {
                data : 'created_at',
                name : 'created_at'
            },
            {
                data : 'ttd',
                name : 'ttd'
            },
            {
                data : 'action',
                name : 'action'
            }
        ]
    })

    function getIdentity(data) {
        $('.nik').val(data.identitas.nik)
        $('.jenis_id').val(data.identitas.jenis_id)
        $('.nama').val(data.identitas.nama)
        $('.tempat').val(data.identitas.ttl.split(',')[0]) + ', ' + $('.tgl_lahir').val(data.identitas.ttl.split(', ')[1])
        $('.kelamin').val(data.identitas.kelamin).prop('selected', true)
        $('.pekerjaan').val(data.identitas.pekerjaan).prop('selected', true)
        var kerjaLain = $('#kerja-lain').val()
        $('.kk').val(data.identitas.nkk)
        $('.alamat').val(data.identitas.alamat)
        $('.agama').val(data.identitas.agama).prop('selected', true)
        $('.status-kawin').val(data.identitas.status_kawin)
        $('.pendidikan').val(data.identitas.pendidikan).prop('selected', true)
        $('.nomer_surat').val(data.identitas.nomer_surat)
        $('.nomor_surat').val(data.identitas.nomer_surat)
        $('.ttd').val(data.identitas.ttd).prop('selected',true)
    }

    $('.nama').on('keyup', function () {
        console.log($(this).val());
    })

    function sendIdentity(data) {
        var nik = $(data).find('.nik').val()
        var jenis_id = $(data).find('.jenis_id').val()
        var identitas_id = $(data).find('.identitas_id').val()
        var nama = $(data).find('.nama').val()
        var ttl = $(data).find('.tempat').val() + ', ' + $('#tgl-lahir').val()
        var kelamin = $(data).find('.kelamin').val()
        var pekerjaan = $(data).find('.pekerjaan').val()
        var kerjaLain = $(data).find('#kerja-lain').val()
        var nkk = $(data).find('.kk').val()
        var alamat = $(data).find('.alamat').val()
        var agama = $(data).find('.agama').val()
        var status_kawin = $(data).find('.status-kawin').val()
        var pendidikan = $(data).find('.pendidikan').val()
        var noSurat = $(data).find('.nomer_surat').val()
        // var noSurat = $('#nomer_surat').val()
        var ttd = $(data).find('.ttd').val()
        // var ttl = $('')

        return {
            'nik' : nik,
            'jenis_id' : jenis_id,
            'identitas_id' : identitas_id,
            'nama' : nama,
            'ttl' : ttl,
            'kelamin' : kelamin,
            'pekerjaan' : pekerjaan,
            'kerjaLain' : kerjaLain,
            'nokk' : nkk,
            'alamat' : alamat,
            'agama' : agama,
            'status_kawin' : status_kawin,
            'pendidikan' : pendidikan,
            'nomer_surat' : noSurat,
            'ttd' : ttd
        }
    }

    function loadSelectedTtd(selected) {
            $.ajax({
                url : '/load-ttd',
                type : 'GET',
                success : function (data) {
                    console.log(data);
                    $.each(data, function (k,v) {
                        $('#ttd').append($('<option>').val(v.id).text(v.nama_depan + ' ' + v.nama_belakang).prop('selected' , selected == v.id ? true : false))
                        $('.ttd').append($('<option>').val(v.id).text(v.nama_depan + ' ' + v.nama_belakang).prop('selected' , selected == v.id ? true : false))
                    })
                }
            })
        }

    $('body').on('click', '.edit-surat', function () {
        var nosurat = $(this).data('nosurat')
        var kategori = $(this).data('kategori')
        console.log(nosurat);
        $.ajax({
            url : '/find-category',
            type : "GET",
            data : {
                'kategori' : kategori
            },
            success : function (data) {
                console.log(data.link);
                switch (data.link) {
                    case 'form-skbm':
                        $('#edit-modal-skbm').modal('show')
                            $.ajax({
                                url : '/find-skbm',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    // console.log(data.identitas.id);
                                    getIdentity(data);
                                    loadSelectedTtd(data.ttd)
                                    // var d = data.berlaku
                                    // var dout = Date.parse(d)
                                    $('.identitas_id').val(data.identitas.id)
                                    $('#berlaku_dari').val(data.berlaku_mulai)
                                    $('#berlaku_sampai').val(data.berlaku_sampai)
                                    $('#tujuan').val(data.tujuan)
                                    $('#perlu').val(data.perlu)
                                }
                            })
                        break;
                        case 'form-skl':
                            $('#edit-modal-skl').modal('show')

                            $.ajax({
                                url : '/find-skl',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    // console.log(data);
                                    getIdentity(data);
                                    loadSelectedTtd(data.ttd)
                                   $('.identitas_id').val(data.identitas.id)
                                   $('.nomer_surat').val(data.nomor_surat)
                                    $('.perlu').val(data.perlu)
                                    $('.berlaku').val(data.berlaku_mulai)
                                    $('.sampai').val(data.berlaku_sampai)
                                    $('.tujuan').val(data.tujuan)
                                    $('.keterangan').val(data.keterangan)
                                }
                            })
                        break;
                        case 'form-skck':
                            $('#edit-modal-skck').modal('show')

                            $.ajax({
                                url : '/find-skck',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    console.log(data);
                                    loadSelectedTtd(data.ttd)
                                    getIdentity(data);
                                    $('.identitas_id').val(data.identitas.id)
                                    $('.perlu').val(data.perlu)
                                    $('.berlaku').val(data.berlaku_mulai)
                                    $('.sampai').val(data.berlaku_sampai)
                                    $('.tujuan').val(data.tujuan)
                                }
                            })
                            break
                        case 'form-skik':
                            $('#edit-modal-skik').modal('show')

                            $.ajax({
                                url : '/find-skik',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    console.log(data);
                                    getIdentity(data);
                                    loadSelectedTtd(data);
                                    $('.identitas_id').val(data.identitas.id)
                                    $('.perlu').val(data.perlu)
                                    $('.berlaku').val(data.berlaku_mulai)
                                    $('.sampai').val(data.berlaku_sampai)
                                    $('.tujuan').val(data.tujuan)
                                    $('.nama_acara').val(data.nama_acara)
                                    $('.tgl_acara').val(data.tanggal_acara)
                                }
                            })
                            break
                        case 'form-skiu':
                            $('#edit-modal-skiu').modal('show')

                            $.ajax({
                                url : '/find-skiu',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    console.log(data);
                                    loadSelectedTtd(data)
                                    getIdentity(data);
                                    $('.identitas_id').val(data.identitas.id)
                                    $('.perlu').val(data.perlu)
                                    $('.berlaku').val(data.berlaku_mulai)
                                    $('.sampai').val(data.berlaku_sampai)
                                    $('.tujuan').val(data.tujuan)
                                    $('.nama_usaha').val(data.nama_usaha)
                                    $('.alamat_usaha').val(data.alamat_usaha)
                                }
                            })
                            break
                        case 'form-sp':
                            $('#edit-modal-sp').modal('show')

                            $.ajax({
                                url : '/find-sp',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    console.log(data);
                                    getIdentity(data);
                                    loadSelectedTtd(data)
                                    $('.identitas_id').val(data.identitas.id)
                                    $('.perlu').val(data.perlu)
                                    $('.berlaku').val(data.berlaku_mulai)
                                    $('.sampai').val(data.berlaku_sampai)
                                    $('.tujuan').val(data.tujuan)
                                    $('.tgl_sk_rtrw').val(data.tgl_sk_rtrw)

                                }
                            })
                            break
                        case 'form-skpn':
                            $('#edit-modal-skpn').modal('show')

                            $.ajax({
                                url : '/find-skpn',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    console.log(data.tgl_nikah);
                                    loadSelectedTtd(data)
                                    getIdentity(data);
                                    $('.identitas_id').val(data.identitas.id)
                                    $('.perlu').val(data.perlu)
                                    $('.berlaku').val(data.berlaku)
                                    $('.sampai').val(data.sampai)
                                    // $('.tujuan').val(data.tujuan)
                                    $('.tujuan').val(data.alamat_tujuan)
                                    $('.kelurahan').val(data.desa)
                                    $('.kecamatan').val(data.kecamatan)
                                    $('.kota').val(data.kabupaten)
                                    $('.provinsi').val(data.provinsi)
                                    $('.tanggal_nikah').val(data.tgl_nikah)
                                }
                            })
                            break
                        case 'form-sk':
                            $('#edit-modal-sk').modal('show')

                            $.ajax({
                                url : '/find-sk',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    console.log(data.ttl_kuasa.split(', ')[1]);
                                    loadSelectedTtd(data)
                                    getIdentity(data);
                                    $('.identitas_id').val(data.identitas.id)
                                    $('.perlu').val(data.perlu)
                                    $('.berlaku').val(data.berlaku)
                                    $('.sampai').val(data.sampai)
                                    $('.tujuan').val(data.tujuan)
                                    $('.uraian').val(data.uraian)
                                    $('.kelurahan').val(data.desa)
                                    $('.kecamatan').val(data.kecamatan)
                                    $('.kota').val(data.kabupaten)
                                    $('.provinsi').val(data.provinsi)
                                    $('.nama_kuasa').val(data.nama_kuasa)
                                    $('.kelamin').val(data.kelamin_kuasa)
                                    $('.domisili').val(data.domisili_kuasa)
                                    $('.alamat_kuasa').val(data.alamat_kuasa)
                                    $('.kelurahan_kuasa').val(data.desa_kuasa)
                                    $('.tempat_kuasa').val(data.ttl_kuasa.split(',')[0])
                                    $('#tgl-lahir_kuasa').val(data.ttl_kuasa.split(', ')[1])
                                    $('.kota_kuasa').val(data.kabupaten_kuasa)
                                    $('.kecamatan_kuasa').val(data.kecamatan_kuasa)
                                    $('.provinsi_kuasa').val(data.provinsi)
                                    $('.tgl_sk_rtrw').val(data.tgl_sk_rtrw)
                                }
                            })
                            break
                        case 'form-skpm':
                            $('#edit-modal-skpm').modal('show')

                            $.ajax({
                                url : '/find-skpm',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    console.log(data);
                                    getIdentity(data);
                                    loadSelectedTtd(data);
                                    $('.identitas_id').val(data.identitas.id)
                                    $('.perlu').val(data.perlu)
                                    $('.berlaku').val(data.berlaku_dari)
                                    $('.sampai').val(data.berlaku_sampai)
                                    $('.alamat_asal').val(data.alamat_asal)
                                    $('.kelurahan').val(data.desa)
                                    $('.kecamatan').val(data.kecamatan)
                                    $('.kota').val(data.kabupaten)
                                    $('.provinsi').val(data.provinsi)
                                    $('.tgl_pindah').val(data.tgl_pindah)
                                    $('.alamat_pindah').val(data.alamat_pindah)
                                }
                            })
                            break
                    default:
                        break;
                }
            }
        })
    })

    $('body').on('click', '#update-skbm', function () {
        var data = '#edit-modal-skbm'
        var identity = new sendIdentity(data)
        // console.log(si.nik);
        var fd = new FormData()
        var tujuan = $(data).find('#tujuan').val()
        var perlu = $(data).find('#perlu').val()
        var berlaku = $(data).find('#berlaku_dari').val()
        var sampai = $(data).find('#berlaku_sampai').val()
        var file = $(data).find('#sk_rtrw')[0].files[0]
        // var ttd= $('#ttd').val()

            // fd.append('_token', '{{ csrf_token() }}')
            fd.append('_token', '{{ csrf_token() }}')
            fd.append('nik', identity.nik)
            fd.append('nama', identity.nama)
            fd.append('ttl', identity.ttl)
            fd.append('kelamin', identity.kelamin)
            fd.append('pekerjaan', identity.kerja == 'lain' ? identity.kerjaLain : identity.pekerjaan)
            fd.append('nkk', identity.nokk)
            fd.append('alamat', identity.alamat)
            fd.append('agama', identity.agama)
            fd.append('status_kawin', identity.status_kawin)
            fd.append('pendidikan', identity.pendidikan)
            fd.append('nomer_surat', identity.nomer_surat)
            fd.append('id', identity.identitas_id)
            fd.append('perlu', perlu)
            fd.append('berlaku', berlaku)
            fd.append('sampai', sampai)
            fd.append('tujuan',tujuan)
            fd.append('file',file)
            fd.append('ttd',identity.ttd)

            // console.log(fd);
            $.ajax({
                url : '/update-skbm',
                type : 'POST',
                data : fd,
                contentType : false,
                processData : false,
                success : function (data) {
                    // alert('success')
                    console.log(data);
                    Swal.fire({
                        title : 'Success',
                        text : 'Data saved!',
                        icon : 'success',
                        showConfirmButton : false,
                        timer : 2000,
                        timerProgressBar :  true
                    })

                    setTimeout(() => {
                        table.ajax.reload()
                        $('.modal').modal('hide')
                    }, 2000);
                },
                error : function (err) {
                    console.log(err);
                    Swal.fire({
                        title : 'Error',
                        text : 'Data not saved!',
                        icon : 'error',
                        showConfirmButton : false,
                        timer : 2000,
                        timeProgressBar :  true
                    })
                }
            })
    })

    $('body').on('click', '#update-skl', function () {
        var data = '#edit-modal-skl'
        var identity = new sendIdentity(data)
        console.log(identity.nama);
        var fd = new FormData()
        var tujuan = $(data).find('.tujuan').val()
        var perlu = $(data).find('.perlu').val()
        var berlaku = $(data).find('.berlaku').val()
        var sampai = $(data).find('.sampai').val()
        var file = $(data).find('.sk_rtrw')[0].files[0]
        // var ttd= $('.ttd').val()
        var keterangan = $(data).find('.keterangan').val()

            // fd.append('_token', '{{ csrf_token() }}')
            fd.append('_token', '{{ csrf_token() }}')
            fd.append('nik', identity.nik)
            fd.append('nama', identity.nama)
            fd.append('ttl', identity.ttl)
            fd.append('kelamin', identity.kelamin)
            fd.append('pekerjaan', identity.kerja == 'lain' ? identity.kerjaLain : identity.pekerjaan)
            fd.append('nkk', identity.nokk)
            fd.append('alamat', identity.alamat)
            fd.append('agama', identity.agama)
            fd.append('status_kawin', identity.status_kawin)
            fd.append('pendidikan', identity.pendidikan)
            fd.append('nomer_surat', identity.nomer_surat)
            fd.append('id', identity.identitas_id)
            fd.append('perlu', perlu)
            fd.append('berlaku', berlaku)
            fd.append('sampai', sampai)
            fd.append('keterangan', keterangan)
            fd.append('tujuan',tujuan)
            fd.append('file',file)
            fd.append('ttd',identity.ttd)

            // console.log(fd);
            $.ajax({
                url : '/update-skl',
                type : 'POST',
                data : fd,
                contentType : false,
                processData : false,
                success : function (data) {
                    // alert('success')
                    console.log(data);
                    Swal.fire({
                        title : 'Success',
                        text : 'Data saved!',
                        icon : 'success',
                        showConfirmButton : false,
                        timer : 2000,
                        timerProgressBar :  true
                    })

                    setTimeout(() => {
                        table.ajax.reload()
                        $('.modal').modal('hide')
                    }, 2000);
                }, error: function (err) {
                    console.log(err);
                    Swal.fire({
                        title : 'Error',
                        text : 'Data not saved!',
                        icon : 'error',
                        showConfirmButton : false,
                        timer : 2000,
                        timeProgressBar :  true
                    })
                }
            })
        })

        $('body').on('click', '#update-skck', function () {
            var data = '#edit-modal-skck'
            var identity = new sendIdentity(data)
            console.log(identity.nama);
            var fd = new FormData()
            var tujuan = $(data).find('.tujuan').val()
            var perlu = $(data).find('.perlu').val()
            var berlaku = $(data).find('.berlaku').val()
            var sampai = $(data).find('.sampai').val()
            var file = $(data).find('.sk_rtrw')[0].files[0]
            var ttd= $(data).find('.ttd').val()
            var keterangan = $(data).find('.keterangan').val()

                    // fd.append('_token', '{{ csrf_token() }}')
            fd.append('_token', '{{ csrf_token() }}')
            fd.append('nik', identity.nik)
            fd.append('nama', identity.nama)
            fd.append('ttl', identity.ttl)
            fd.append('kelamin', identity.kelamin)
            fd.append('pekerjaan', identity.kerja == 'lain' ? identity.kerjaLain : identity.pekerjaan)
            fd.append('nkk', identity.nokk)
            fd.append('alamat', identity.alamat)
            fd.append('agama', identity.agama)
            fd.append('status_kawin', identity.status_kawin)
            fd.append('pendidikan', identity.pendidikan)
            fd.append('nomer_surat', identity.nomer_surat)
            fd.append('id', identity.identitas_id)
            fd.append('perlu', perlu)
            fd.append('berlaku', berlaku)
            fd.append('sampai', sampai)
            fd.append('keterangan', keterangan)
            fd.append('tujuan',tujuan)
            fd.append('file',file)
            fd.append('ttd',ttd)

            $.ajax({
                url : '/update-skck',
                type : 'POST',
                data : fd,
                contentType : false,
                processData : false,
                success : function (data) {
                    // alert('success')
                    console.log(data);
                    Swal.fire({
                        title : 'Success',
                        text : 'Data saved!',
                        icon : 'success',
                        showConfirmButton : false,
                        timer : 2000,
                        timerProgressBar :  true
                    })
                    setTimeout(() => {
                        table.ajax.reload()
                        $('.modal').modal('hide')
                    }, 2000);
                }, error : function () {
                    Swal.fire({
                        title : 'Error',
                        text : 'Data not saved!',
                        icon : 'error',
                        showConfirmButton : false,
                        timer : 2000,
                        timeProgressBar :  true
                    })
                }
            })
        })

    $('body').on('click', '#update-skik', function () {
        var data = '#edit-modal-skik'
        var identity = new sendIdentity(data)
        var fd = new FormData()
        var tujuan = $(data).find('.tujuan').val()
        var perlu = $(data).find('.perlu').val()
        var berlaku = $(data).find('.berlaku').val()
        var sampai = $(data).find('.sampai').val()
        var file = $(data).find('.sk_rtrw')[0].files[0]
        // var ttd= $('.ttd').val()
        var nama_acara = $(data).find('.nama_acara').val()
        var tgl_acara = $(data).find('.tgl_acara').val()
        var keterangan = $(data).find('.keterangan').val()

        fd.append('_token', '{{ csrf_token() }}')
        fd.append('nik', identity.nik)
        fd.append('nama', identity.nama)
        fd.append('ttl', identity.ttl)
        fd.append('kelamin', identity.kelamin)
        fd.append('pekerjaan', identity.kerja == 'lain' ? identity.kerjaLain : identity.pekerjaan)
        fd.append('nkk', identity.nokk)
        fd.append('alamat', identity.alamat)
        fd.append('agama', identity.agama)
        fd.append('status_kawin', identity.status_kawin)
        fd.append('pendidikan', identity.pendidikan)
        fd.append('nomer_surat', identity.nomer_surat)
        fd.append('id', identity.identitas_id)
        fd.append('perlu', perlu)
        fd.append('berlaku', berlaku)
        fd.append('sampai', sampai)
        fd.append('nama_acara', nama_acara)
        fd.append('tgl_acara', tgl_acara)
        fd.append('tujuan',tujuan)
        fd.append('file',file)
        fd.append('ttd',identity.ttd)

            $.ajax({
                url : '/update-skik',
                type : 'POST',
                data : fd,
                contentType : false,
                processData : false,
                success : function (data) {
                    // alert('success')
                    console.log(data);
                    Swal.fire({
                        title : 'Success',
                        text : 'Data saved!',
                        icon : 'success',
                        showConfirmButton : false,
                        timer : 2000,
                        timerProgressBar :  true
                    })
                    setTimeout(() => {
                        table.ajax.reload()
                        $('.modal').modal('hide')
                    }, 2000);
                }, error : function () {
                    Swal.fire({
                        title : 'Error',
                        text : 'Data not saved!',
                        icon : 'error',
                        showConfirmButton : false,
                        timer : 2000,
                        timeProgressBar :  true
                    })
                }
            })
    })

    $('body').on('click', '#update-skiu', function () {
        var data = '#edit-modal-skiu'
        var identity = new sendIdentity(data)
        var fd = new FormData()
        var tujuan = $(data).find('.tujuan').val()
        var perlu = $(data).find('.perlu').val()
        var berlaku = $(data).find('.berlaku').val()
        var sampai = $(data).find('.sampai').val()
        var file = $(data).find('.sk_rtrw')[0].files[0]
        var nama_usaha = $(data).find('.nama_usaha').val()
        var alamat_usaha = $(data).find('.alamat_usaha').val()
        // var ttd= $('.ttd').val()
        // var keterangan = $('.keterangan').val()

        fd.append('_token', '{{ csrf_token() }}')
        fd.append('nik', identity.nik)
        fd.append('nama', identity.nama)
        fd.append('ttl', identity.ttl)
        fd.append('kelamin', identity.kelamin)
        fd.append('pekerjaan', identity.kerja == 'lain' ? identity.kerjaLain : identity.pekerjaan)
        fd.append('nkk', identity.nokk)
        fd.append('alamat', identity.alamat)
        fd.append('agama', identity.agama)
        fd.append('status_kawin', identity.status_kawin)
        fd.append('pendidikan', identity.pendidikan)
        fd.append('nomer_surat', identity.nomer_surat)
        fd.append('id', identity.identitas_id)
        fd.append('perlu', perlu)
        fd.append('berlaku', berlaku)
        fd.append('sampai', sampai)
        fd.append('nama_usaha', nama_usaha)
        fd.append('alamat_usaha', alamat_usaha)
        fd.append('tujuan',tujuan)
        fd.append('file',file)
        fd.append('ttd',identity.ttd)

            $.ajax({
                url : '/update-skiu',
                type : 'POST',
                data : fd,
                contentType : false,
                processData : false,
                success : function (data) {
                    // alert('success')
                    console.log(data);
                    Swal.fire({
                        title : 'Success',
                        text : 'Data saved!',
                        icon : 'success',
                        showConfirmButton : false,
                        timer : 2000,
                        timerProgressBar :  true
                    })
                    setTimeout(() => {
                        table.ajax.reload()
                        $('.modal').modal('hide')
                    }, 2000);
                }, error : function () {
                    Swal.fire({
                        title : 'Error',
                        text : 'Data not saved!',
                        icon : 'error',
                        showConfirmButton : false,
                        timer : 2000,
                        timeProgressBar :  true
                    })
                }
            })
    })

    $('body').on('click', '#update-sp', function () {
        var data = '#edit-modal-sp'
        var identity = new sendIdentity(data)
        var fd = new FormData()
        var tujuan = $(data).find('.tujuan').val()
        var perlu = $(data).find('.perlu').val()
        var berlaku = $(data).find('.berlaku').val()
        var sampai = $(data).find('.sampai').val()
        var file = $(data).find('.sk_rtrw')[0].files[0]
        var ttd= $(data).find('.ttd').val()
        var tgl_sk_rtrw = $(data).find('.tgl_sk_rtrw').val()
        var keterangan = $(data).find('.keterangan').val()

        fd.append('_token', '{{ csrf_token() }}')
        fd.append('nik', identity.nik)
        fd.append('nama', identity.nama)
        fd.append('ttl', identity.ttl)
        fd.append('kelamin', identity.kelamin)
        fd.append('pekerjaan', identity.kerja == 'lain' ? identity.kerjaLain : identity.pekerjaan)
        fd.append('nkk', identity.nokk)
        fd.append('alamat', identity.alamat)
        fd.append('agama', identity.agama)
        fd.append('status_kawin', identity.status_kawin)
        fd.append('pendidikan', identity.pendidikan)
        fd.append('nomer_surat', identity.nomer_surat)
        fd.append('id', identity.identitas_id)
        fd.append('perlu', perlu)
        fd.append('berlaku', berlaku)
        fd.append('sampai', sampai)
        fd.append('tgl_sk_rtrw', tgl_sk_rtrw )
        fd.append('tujuan',tujuan)
        fd.append('file',file)
        fd.append('ttd',identity.ttd)

            $.ajax({
                url : '/update-sp',
                type : 'POST',
                data : fd,
                contentType : false,
                processData : false,
                success : function (data) {
                    // alert('success')
                    console.log(data);
                    Swal.fire({
                        title : 'Success',
                        text : 'Data saved!',
                        icon : 'success',
                        showConfirmButton : false,
                        timer : 2000,
                        timerProgressBar :  true
                    })
                    setTimeout(() => {
                        table.ajax.reload()
                        $('.modal').modal('hide')
                    }, 2000);
                }, error : function () {
                    Swal.fire({
                        title : 'Error',
                        text : 'Data not saved!',
                        icon : 'error',
                        showConfirmButton : false,
                        timer : 2000,
                        timeProgressBar :  true
                    })
                }
            })
    })

    // UPDATE SKPN
    $('body').on('click', '#update-skpn', function () {
        var data = '#edit-modal-skpn'
        var identity = new sendIdentity(data)
        var fd = new FormData()
        var tujuan = $(data).find('.tujuan').val()
        var perlu = $(data).find('.perlu').val()
        var kota = $(data).find('.kota').val()
        var kelurahan = $(data).find('.kelurahan').val()
        var kecamatan = $(data).find('.kecamatan').val()
        var provinsi = $(data).find('.provinsi').val()
        var file = $(data).find('.sk_rtrw')[0].files[0]
        // var ttd= $(data).find('.ttd').val()
        var tgl_nikah = $(data).find('.tanggal_nikah').val()
        var keterangan = $(data).find('.keterangan').val()

        fd.append('_token', '{{ csrf_token() }}')
        fd.append('nik', identity.nik)
        fd.append('nama', identity.nama)
        fd.append('ttl', identity.ttl)
        fd.append('kelamin', identity.kelamin)
        fd.append('pekerjaan', identity.kerja == 'lain' ? identity.kerjaLain : identity.pekerjaan)
        fd.append('nkk', identity.nokk)
        fd.append('alamat', identity.alamat)
        fd.append('agama', identity.agama)
        fd.append('status_kawin', identity.status_kawin)
        fd.append('pendidikan', identity.pendidikan)
        fd.append('nomer_surat', identity.nomer_surat)
        fd.append('id', identity.identitas_id)
        fd.append('perlu', perlu)
        fd.append('kabupaten', kota)
        fd.append('desa', kelurahan)
        fd.append('kecamatan', kecamatan)
        fd.append('provinsi', provinsi)
        fd.append('tgl_nikah', tgl_nikah )
        fd.append('keterangan', keterangan)
        fd.append('tujuan',tujuan)
        fd.append('file',file)
        fd.append('ttd', identity.ttd)

            $.ajax({
                url : '/update-skpn',
                type : 'POST',
                data : fd,
                contentType : false,
                processData : false,
                success : function (data) {
                    // alert('success')
                    console.log(data);
                    Swal.fire({
                        title : 'Success',
                        text : 'Data saved!',
                        icon : 'success',
                        showConfirmButton : false,
                        timer : 2000,
                        timerProgressBar :  true
                    })
                    setTimeout(() => {
                        table.ajax.reload()
                        $('.modal').modal('hide')
                    }, 2000);
                }, error : function () {
                    Swal.fire({
                        title : 'Error',
                        text : 'Data not saved!',
                        icon : 'error',
                        showConfirmButton : false,
                        timer : 2000,
                        timeProgressBar :  true
                    })
                }
            })
    })

    // UPDATE SK
    $('body').on('click', '#update-sk', function () {
        var data = '#edit-modal-sk'
        var identity = new sendIdentity(data)
        var fd = new FormData()
        var tujuan = $(data).find('.tujuan').val()
        var perlu = $(data).find('.perlu').val()
        var berlaku = $(data).find('.berlaku').val()
        var sampai = $(data).find('.sampai').val()
        // var ttd= $('.ttd').val()
        var keterangan = $(data).find('.keterangan').val()

        fd.append('_token', '{{ csrf_token() }}')
        fd.append('nik', identity.nik)
        fd.append('nama', identity.nama)
        fd.append('ttl', identity.ttl)
        fd.append('kelamin', identity.kelamin)
        fd.append('pekerjaan', identity.kerja == 'lain' ? identity.kerjaLain : identity.pekerjaan)
        fd.append('nkk', identity.nokk)
        fd.append('alamat', identity.alamat)
        fd.append('pendidikan', identity.pendidikan)
        fd.append('nomer_surat', identity.nomer_surat)
        fd.append('id', identity.identitas_id)
        fd.append('perlu', perlu)
        fd.append('berlaku', berlaku)
        fd.append('sampai', sampai)
        fd.append('keterangan', keterangan)
        fd.append('tujuan',tujuan)
        fd.append('ttd',identity.ttd)

            $.ajax({
                url : '/update-sk',
                type : 'POST',
                data : fd,
                contentType : false,
                processData : false,
                success : function (data) {
                    // alert('success')
                    console.log(data);
                    Swal.fire({
                        title : 'Success',
                        text : 'Data saved!',
                        icon : 'success',
                        showConfirmButton : false,
                        timer : 2000,
                        timerProgressBar :  true
                    })
                    setTimeout(() => {
                        table.ajax.reload()
                        $('.modal').modal('hide')
                    }, 2000);
                }, error : function () {
                    Swal.fire({
                        title : 'Error',
                        text : 'Data not saved!',
                        icon : 'error',
                        showConfirmButton : false,
                        timer : 2000,
                        timeProgressBar :  true
                    })
                }
            })
    })

    // UPDATE SKPM
    $('body').on('click', '#update-skpm', function () {
        var data = '#edit-modal-skpm'
        var identity = new sendIdentity(data)
        var fd = new FormData()
        var perlu = $(data).find('.perlu').val()
        var berlaku = $(data).find('.berlaku').val()
        var sampai = $(data).find('.sampai').val()
        var kota = $(data).find('.kota').val()
        var alamat_asal = $(data).find('.alamat_asal').val()
        var alamat_pindah = $(data).find('.alamat_pindah').val()
        var kelurahan = $(data).find('.kelurahan').val()
        var kecamatan = $(data).find('.kecamatan').val()
        var provinsi = $(data).find('.provinsi').val()
        var file = $(data).find('.sk_rtrw')[0].files[0]
        // var ttd= $(data).find('.ttd').val()
        var tgl_pindah = $(data).find('.tgl_pindah').val()

        var keterangan = $(data).find('.keterangan').val()

        fd.append('_token', '{{ csrf_token() }}')
        fd.append('nik', identity.nik)
        fd.append('nama', identity.nama)
        fd.append('ttl', identity.ttl)
        fd.append('kelamin', identity.kelamin)
        fd.append('pekerjaan', identity.kerja == 'lain' ? identity.kerjaLain : identity.pekerjaan)
        fd.append('nkk', identity.nokk)
        fd.append('alamat', identity.alamat)
        fd.append('agama', identity.agama)
        fd.append('status_kawin', identity.status_kawin)
        fd.append('pendidikan', identity.pendidikan)
        fd.append('nomer_surat', identity.nomer_surat)
        fd.append('id', identity.identitas_id)
        fd.append('perlu', perlu)
        fd.append('alamat_asal', alamat_asal)
        fd.append('alamat_pindah', alamat_pindah)
        fd.append('tgl_pindah', tgl_pindah)
        fd.append('berlaku', berlaku)
        fd.append('kabupaten', kota)
        fd.append('desa', kelurahan)
        fd.append('kecamatan', kecamatan)
        fd.append('provinsi', provinsi)
        fd.append('sampai', sampai)
        fd.append('keterangan', keterangan)
        fd.append('file',file)
        fd.append('ttd',identity.ttd)

            $.ajax({
                url : '/update-skpm',
                type : 'POST',
                data : fd,
                contentType : false,
                processData : false,
                success : function (data) {
                    // alert('success')
                    console.log(data);
                    Swal.fire({
                        title : 'Success',
                        text : 'Data saved!',
                        icon : 'success',
                        showConfirmButton : false,
                        timer : 2000,
                        timerProgressBar :  true
                    })
                    setTimeout(() => {
                        table.ajax.reload()
                        $('.modal').modal('hide')
                    }, 2000);
                }, error : function () {
                    Swal.fire({
                        title : 'Error',
                        text : 'Data not saved!',
                        icon : 'error',
                        showConfirmButton : false,
                        timer : 2000,
                        timeProgressBar :  true
                    })
                }
            })
    })


    $('body').on('click', '.print-surat', function () {
        var nosurat = $(this).data('nosurat')
        var kategori = $(this).data('kategori')
        // console.log(alert());
        $.ajax({
            url : '/find-category',
            type : "GET",
            data : {
                'kategori' : kategori,
            },
            success : function (data) {
                console.log(data.link);
                console.log(data.link == "form-sk" ? true : false);
                switch (data.link) {
                    case 'form-skbm':
                            $.ajax({
                                url : '/print-skbm',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    $('body').empty()
                                    $('body').append(data)

                                    setTimeout(() => {
                                        window.print()
                                    }, 100);
                                }
                            })
                        break
                    case 'form-skl':
                            $.ajax({
                                url : '/print-skl',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    $('body').empty()
                                    $('body').append(data)

                                    setTimeout(() => {
                                        window.print()
                                    }, 100);
                                }
                            })
                        break
                    case 'form-skck':
                            $.ajax({
                                url : '/print-skck',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    $('body').empty()
                                    $('body').append(data)

                                    setTimeout(() => {
                                        window.print()
                                    }, 100);
                                }
                            })
                        break
                    case 'form-skik':
                            $.ajax({
                                url : '/print-skik',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    $('body').empty()
                                    $('body').append(data)

                                    setTimeout(() => {
                                        window.print()
                                    }, 100);
                                }
                            })
                        break
                    case 'form-skiu':
                            $.ajax({
                                url : '/print-skiu',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    $('body').empty()
                                    $('body').append(data)

                                    setTimeout(() => {
                                        window.print()
                                    }, 100);
                                }
                            })
                        break
                    case 'form-sp':
                            $.ajax({
                                url : '/print-sp',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    $('body').empty()
                                    $('body').append(data)

                                    setTimeout(() => {
                                        window.print()
                                    }, 100);
                                }
                            })
                        break
                    case 'form-skpn':
                            $.ajax({
                                url : '/print-skpn',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    $('body').empty()
                                    $('body').append(data)

                                    setTimeout(() => {
                                        window.print()
                                    }, 100);
                                }
                            })
                        break
                    case 'form-sk':
                        console.log(true);
                            $.ajax({
                                url : '/print-sk',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    $('body').empty()
                                    $('body').append(data)

                                    setTimeout(() => {
                                        window.print()
                                    }, 100);
                                }
                            })
                        break;
                    case 'form-skpm':
                        console.log(true);
                            $.ajax({
                                url : '/print-skpm',
                                type : "GET",
                                data : {
                                    'nosurat' : nosurat
                                },
                                success : function (data) {
                                    $('body').empty()
                                    $('body').append(data)

                                    setTimeout(() => {
                                        window.print()
                                    }, 100);
                                }
                            })
                        break;

                    default:
                        break;
                }
            }
        })
    })

    $('body').on('click', '.hapus-surat', function () {
        var kategori = $(this).data('kategori')
        var nosurat = $(this).data('nosurat')
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url : '/hapus',
                        type : "DELETE",
                        data : {
                            '_token' : '{{ csrf_token() }}',
                            'kategori' : kategori,
                            'nosurat' : nosurat
                        },
                        success : function (data) {
                            Swal.fire({
                                            title: 'Deleted!',
                                            text: 'Your file has been deleted.',
                                            icon: 'success',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })

                            setTimeout(() => {
                                table.ajax.reload()
                            }, 1500);
                        }
                    })

                }
            })

    })

</script>
@endsection
