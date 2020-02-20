<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "profile";

$koneksi = new mysqli($host, $username, $password, $db);
if($koneksi->connect_error){
    die("Koneksi ke database gagal");
}/*else{
    echo ("koneksi ke database berhasil");
}*/
?>