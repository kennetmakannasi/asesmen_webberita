<?php
include "koneksi.php";

$sql=mysqli_query($koneksi,"SELECT * FROM detail_berita WHERE id='$_GET[id]'");
$ambil=mysqli_fetch_array($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" m-0 bg-neutral-800">

<div class=" mt-6 ml-4"><a href="admin.php"><svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24"><path fill="white" d="M18.464 2.114a.998.998 0 0 0-1.033.063l-13 9a1.003 1.003 0 0 0 0 1.645l13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-.536-.886M17 19.091L6.757 12L17 4.909z"/></svg></a></div>

    <!--form edit-->
    <div class=" bg-white flex justify-center w-4/12 mt-4 m-auto h-5/6 rounded">
    <form class=" mt-6" action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <h1 class=" text-4xl font-bold">Edit Berita</h1>
        <div class="mt-10">
        <label class="text-xl font-medium" for="judul">Judul:</label><br>
        <input class=" bg-zinc-300 h-8 rounded w-96" type="text" name="judul" id="judul" value="<?php echo $ambil['judul']?>"><br>
        <label class="text-xl font-medium" for="isi">Isi:</label><br>
        <textarea name="isi" id="isi" class=" bg-zinc-300 h-44 rounded min-w-96 max-w-96"><?php echo $ambil['isi']?></textarea><br>
        <button class=" bg-red-700 mt-16 text-white h-10 rounded w-96 text-xl hover:bg-red-900 font-semibold" type="submit" name="submit">kirim</button>
    </div>
    <div class=" bg-white flex justify-center mt-10 m-auto">
    </div>
    </form>
</div>
    <?php
    if(isset($_POST['submit'])){
        mysqli_query($koneksi, "UPDATE detail_berita set 
        judul= '$_POST[judul]',
        isi= '$_POST[isi]'
        where id= '$_GET[id]'");

        echo "
        <script>
            alert('Berita berhasil di edit');        
        </script>
        ";
    }

    
    ?>
</body>
</html>