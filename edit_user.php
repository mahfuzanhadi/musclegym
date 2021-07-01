<?php
include "koneksi.php";
include "header.php";

session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
    header("location:login.php");
}


$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE id_user = $id";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>

<div class="container-fluid p-0">

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Edit Data User </h3>
            <!-- BASIC FORM ELELEMNTS -->
            <form method="post" id="form_user" action="proses_edit_user.php">
                <input type="hidden" name="id_user" id="id_user" value="<?= $data['id_user'] ?>">
                <div class="mb-3 col-sm-10">
                    <label for="nama" class="form-label">Nama <font color="red">*</font></label>
                    <input type="text" class="form-control form-control-sm" name="nama" id="nama" value="<?= $data['nama'] ?>">
                    <span id="error_nama" class="text-danger"></span>
                </div>
                <div class="mb-3 col-sm-10">
                    <label for="alamat" class="form-label">Alamat <font color="red">*</font></label>
                    <input type="text" class="form-control form-control-sm" name="alamat" id="alamat" value="<?= $data['alamat'] ?>">
                    <span id="error_alamat" class="text-danger"></span>
                </div>
                <div class="mb-3 col-sm-10">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin <font color="red">*</font></label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-sm">
                        <option hidden value="">Pilih jenis kelamin</option>
                        <?php if ($data['jenis_kelamin'] == 'L') : ?>
                            <option value="L" selected>Laki-laki</option>
                            <option value="P">Perempuan</option>
                        <?php else : ?>
                            <option value="L">Laki-laki</option>
                            <option value="P" selected>Perempuan</option>
                        <?php endif; ?>
                    </select>
                    <span id="error_jenis_kelamin" class="text-danger"></span>
                </div>
                <div class="mb-3 col-sm-10">
                    <label for="no_hp" class="form-label">No. HP <font color="red">*</font></label>
                    <input type="text" class="form-control form-control-sm" name="no_hp" id="no_hp" value="<?= $data['no_hp'] ?>">
                    <span id="error_no_hp" class="text-danger"></span>
                </div>
                <div class="mb-3 col-sm-10">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir <font color="red">*</font></label>
                    <input type="date" class="form-control form-control-sm" name="tanggal_lahir" id="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>">
                    <span id="error_tanggal_lahir" class="text-danger"></span>
                </div>
                <div class="mb-3 col-sm-10">
                    <label for="email" class="form-label">Email <font color="red">*</font></label>
                    <input type="text" class="form-control form-control-sm" name="email" id="email" value="<?= $data['email'] ?>">
                    <span id="error_email" class="text-danger"></span>
                </div>
                <div class="mb-3 col-sm-10">
                    <label for="username" class="form-label">Username <font color="red">*</font></label>
                    <input type="text" class="form-control form-control-sm" name="username" id="username" value="<?= $data['username'] ?>">
                    <span id="error_username" class="text-danger"></span>
                </div>
                <div class="mb-3 col-sm-10">
                    <label for="password" class="form-label">Password <font color="red">*</font></label>
                    <input type="password" class="form-control form-control-sm" name="password" id="password" value="<?= $data['password'] ?>">
                    <span id="error_password" class="text-danger"></span>
                </div>
                <div class="mb-3 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="update" id="update">Submit</button>
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
        $('#update').click(function() {
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