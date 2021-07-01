<?php
include "header.php";

session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
  header("location:login.php");
}
?>

<div class="container-fluid p-0">

  <!--main content start-->

  <section id="main-content">
    <section class="wrapper">
      <h3><i class="fa fa-angle-right"></i> Tambah Data Paket </h3>
      <!-- BASIC FORM ELELEMNTS -->
      <form method="post" id="form_paket" action="proses_tambah_paket.php">
        <div class="mb-3 col-sm-10">
          <label for="nama_paket" class="form-label">Nama Paket <font color="red">*</font></label>
          <input type="text" class="form-control" name="nama_paket" id="nama_paket">
          <span id="error_nama_paket" class="text-danger"></span>
        </div>
        <div class="mb-3 col-sm-10">
          <label for="harga" class="form-label">Harga <font color="red">*</font></label>
          <input type="text" class="form-control" name="harga" id="harga">
          <span id="error_harga" class="text-danger"></span>
        </div>
        <div class="mb-3 col-sm-10">
          <button type="submit" class="btn btn-primary" name="insert" id="insert">Submit</button>
          <a href="paket.php" type="button" class="btn btn-light" name="cancel" id="cancel">Cancel</a>
        </div>
      </form>
      <!-- /content-panel -->
</div>
<!-- /col-md-12 -->
</div>
<!-- /row -->
</section>
</section>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/resume.min.js"></script>

<!-- VALIDATION -->
<script>
  $(document).ready(function() {
    $('#insert').click(function() {
      var error_nama_paket = '';
      var error_harga = '';

      if ($.trim($('#nama_paket').val()).length == 0) {
        error_nama_paket = 'Nama paket wajib diisi';
        $('#error_nama_paket').text(error_nama_paket);
        $('#nama_paket').addClass('has-error');
      } else {
        error_nama_paket = '';
        $('#error_nama_paket').text(error_nama_paket);
        $('#nama_paket').removeClass('has-error');
      }

      if ($.trim($('#harga').val()).length == 0) {
        error_harga = 'Harga wajib diisi';
        $('#error_harga').text(error_harga);
        $('#harga').addClass('has-error');
      } else {
        error_harga = '';
        $('#error_harga').text(error_harga);
        $('#harga').removeClass('has-error');
      }

      if (error_nama_paket != '' || error_harga != '') {
        return false;
      } else {
        $('#form_paket').submit();
      }
    });
  });

  function confirm_logout() {
    var konfirmasi = confirm('Apakah anda yakin ingin logout?');
    if (konfirmasi) {
      return true;
    } else {
      return false;
    }
  }
</script>

</body>

</html>