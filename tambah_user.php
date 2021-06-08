<?php
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
    header("location:login.php");
}
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
                <h3><i class="fa fa-angle-right"></i> Tambah Data User </h3>
                <!-- BASIC FORM ELELEMNTS -->
                <form method="post" id="form_user" action="proses_tambah_user.php">
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
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir <font color="red">*</font></label>
                        <input type="date" class="form-control form-control-sm" name="tanggal_lahir" id="tanggal_lahir">
                        <span id="error_tanggal_lahir" class="text-danger"></span>
                    </div>
                    <div class="mb-3 col-sm-10">
                        <label for="email" class="form-label">Email <font color="red">*</font></label>
                        <input type="text" class="form-control form-control-sm" name="email" id="email">
                        <span id="error_email" class="text-danger"></span>
                    </div>
                    <div class="mb-3 col-sm-10">
                        <label for="username" class="form-label">Username <font color="red">*</font></label>
                        <input type="text" class="form-control form-control-sm" name="username" id="username">
                        <span id="error_username" class="text-danger"></span>
                    </div>
                    <div class="mb-3 col-sm-10">
                        <label for="password" class="form-label">Password <font color="red">*</font></label>
                        <input type="password" class="form-control form-control-sm" name="password" id="password">
                        <span id="error_password" class="text-danger"></span>
                    </div>
                    <div class="mb-3 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="insert" id="insert">Submit</button>
                        <a href="data_user.php" type="button" class="btn btn-light" name="cancel" id="cancel">Cancel</a>
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
                var error_tanggal_lahir = '';
                var error_email = '';
                var error_username = '';
                var error_password = '';

                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                var mobile_validation = /^\d{10,12}$/;
                var password_validation = /^.{6,}$/;

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

                if ($.trim($('#tanggal_lahir').val()).length == 0) {
                    error_tanggal_lahir = 'Tanggal Lahir wajib diisi';
                    $('#error_tanggal_lahir').text(error_tanggal_lahir);
                    $('#tanggal_lahir').addClass('has-error');
                } else {
                    error_tanggal_lahir = '';
                    $('#error_tanggal_lahir').text(error_tanggal_lahir);
                    $('#tanggal_lahir').removeClass('has-error');
                }


                if ($.trim($('#email').val()).length == 0) {
                    error_email = 'Email wajib diisi';
                    $('#error_email').text(error_email);
                    $('#email').addClass('has-error');
                } else {
                    if (!filter.test($('#email').val())) {
                        error_email = 'Mohon masukkan email yang valid';
                        $('#error_email').text(error_email);
                        $('#email').addClass('has-error');
                    } else {
                        error_email = '';
                        $('#error_email').text(error_email);
                        $('#email').removeClass('has-error');
                    }
                }

                if ($.trim($('#username').val()).length == 0) {
                    error_username = 'Username wajib diisi';
                    $('#error_username').text(error_username);
                    $('#username').addClass('has-error');
                } else {
                    error_username = '';
                    $('#error_username').text(error_username);
                    $('#username').removeClass('has-error');
                }

                if ($.trim($('#password').val()).length == 0) {
                    error_password = 'Password wajib diisi';
                    $('#error_password').text(error_password);
                    $('#password').addClass('has-error');
                } else {
                    if (!password_validation.test($('#password').val())) {
                        error_password = 'Password harus berisi minimal 6 karakter';
                        $('#error_password').text(error_password);
                        $('#password').addClass('has-error');
                    } else {
                        error_password = '';
                        $('#error_password').text(error_password);
                        $('#password').removeClass('has-error');
                    }
                }

                if (error_nama != '' || error_alamat != '' || error_jenis_kelamin != '' || error_no_hp != '' || error_tanggal_lahir != '' || error_email != '' || error_username != '' || error_password != '') {
                    return false;
                } else {
                    $('#form_user').submit();
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