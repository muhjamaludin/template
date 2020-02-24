<?php
include("config.php");

if(isset($_POST['update'])){
    $id = $_POST['id'];

    $NIS=$_POST['NIS'];
    $nama=$_POST['nama'];
    $kelas=$_POST['kelas'];
    $alamat=$_POST['alamat'];

     $result = mysqli_query($koneksi, "UPDATE tb_siswa SET NIS='$NIS', nama='$nama',
            kelas='$kelas', alamat='$alamat' WHERE id='$id'");

    header("location: index.php");
}
?>

<?php
//Menampilkan Data
$id = $_GET['id'];

$result = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id='$id'");

while($siswa_data=mysqli_fetch_array($result)){
    $NIS=$siswa_data['NIS'];
    $nama=$siswa_data['nama'];
    $kelas=$siswa_data['kelas'];
    $alamat=$siswa_data['alamat'];
}
?>

<html>
    <head>
        <title>Update Siswa</title>
    </head>

    <body>
        <form name='edit-siswa.php' method='POST' action='edit-siswa.php'>
            <table border='0'>
                <tr>
                    <td>NIS</td>
                    <td><input type="text" name="NIS" value=<?php echo $NIS; ?>></td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td><input type="text" name="nama" value=<?php echo $nama; ?>></td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td><input type="text" name="kelas" value=<?php echo $kelas; ?>></td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td><input type="text" name="alamat" value=<?php echo $alamat; ?>></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    </body>
</html>