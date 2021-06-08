<?php

include "koneksi.php";

$id_paket = $_POST['id_paket'];
$nama_paket = $_POST['nama_paket'];
$harga = $_POST['harga'];

$query = "UPDATE paket SET nama_paket = '$nama_paket', harga = '$harga' WHERE id_paket = '$id_paket'";
mysqli_query($conn, $query) or die(mysqli_error($conn));

header("location:paket.php");
