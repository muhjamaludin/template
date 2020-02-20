<?php
    include "koneksi.php";
    
    $sql = "CREATE DATABASE profile";

    if($koneksi->query($sql) === TRUE){
        echo "Database berhasil di buat!";
    }else{
        echo "Database gagal di buat!";
    }
?>