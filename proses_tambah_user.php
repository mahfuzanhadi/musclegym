<?php
// session_start();

include "koneksi.php";

$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$jenis_kelamin = $_POST["jenis_kelamin"];
$no_hp = $_POST["no_hp"];
$tanggal_lahir = date('Y-m-d', strtotime($_POST['tanggal_lahir']));
$email = $_POST["email"];
$username = $_POST["username"];
$password = md5($_POST["password"]);
// $created_by = $_SESSION['nama'];

$query = "INSERT INTO user(nama, alamat, jenis_kelamin, no_hp, tanggal_lahir, email, username, password) values ('$nama', '$alamat', '$jenis_kelamin', '$no_hp', '$tanggal_lahir', '$email', '$username', '$password')";
mysqli_query($conn, $query) or die(mysqli_error($conn));

header("location:data_user.php");
