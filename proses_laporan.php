<?php
include "koneksi.php";

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$data = array();
$sql = "SELECT member.tanggal_mulai, member.nama, member.harga, paket.nama_paket FROM member, paket WHERE member.id_paket = paket.id_paket AND tanggal_mulai >= '$start_date' AND tanggal_mulai <= '$end_date'";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query)) {
    $rows = array();
    $format_rupiah = "Rp " . number_format($row['harga'], 0, ',', '.');
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    $tanggal = strftime("%d %B %Y", strtotime($row['tanggal_mulai']));
    $rows[] = $tanggal;
    $rows[] = $row['nama'];
    $rows[] = $row['nama_paket'];
    $rows[] = $format_rupiah;
    $data[] = $rows;
    $data2[] = $row['harga'];
}
echo json_encode(array($data, $data2));
