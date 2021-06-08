<?php

include "koneksi.php";

$id = $_GET["id"];
$query = "DELETE FROM member WHERE id_member='$id'";
mysqli_query($conn, $query) or die(mysqli_error($conn));

header("location:data_member.php");
