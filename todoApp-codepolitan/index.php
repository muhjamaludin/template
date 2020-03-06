<?php
$todos = [];
//Ngecek apakah file txt itu ada atau enggak
if(file_exists('todo.txt')){
    $file = file_get_contents('todo.txt');
    $todos = unserialize($file);
}
//Jika ditemukan todo yg dikirim melalui method POST
if(isset($_POST['todo'])){
    $data = $_POST['todo'];
    //kalo diatas sudah ada data, todos akan buat baris baru    
    $todos[] =[
        'todo'=> $data,
        'status'=> 0
    ];
    //Simpan dalam format serialize
    $daftar_belanja=serialize($todos);
    file_put_contents('todo.txt', $daftar_belanja);
    //untuk refresh data agar tidak resubmission
    header('Location:index.php');
}
//jika ditemukan $_GET['status']
if(isset($_GET['status']))
{
   //ubah status
    $todos[$_GET['key']]['status']=$_GET['status'];
    $daftar_belanja=serialize($todos);
    simpanData($daftar_belanja);

}
//jika ditemukan perintah hapus / $_GET['hapus']
if(isset($_GET['hapus']))
{
    //hapus data dengan key sesuai yang dipilih
    unset($todos[$_GET['key']]);
    $daftar_belanja=serialize($todos);  
    simpanData($daftar_belanja);
}

function simpanData($daftar_belanja)
{
    file_put_contents('todo.txt',$daftar_belanja);
    header('location:index.php');
}
print_r($todos);
?>
<h1>Aplikasi TODO</h1>
<form action="" method="POST">
    <label>Apa kegiatanmu hari ini?</label>
    <input type="text" name="todo">
    <button type="submit">Simpan</button>
</form>
<ul>
    <?php foreach($todos as $key => $value): ?>
    <li>
        <input type="checkbox" name="todo" onclick="window.location.href='index.php?status=<?php echo($value['status']==1)? '0': '1'; ?>&key=<?php echo $key;?>'";
        <?php if($value['status']==1) echo 'checked'; ?>>
        <label> 
            <?php 
                if($value['status']==1)
                {
                echo '<del>'.$value['todo'].'</del>'; 
                }
                else
                {
                    echo $value['todo'];
                }
            ?>
        </label>
        <a href="index.php?hapus=1&key=<?php echo $key;?>" onclick="return confirm('Apakah Anda Yakin akan menghapus data ini?')">apus</a>
    </li>
    <?php endforeach; ?>
</ul>