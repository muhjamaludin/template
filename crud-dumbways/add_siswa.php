<html>
    <head>
        <title>Add Siswa</title>
    </head>

    <body>
        <a href="index.php">Kembali</a>
        <br><br>

        <form action="add_siswa.php" method="POST" name="form1">
            <table>
                <tr>
                    <td>NIS</td>
                    <td><input type="text" name="NIS"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td><input type="text" name="kelas"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" value="Add Siswa"></td>
                </tr>
            </table>
        </form>

        <?php
            //pengecekan bila form submit diisikan
            if(isset($_POST['Submit'])){
                $NIS = $_POST['NIS'];
                $nama = $_POST['nama'];
                $kelas = $_POST['kelas'];
                $alamat = $_POST['alamat'];
            

            //include database config
            include "config.php";

            //query 
            $result = mysqli_query($koneksi, "INSERT INTO tb_siswa (NIS, nama, kelas, alamat) VALUES 
                        ('$NIS', '$nama', '$kelas', '$alamat');");
            
            //message
            echo "Berhasil menambahkan data siswa <br> <a href='index.php'>Lihat Data</a>";
            header("location: index.php");
            }
        ?>
    </body>
</html>