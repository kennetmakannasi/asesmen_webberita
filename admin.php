<?php
include "koneksi.php";

if(!empty($_SESSION["id"])){
    $id=$_SESSION["id"];
    $hasil = mysqli_query($koneksi,"SELECT*FROM tb_user WHERE id =$id ");
    $row = mysqli_fetch_assoc($hasil);
}
else{
    header("location: login.php");
}
    
if(isset($_POST['submit'])){
    $judul= $_POST["judul"];
    $penulis= $row["username"];
    $idpenulis= $row["id"];
    $tanggal= $_POST["tanggal"];
    $isi= $_POST["isi"];
    $direktori="img/";
    $file= $_FILES['image']['name'];
    $jenisberita= $_POST["jenisberita"];
    move_uploaded_file($_FILES['image']['tmp_name'],$direktori.$file);

    $query= mysqli_query($koneksi,"INSERT INTO detail_berita(judul,penulis,id_penulis,tanggal,isi,foto,jenis_berita) VALUES ('$judul','$penulis','$idpenulis','$tanggal','$isi','$file','$jenisberita')");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="m-0">

<!--navbar-->
<div class=" text-white h-20 bg-neutral-800">
    <div class="flex ml-5">
    <a href="index.php" class="m-3 font-medium text-xl mt-6 hover:font-bold">HOME</a>
    <a href="nasional.php" class="m-3 font-medium text-xl mt-6 hover:font-bold">NASIONAL</a>
    <a href="internasional.php" class="m-3 font-medium text-xl mt-6 hover:font-bold">INTERNASIONAL</a>
    <a href="politik.php" class="m-3 font-medium text-xl mt-6 hover:font-bold">POLITIK</a>
    <a href="olahraga.php" class="m-3 font-medium text-xl mt-6 hover:font-bold">OLAHRAGA</a>
    <a href="lainnya.php" class="m-3 font-medium text-xl mt-6 mr-11 hover:font-bold">LAINNYA</a>
    <a href="admin.php" class="mt-3 ml-96"><svg xmlns="http://www.w3.org/2000/svg" width="3.5em" height="3.5em" viewBox="0 0 24 24"><g fill="none" stroke="#b91c1c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2"/><path d="M4.271 18.346S6.5 15.5 12 15.5s7.73 2.846 7.73 2.846M12 12a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/></g></svg></a>
    </div>
</div>
<!--header!-->
<div class=" mt-8">
<div class=" ml-3"><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24"><path fill="black" d="M18.464 2.114a.998.998 0 0 0-1.033.063l-13 9a1.003 1.003 0 0 0 0 1.645l13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-.536-.886M17 19.091L6.757 12L17 4.909z"/></svg></a></div>
<div class=" ml-20 top-28 absolute">
    <h1 class=" font-bold text-4xl">Selamat Datang <?php echo $row['username']?></h1>
</div>
<div class=" ml-20 h-2 w-10/12 bg-red-700 rounded-lg mt-2"></div>
</div>

<!--form buat berita-->
<div class=" ml-32 mt-4">
    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <br>
        <h1 class=" text-2xl mb-3 font-semibold">Buat Berita</h1>
        <a class="text-xl font-medium">Judul</a><br>
        <input class=" bg-zinc-300 h-8 rounded w-6/12" type="text" name="judul" id="judul"><br>
        <a class="text-xl font-medium" >Tanggal</a><br>
        <input class=" bg-zinc-300 h-8 rounded w-6/12" type="datetime-local" name="tanggal" id="tanggal"><br>
        <a class="text-xl font-medium">Isi</a><br>
        <textarea class=" bg-zinc-300 h-44 rounded w-6/12" name="isi" id="isi"></textarea><br>
        <a class="text-xl font-medium">Foto</a><br>
        <input class="text-l" type="file" name="image" id="image"><br>
        <br>
        <p class="text-xl font-medium">Jenis Berita</p>
        <input class=" w-4 h-4" type="radio" name="jenisberita" id="nasional" value="Nasional">
        <label class="text-xl font-medium" for="nasional">Nasional</label><br>

        <input class=" w-4 h-4" type="radio" name="jenisberita" id="internasional" value="Internasional">
        <label class="text-xl font-medium" for="internasional">Internasional</label><br>

        <input class=" w-4 h-4" type="radio" name="jenisberita" id="politik" value="Politik">
        <label class="text-xl font-medium" for="politik">Politik</label><br>

        <input class=" w-4 h-4" type="radio" name="jenisberita" id="olahraga" value="Olahraga">
        <label class="text-xl font-medium" for="olahraga">Olahraga</label><br>

        <input class=" w-4 h-4" type="radio" name="jenisberita" id="dll" value="Lainnya">
        <label class="text-xl font-medium" for="dll">Lainnya</label><br>

        <button class=" bg-red-700 mt-10 text-white h-10 rounded w-52 text-xl hover:bg-red-900 font-semibold" type="submit" name="submit">kirim</button>
        <button class=" bg-red-700 mt-10 text-white h-10 rounded w-52 text-xl hover:bg-red-900 font-semibold ml-44"><a  href="logout.php">logout</a></button>
    </form>
    <br>
    <br>
    
<!--sorting tabel-->
    <form action="" method="post">
        <p  class="text-xl font-medium">Urutkan dari</p>
        <button class=" bg-red-700 mt-2 text-white h-10 rounded w-24 text-xl hover:bg-red-900 font-semibold" type="submit" name="baru">Terbaru</button>
        <button class=" bg-red-700 mt-2 text-white h-10 rounded w-24 text-xl hover:bg-red-900 font-semibold" type="submit" name="lama">Terlama</button>
    </form>
</div>
    <br>
    <br>

<!--tabel list berita-->
    <div class=" ml-32 bg-zinc-300 p-1 w-9/12 rounded-md">
    <table class=" border-separate border-spacing-2 border-zinc-300 text-left" border="1">
    <tr class=" bg-white h-10">
        <th class=" w-10">ID</th>
        <th class=" w-96">judul</th>
        <th class=" w-60">waktu</th>
        <th class=" w-36">jenis berita</th>
        <th class=" w-36" colspan="2">Aksi</th>
    </tr>
    <?php 

    if(isset($_POST['lama'])){
        $ambil=mysqli_query($koneksi, "SELECT * FROM detail_berita WHERE penulis='$row[username]' ORDER BY tanggal ASC");
    }
    if(isset($_POST['baru'])){
        $ambil=mysqli_query($koneksi, "SELECT * FROM detail_berita WHERE penulis='$row[username]' ORDER BY tanggal DESC");
    }
    else{
        $ambil=mysqli_query($koneksi, "SELECT * FROM detail_berita WHERE penulis='$row[username]'");
    }

    while ($tampil = mysqli_fetch_array($ambil)){?>
    <tr class=" border-spacing-3 bg-white h-10">
        <th><?php echo "$tampil[id]"?></th>
        <th><?php echo "$tampil[judul]"?></th> 
        <th><?php echo "$tampil[tanggal]"?></th>
        <th><?php echo "$tampil[jenis_berita]"?></th>
        <th class=" w-16"> <button class=" bg-green-500 border-2 border-solid border-black w-16 h-10 hover:bg-green-600"><?php echo "<a href='edit_berita.php?id=$tampil[id]'>Edit</a>" ?></button></th>
        <th > <button class=" bg-red-600 border-2 border-solid border-black text-white w-16 h-10 hover:bg-red-700"><?php echo "<a href='?id=$tampil[id]'>Hapus</a>" ?></button></th>
    </tr>
    <?php } 
    
    if(isset($_GET['id'])){
        mysqli_query($koneksi,"DELETE FROM detail_berita WHERE id='$_GET[id]'");
        echo "<meta http-equiv=refresh content=2;URL='admin.php'>";
    }
    ?>
    </table>
    </div>
    <br>
    <br>
</body>
</html>