<?php
include "koneksi.php";
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
  header("location:login.php");
}

$sql = "SELECT * FROM paket";
$query = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MUSCLE GYM</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/resume.min.css" rel="stylesheet">

  <style>
    section .wrapper {
      margin: 1rem;
    }

    table {
      margin-top: 1rem;
    }
  </style>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="index.php">
      <span class="d-block d-lg-none">MUSCLE GYM</span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/gym.jpg" alt="">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="registrasi.php">REGISTRASI MEMBER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="data_member.php">DATA MEMBER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="paket.php">PAKET</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="laporan.php">LAPORAN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="data_user.php">DATA USER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="logout.php" onclick="return confirm_logout()">LOGOUT</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0">

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Form Registrasi Member </h3>
        <!-- BASIC FORM ELELEMNTS -->
        <form method="post" id="form_member" action="proses_registrasi.php">
          <div class="mb-3 col-sm-10">
            <label for="nama" class="form-label">Nama <font color="red">*</font></label>
            <input type="text" class="form-control form-control-sm" name="nama" id="nama">
            <span id="error_nama" class="text-danger"></span>
          </div>
          <div class="mb-3 col-sm-10">
            <label for="alamat" class="form-label">Alamat <font color="red">*</font></label>
            <input type="text" class="form-control form-control-sm" name="alamat" id="alamat">
            <span id="error_alamat" class="text-danger"></span>
          </div>
          <div class="mb-3 col-sm-10">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin <font color="red">*</font></label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-sm">
              <option hidden value="">Pilih jenis kelamin</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
            <span id="error_jenis_kelamin" class="text-danger"></span>
          </div>
          <div class="mb-3 col-sm-10">
            <label for="no_hp" class="form-label">No. HP <font color="red">*</font></label>
            <input type="text" class="form-control form-control-sm" name="no_hp" id="no_hp">
            <span id="error_no_hp" class="text-danger"></span>
          </div>
          <div class="mb-3 col-sm-10">
            <label class="form-label">Pilihan Paket</label>
            <select class="form-control form-control-sm" name="paket" id="paket">
              <option value="" hidden>Pilih Paket</option>
              <?php
              while ($paket = mysqli_fetch_array($query)) {
                echo "<option value='" . $paket['id_paket'] . "'>" . $paket['nama_paket'] . "</option>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3 col-sm-10">
            <label class="form-label">Harga</label>
            <input type="text" class="form-control form-control-sm" name="harga" id="harga">
          </div>
          <div class="mb-3 col-sm-10">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai <font color="red">*</font></label>
            <input type="date" class="form-control form-control-sm" name="tanggal_mulai" id="tanggal_mulai">
            <span id="error_tanggal_mulai" class="text-danger"></span>
          </div>
          <div class="mb-3 col-sm-10">
            <label for="tanggal_akhir" class="form-label">Tanggal Akhir <font color="red">*</font></label>
            <input type="date" class="form-control form-control-sm" name="tanggal_akhir" id="tanggal_akhir">
            <span id="error_tanggal_akhir" class="text-danger"></span>
          </div>
          <div class="mb-3 col-sm-10">
            <label for="status" class="form-label">Status <font color="red">*</font></label>
            <select name="status" id="status" class="form-control form-control-sm">
              <option hidden value="">Pilih status</option>
              <option value="1">Aktif</option>
              <option value="0">Tidak aktif</option>
            </select>
            <span id="error_status" class="text-danger"></span>
          </div>
          <div class="mb-3 col-sm-10">
            <button type="submit" class="btn btn-primary" name="insert" id="insert">Submit</button>
            <a href="data_member.php" type="button" class="btn btn-light" name="cancel" id="cancel">Cancel</a>
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
        var error_nama = '';
        var error_alamat = '';
        var error_jenis_kelamin = '';
        var error_no_hp = '';
        var error_paket = '';
        var error_tanggal_mulai = '';
        var error_tanggal_akhir = '';
        var error_status = '';

        if ($.trim($('#nama').val()).length == 0) {
          error_nama = 'Nama wajib diisi';
          $('#error_nama').text(error_nama);
          $('#nama').addClass('has-error');
        } else {
          error_nama = '';
          $('#error_nama').text(error_nama);
          $('#nama').removeClass('has-error');
        }

        if ($.trim($('#alamat').val()).length == 0) {
          error_alamat = 'Alamat wajib diisi';
          $('#error_alamat').text(error_alamat);
          $('#alamat').addClass('has-error');
        } else {
          error_alamat = '';
          $('#error_alamat').text(error_alamat);
          $('#alamat').removeClass('has-error');
        }

        if ($.trim($('#jenis_kelamin').val()).length == 0) {
          error_jenis_kelamin = 'Jenis Kelamin wajib diisi';
          $('#error_jenis_kelamin').text(error_jenis_kelamin);
          $('#jenis_kelamin').addClass('has-error');
        } else {
          error_jenis_kelamin = '';
          $('#error_jenis_kelamin').text(error_jenis_kelamin);
          $('#jenis_kelamin').removeClass('has-error');
        }

        if ($.trim($('#no_hp').val()).length == 0) {
          error_no_hp = 'No. HP wajib diisi';
          $('#error_no_hp').text(error_no_hp);
          $('#no_hp').addClass('has-error');
        } else {
          if (!mobile_validation.test($('#no_hp').val())) {
            error_no_hp = 'Mohon masukkan no hp yang valid';
            $('#error_no_hp').text(error_no_hp);
            $('#no_hp').addClass('has-error');
          } else {
            error_no_hp = '';
            $('#error_no_hp').text(error_no_hp);
            $('#no_hp').removeClass('has-error');
          }
        }

        if ($.trim($('#paket').val()).length == 0) {
          error_paket = 'Paket wajib diisi';
          $('#error_paket').text(error_paket);
          $('#paket').addClass('has-error');
        } else {
          error_paket = '';
          $('#error_paket').text(error_paket);
          $('#paket').removeClass('has-error');
        }

        if ($.trim($('#tanggal_mulai').val()).length == 0) {
          error_tanggal_mulai = 'Tanggal mulai wajib diisi';
          $('#error_tanggal_mulai').text(error_tanggal_mulai);
          $('#tanggal_mulai').addClass('has-error');
        } else {
          error_tanggal_mulai = '';
          $('#error_tanggal_mulai').text(error_tanggal_mulai);
          $('#tanggal_mulai').removeClass('has-error');
        }

        if ($.trim($('#tanggal_akhir').val()).length == 0) {
          error_tanggal_akhir = 'Tanggal akhir wajib diisi';
          $('#error_tanggal_akhir').text(error_tanggal_akhir);
          $('#tanggal_akhir').addClass('has-error');
        } else {
          error_tanggal_akhir = '';
          $('#error_tanggal_akhir').text(error_tanggal_akhir);
          $('#tanggal_akhir').removeClass('has-error');
        }


        if (error_nama != '' || error_alamat != '' || error_jenis_kelamin != '' || error_no_hp != '' || error_paket != '' || error_tanggal_mulai != '' || error_tanggal_akhir != '' || error_status != '') {
          return false;
        } else {
          $('#form_member').submit();
        }
      });

      $('#paket').change(function() {
        var id = $(this).val();
        $.ajax({
          url: "get_harga.php",
          method: "POST",
          data: {
            id: id
          },
          async: true,
          dataType: 'JSON',
          success: function(data) {
            var harga = data[0];
            $('#harga').val(harga);
            debugger;
          }
        });
        return false;
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