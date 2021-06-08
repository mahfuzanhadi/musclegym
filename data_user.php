<?php
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
    header("location:login.php");
}

include "koneksi.php";

$sql = "SELECT *FROM user";

$result = $conn->query($sql);
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

        i {
            width: 15px;
            height: 15px;
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
                <h3><i class="fa fa-angle-right"></i> Data User </h3>
                <!-- BASIC FORM ELELEMNTS -->
                <a href="tambah_user.php" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data User</a>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>No. HP</th>
                            <th>Tanggal Lahir</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($row['jenis_kelamin'] == 'L')
                                    $jk = 'Laki-laki';
                                else $jk = 'Perempuan';
                                echo "<tr>
                                    <td>" . $i . "</td>
                                    <td>" . $row['nama'] . "</td>
                                    <td>" . $row['alamat'] . "</td>
                                    <td>" . $jk . "</td>
                                    <td>" . $row['no_hp'] . "</td>
                                    <td>" . $row['tanggal_lahir'] . "</td>
                                    <td>" . $row['email'] . "</td>
                                    <td><a href='edit_user.php?id=$row[id_user]' type='button' name='edit' class='btn btn-success btn-sm'><i class='fa fa-edit'></i></a>&nbsp;<a href='hapus_user.php?id=$row[id_user]' type='button'  name='hapus' id='hapus' class='btn btn-danger btn-sm' onClick='return confirm_hapus()' ><i class='fa fa-trash'></i></a></td>
                                </tr>";
                                $i++;
                            }
                        } else {
                            echo "<tr><td colspan=4><center>Data tidak ditemukan.</center></td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
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

    <script>
        function confirm_hapus() {
            var konfirmasi = confirm('Apakah anda yakin ingin menghapus data ini?');
            if (konfirmasi) {
                return true;
            } else {
                return false;
            }
        }

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