<?php
$host = "localhost";
$db ="sekolah";
$username = "root";
$pass = "";

$koneksi = mysqli_connect($host, $username, $pass, $db);
if($koneksi->connect_error){
    die("Koneksi Gagal!");
}
?>