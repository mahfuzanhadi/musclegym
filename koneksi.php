<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "dbfitnes";

$conn = mysqli_connect($host, $username, $password) or die("Koneksi GAGAL");

mysqli_select_db($conn, $db) or die("Database tidak bisa dipilih");
