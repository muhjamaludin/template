<!DOCTYPE HTML>
<html>
<head>
    <title>TodoApp</title>
    <style>
        
        input {
            width: 100px;
        }
        button {
            width: 60px;
            padding: 0px;
            border: 10px;
        }
        
        ul.demo {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <?php
        //total array yang disiapkan untuk disimpan
        $todos = [];
        if(file_exists('todo.txt')){ //memastika file todo itu ada, menghindari error get file content
            $file = file_get_contents('todo.txt'); //mengambil data dari todo.txt agar tidak tertimpa
            $todos = unserialize($file); //data string diubaah ke dalam array kembali agar todos tidak kosong
        }
        //jika ditemukan todo yang dikirmkan melalui method post
        if(isset($_POST['todo'])){
            $data = $_POST['todo']; // mengambil data dari input todo
                $todos[] = [
                    'todo' => $data, //indeks pertama assosiatif todo dengan nilai post
                    'status' => 0 //status digunakan untuk menjalankan tugas ceklist
                ];
            file_put_contents('todo.txt', serialize($todos)); //dimasukkan ke dalam file todo
            header('location: index.php'); //mengembalikan ke halaman agar input post tidak di gandakan alias clear submit post
        }

        if(isset($_GET['status'])){                             //cek get dari status check ada tidak
            $todos[$_GET['key']]['status']=$_GET['status'];     //masukkan get status kedalam array status
            file_put_contents('todo.txt', serialize($todos));   //memperbarui data status disimpan serial
            header('location: index.php');
        }

        if(isset($_GET['hapus'])){              //cek button hapus
            unset($todos[$_GET['key']]);        //hapus data 
            file_put_contents('todo.txt', serialize($todos));
            header('location: index.php');
        }
    ?>

    <h1>Todo App</h1>
    <form action="" method="POST">
    <label>Daftar Belanja Hari Ini</label> <br>
    <input type="text" name="todo">
    <button type="submit">Simpan</button>
    </form>

    <ul class="demo">
        <?php foreach($todos as $key => $value): ?>
        <li>
            <input type="checkbox" name="todo" onclick="window.location.href='index.php?status=<?php echo($value['status']==1) ? '0' : '1'; ?>
                &key=<?php echo $key; ?>'" <?php if($value['status']==1) echo 'checked' ?>>
            <label>
            <?php 
                echo ($value['status']==1) ? '<del>'.$value['todo'].'</del>' : $value['todo'];
            ?>
            </label>
            <a href="index.php?hapus=1&key=<?php echo $key; ?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini ?')">hapus</a>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>