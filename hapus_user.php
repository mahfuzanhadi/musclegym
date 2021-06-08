<?php

include "koneksi.php";

$id = $_GET["id"];
$query = "DELETE FROM user WHERE id_user='$id'";
mysqli_query($conn, $query) or die(mysqli_error($conn));

header("location:data_user.php");
