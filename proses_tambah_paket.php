<?php

include "koneksi.php";

$nama_paket = $_POST["nama_paket"];
$harga = $_POST["harga"];

$query = "INSERT INTO paket(nama_paket, harga) values ('$nama_paket', '$harga')";
mysqli_query($conn, $query) or die(mysqli_error($conn));

header("location:paket.php");
