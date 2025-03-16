<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <?php echo date('Y'); ?> <strong><span>Sistem Koperasi</span></strong>. All Rights Reserved
    </div>

</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Vendor JS Files -->

<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>template/dist/js/demo.js"></script>

<!-- Dropzone JS -->
<script src="<?= base_url() ?>back/assets/ajax/dropzone/dropzone.js" type="text/javascript"></script>

<script src="<?= base_url() ?>back/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url() ?>back/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>back/assets/vendor/chart.js/chart.umd.js"></script>
<script src="<?= base_url() ?>back/assets/vendor/echarts/echarts.min.js"></script>
<script src="<?= base_url() ?>back/assets/vendor/quill/quill.min.js"></script>
<script src="<?= base_url() ?>back/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?= base_url() ?>back/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?= base_url() ?>back/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>back/assets/js/main.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<style>
    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: dimgrey;
        border-color: dimgrey;
    }
</style>

</body>

</html>