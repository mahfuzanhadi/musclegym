<?php
include "koneksi.php";

$id_paket = $_POST['id'];

$sql = "SELECT harga FROM paket WHERE id_paket = '$id_paket'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
echo json_encode($data);
