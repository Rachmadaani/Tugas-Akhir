</div> <!-- /.content-wrapper -->

<!-- Footer -->
<footer class="bg-primary py-3 text-center text-white small w-100">
  <div>
    <strong>&copy; <?= date('Y') ?> <span class="text-warning">EVENT OLAHRAGA</span></strong> — All rights reserved.
  </div>
</footer>

</div> <!-- /.wrapper -->

<!-- JS Library Order is important -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>

<!-- Optional Plugins -->
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // Hide preloader after page load
  window.addEventListener("load", function() {
    const preloader = document.querySelector(".preloader");
    if (preloader) preloader.style.display = "none";
  });

  $(function() {
    $('[data-widget="pushmenu"]').PushMenu(); // Sidebar toggle
    $('.summernote').summernote({
      height: 200
    }); // Summernote init
  });

  console.log("Dashboard loaded.");
</script>
</body>

</html>