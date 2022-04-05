@extends('layout.app')

@section('content')
    <div class="container ">
        <div class="row d-flex justify-content-between">
            <div class="col-md-1 ml-3">
                ID
            </div>
            <div class="col-md-4">
                Nama Kategori
            </div>
            <div class="col-md-2">
                Aksi
            </div>
        </div>
        <div id="list-kategori">

        </div>

    </div>
@endsection


@section('script')
    <script>
        $.ajax({
            url: "/kategori-surat",
            type: 'GET',
            success: function(data) {
                console.log(data);
                $.each(data, function(k, v) {
                    var link =  (v.link == null ? 'coba' :  v.link )
                    $('#list-kategori').append(`
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-md-2">
                                        ${v.id}
                                    </div>
                                    <div class="col-md-6" id="nama_kategori">
                                        ${v.nama_kategori}
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-primary btn-input" onclick="{localStorage.setItem('surat_id', '${v.id}')}" href={{url('`+link+`')}}>Buat</a>
                                    </div>
                                </div>
                            </div>
                        </div>`)
                })
            }
        })


        $('body').on('click', '.btn-input', function () {
            console.log($('body #nama_kategori').text());
        })
    </script>
@endsection
