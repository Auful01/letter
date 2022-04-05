<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: 'load-kategori',
            type: 'GET',
            success: function(data) {
                console.log(data);
                $.each(data, function(k, v) {
                    $(
                        `<a class="collapse-item l-surat" data-srt=${v.kode_kategori} id=${v.id} href="{{ route('form-sktm') }}">${v.nama_kategori}</a>`
                    ).insertAfter('body .jenis-surat')
                })
            }
        })
    })
</script>
