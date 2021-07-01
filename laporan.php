<?php
include "koneksi.php";
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