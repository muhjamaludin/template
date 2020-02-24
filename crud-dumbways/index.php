<?php
include "config.php";

$result = mysqli_query($koneksi, "SELECT * FROM tb_siswa ORDER BY id DESC");
?>

<html>
    <head>
        <title>Data Siswa Dumbways</title>
    </head>

    <body>
        <table width="80%" border='0' align='center'>
	    <tr>
		<td colspan='4' align='center'><h3>Data Siswa<br></h3></td>
		<td colspan='1' align='center'><a href="add_siswa.php" align='center'>Tambah Siswa Baru<br></a></td>
	    </tr>
            <tr align='left'>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th align='center'>Aksi</th>
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

        
    </body>
</html>
