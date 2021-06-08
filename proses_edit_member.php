<?php

include "koneksi.php";

$id_member = $_POST['id_member'];
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$jenis_kelamin = $_POST["jenis_kelamin"];
$no_hp = $_POST["no_hp"];
$paket = $_POST["paket"];
$harga = $_POST["harga"];
$tanggal_mulai = date('Y-m-d', strtotime($_POST['tanggal_mulai']));
$tanggal_akhir = date('Y-m-d', strtotime($_POST['tanggal_akhir']));
$status = $_POST["status"];

$query = "UPDATE member SET nama = '$nama', alamat = '$alamat', jenis_kelamin = '$jenis_kelamin', no_hp = '$no_hp', id_paket = '$paket', harga = '$harga', tanggal_mulai = '$tanggal_mulai', tanggal_akhir = '$tanggal_akhir', status = '$status' WHERE id_member = '$id_member'";
mysqli_query($conn, $query) or die(mysqli_error($conn));

header("location:data_member.php");
