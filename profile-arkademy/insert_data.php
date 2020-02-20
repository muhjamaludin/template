<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $id_user = $_POST["id_user"];
    $nama = $_POST["name"];
    $role = $_POST["role"];
    $availability = $_POST["availability"];
    $age = $_POST["age"];
    $location = $_POST['location'];
    $years = $_POST['years'];
    $email = $_POST['email'];

    $sql = "INSERT INTO user (id, nama, role, availability, age, location, years_experience, email) values (
	  $id_user, $nama, $role, $availability, $age, $location, $years, $email);";

    if($koneksi->query($sql)===TRUE){
        echo "Update Data Berhasil";
    }else{
        echo "Update Data Gagal!";
    }
}
?>
