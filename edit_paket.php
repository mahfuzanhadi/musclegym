<?php
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
    header("location:login.php");
}

include "koneksi.php";

$id = $_GET['id'];
$sql = "SELECT * FROM paket WHERE id_paket = $id";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
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
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid p-0">

        <!--main content start-->

        <section id="main-content">
            <section class="wrapper">
                <h3>Edit Data Paket </h3>
                <!-- BASIC FORM ELELEMNTS -->
                <form method="post" id="form_paket" action="proses_edit_paket.php">
                    <input type="hidden" name="id_paket" id="id_paket" value="<?= $data['id_paket'] ?>">
                    <div class="mb-3 col-sm-10">
                        <label for="nama_paket" class="form-label">Nama Paket <font color="red">*</font></label>
                        <input type="text" class="form-control" name="nama_paket" id="nama_paket" value="<?= $data['nama_paket'] ?>">
                        <span id="error_nama_paket" class="text-danger"></span>
                    </div>
                    <div class="mb-3 col-sm-10">
                        <label for="harga" class="form-label">Harga <font color="red">*</font></label>
                        <input type="text" class="form-control" name="harga" id="harga" value="<?= $data['harga'] ?>">
                        <span id="error_harga" class="text-danger"></span>
                    </div>
                    <div class="mb-3 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="update" id="update">Submit</button>
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
            $('#update').click(function() {
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