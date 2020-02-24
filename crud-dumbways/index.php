<?php
include "config.php";

$result = mysqli_query($koneksi, "SELECT * FROM tb_siswa ORDER BY id DESC");
?>

<html>
    <head>
        <title>Data Siswa Dumbways</title>
    </head>

    <body>
        <table width="80%" border='1'>
            <tr>
                <th>NIS</th>
                <th>Name</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php
            while($siswa_data=mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>".$siswa_data['NIS']."</td>";
                    echo "<td>".$siswa_data['nama']."</td>";
                    echo "<td>".$siswa_data['kelas']."</td>";
                    echo "<td>".$siswa_data['alamat']."</td>";
                    echo "<td align='center'><a href='edit-siswa.php?id=$siswa_data[id]'>Edit</a>  
                    <a href='hapus-siswa.php?id=$siswa_data[id]' style='color:red'>Hapus</a></td>";
                echo "</tr>";
            }
            ?>
        </table><br><br>

        <a href="add_siswa.php">Tambah Siswa Baru</a>
    </body>
</html>