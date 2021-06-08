<?php
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
    header("location:login.php");
}

include "koneksi.php";
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
                <h3><i class="fa fa-angle-right"></i> Laporan </h3>
                <!-- BASIC FORM ELELEMNTS -->
                <div class="card mb-3">
                    <div class="card-header">
                        <div class=" row">
                            <div class="col-md-3">
                                <label for="start_date">Dari tanggal</label>
                                <input type="date" id="start_date" name="start_date" placeholder="Start Date" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label for="end_date">Sampai tanggal</label>
                                <input type="date" id="end_date" name="end_date" placeholder="End Date" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <button type="submit" id="search" name="search" class="btn btn-primary" style="margin-top: 1.9rem;">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="float-left ml-4">
                            <h5 id="total"></h5>
                        </div>
                        <div class="table-responsive">
                            <div id="container" class="table table-hover table-bordered" width="100%" cellspacing="0">

                            </div>
                        </div>
                    </div>
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

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>
    <script>
        $('#search').click(function() {
            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();
            $.ajax({
                type: 'POST',
                url: "proses_laporan.php",
                data: {
                    start_date: start_date,
                    end_date: end_date,
                },
                success: function(response) {
                    let laporan = jQuery.parseJSON(response);

                    function addHeaders(table, keys) {
                        var row = table.insertRow();
                        for (var i = 0; i < keys.length; i++) {
                            var cell = row.insertCell();
                            keys[0] = "Tanggal";
                            keys[1] = "Nama";
                            keys[2] = "Paket"
                            keys[3] = "Harga"
                            cell.appendChild(document.createTextNode(keys[i]));
                        }
                    }

                    var table = document.createElement('table');
                    for (var i = 0; i < laporan[0].length; i++) {
                        var child = laporan[0][i];
                        if (i === 0) {
                            addHeaders(table, Object.keys(child));
                        }
                        var row = table.insertRow();
                        Object.keys(child).forEach(function(k) {
                            // console.log(k);
                            var cell = row.insertCell();
                            cell.appendChild(document.createTextNode(child[k]));
                        });

                        debugger;
                    }
                    $("#container").empty();
                    document.getElementById('container').appendChild(table);
                    table.className = 'table table-hover table-bordered';

                    let data_total = laporan[1];
                    let total = 0;
                    for (var i in data_total) {
                        total += parseInt(data_total[i]);
                    }
                    debugger;

                    var total_data = document.getElementById("total");
                    var format_total = new Intl.NumberFormat(['ban', 'id']).format(total);
                    total_data.innerHTML = 'Total : Rp. ' + format_total;

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