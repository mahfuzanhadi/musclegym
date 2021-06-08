<?php

include "koneksi.php";

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_hp = $_POST['no_hp'];
$tanggal_lahir = date('Y-m-d', strtotime($_POST['tanggal_lahir']));
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "UPDATE user SET nama = '$nama', alamat = '$alamat', jenis_kelamin = '$jenis_kelamin', no_hp = '$no_hp', tanggal_lahir = '$tanggal_lahir', email = '$email', username = '$username', password = '$password' WHERE id_user = '$id_user'";
mysqli_query($conn, $query) or die(mysqli_error($conn));

header("location:data_user.php");
