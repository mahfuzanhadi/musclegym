<?php
include "koneksi.php";

session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
  header("location:login.php");
}

$sql = "SELECT member.id_member, member.nama, member.alamat, member.jenis_kelamin, member.no_hp, paket.nama_paket, paket.harga, member.tanggal_mulai, member.tanggal_akhir, member.status, member.created_by FROM member, paket WHERE member.id_paket = paket.id_paket ORDER BY id_member DESC";
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

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

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
        <h3><i class="fa fa-angle-right"></i> Data Member </h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="tabel_member">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>JK</th>
                <th>No. HP</th>
                <th>Paket</th>
                <th>Harga</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Akhir</th>
                <th>Status</th>
                <th>Dibuat Oleh</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              while ($data = mysqli_fetch_array($query)) {
                if ($data['status'] == 1) $status = "Aktif";
                else $status = "Tidak Aktif";
                echo "
                <tr>
                  <td>" . $i . "</td>
                  <td>" . $data['nama'] . "</td>
                  <td>" . $data['alamat'] . "</td>
                  <td>" . $data['jenis_kelamin'] . "</td>
                  <td>" . $data['no_hp'] . "</td>
                  <td>" . $data['nama_paket'] . "</td>
                  <td>" . $data['harga'] . "</td>
                  <td>" . $data['tanggal_mulai'] . "</td>
                  <td>" . $data['tanggal_akhir'] . "</td>
                  <td>" .  $status . "</td>
                  <td>" . $data['created_by'] . "</td>
                  <td><a href='edit_member.php?id=$data[id_member]' type='button' name='edit' class='btn btn-success btn-sm'><i class='fa fa-edit'></i></a>&nbsp;<a href='hapus_member.php?id=$data[id_member]' type='button'  name='hapus' id='hapus' class='btn btn-danger btn-sm' onClick='return confirm_hapus()' ><i class='fa fa-trash'></i></a></td>
              </tr>
              ";
                $i++;
              }
              ?>
            </tbody>
          </table>
        </div>
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
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="
https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#tabel_member').DataTable({
        "scrollX": true,
        "lengthMenu": [10, 20, 50],
        "columnDefs": [{
            "targets": [0, 2, 11],
            "orderable": false
          },
          {
            "targets": 0,
            "width": "15px"
          },
          {
            "targets": 6,
            render: $.fn.dataTable.render.number('.')
          },
          {
            "targets": 7,
            render: function(data) {
              return moment(data).locale("id").format('D MMMM YYYY');
            }
          },
          {
            "targets": 8,
            render: function(data) {
              return moment(data).locale("id").format('D MMMM YYYY');
            }
          },
          {
            "targets": 11,
            "width": "70px"
          },
        ]
      });
    });

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