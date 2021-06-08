<?php
session_start();

include "koneksi.php";

$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$jenis_kelamin = $_POST["jenis_kelamin"];
$no_hp = $_POST["no_hp"];
$paket = $_POST["paket"];
$harga = $_POST["harga"];
$tanggal_mulai = date('Y-m-d', strtotime($_POST['tanggal_mulai']));
$tanggal_akhir = date('Y-m-d', strtotime($_POST['tanggal_akhir']));
$status = $_POST["status"];
$created_by = $_SESSION['nama'];

$query = "INSERT INTO member(nama, alamat, jenis_kelamin, no_hp, id_paket, harga, tanggal_mulai, tanggal_akhir, status, created_by) values ('$nama', '$alamat', '$jenis_kelamin', '$no_hp', '$paket', '$harga', '$tanggal_mulai', '$tanggal_akhir', '$status', '$created_by')";
mysqli_query($conn, $query) or die(mysqli_error($conn));

header("location:data_member.php");
