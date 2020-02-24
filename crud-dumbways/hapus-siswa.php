<?php
include("config.php");

$id = $_GET['id'];

$result= mysqli_query($koneksi, "DELETE FROM tb_siswa WHERE id='$id'");

header("location: index.php");
?>