<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM user WHERE username = '$username' AND password= '$password'";

$login = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($login);

if (mysqli_num_rows($login) > 0) {
    session_start();
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['status'] = 'login';
    header("location:index.php");
} else {
    header("location:login.php");
}
