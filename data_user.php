<?php
include "koneksi.php";
include "header.php";

session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
    header("location:login.php");
}


$sql = "SELECT *FROM user";

$result = $conn->query($sql);
?>

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