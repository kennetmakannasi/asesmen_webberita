<?php
include "koneksi.php";

$sql=mysqli_query($koneksi,"SELECT * FROM detail_berita WHERE id='$_GET[id]'");
$ambil=mysqli_fetch_assoc($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<!--navbar-->
<div class=" text-white h-20 bg-neutral-800">
    <div class="flex ml-5">
    <a href="index.php" class="m-3 font-medium text-xl mt-6 hover:font-bold">HOME</a>
    <a href="nasional.php" class="m-3 font-medium text-xl mt-6 hover:font-bold">NASIONAL</a>
    <a href="internasional.php" class="m-3 font-medium text-xl mt-6 hover:font-bold">INTERNASIONAL</a>
    <a href="politik.php" class="m-3 font-medium text-xl mt-6 hover:font-bold">POLITIK</a>
    <a href="olahraga.php" class="m-3 font-medium text-xl mt-6 hover:font-bold">OLAHRAGA</a>
    <a href="lainnya.php" class="m-3 font-medium text-xl mt-6 mr-11 hover:font-bold">LAINNYA</a>
    <a href="admin.php" class="mt-3 ml-96"><svg xmlns="http://www.w3.org/2000/svg" width="3.5em" height="3.5em" viewBox="0 0 24 24"><g fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2"/><path d="M4.271 18.346S6.5 15.5 12 15.5s7.73 2.846 7.73 2.846M12 12a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/></g></svg></a>
    </div>
</div>

<!--header!-->
<div class=" mt-7 ml-12">
    <h1 class=" font-bold text-4xl max-w-5xl"><?php echo "$ambil[judul]"?></h1>
    <div class=" h-2 w-11/12 bg-red-700 rounded-lg mt-2"></div>
</div>
<div class="ml-12 mt-5">
    <p class=" text-xl font-semibold"><?php echo "$ambil[jenis_berita]"?></p>
    <p class=" text-xl font-semibold"><?php echo "$ambil[penulis]"?></p>
    <p class=" text-xl font-semibold"><?php echo "$ambil[tanggal]"?></p>
    <img class=" w-8/12 object-cover object-center mt-5" src="img/<?php echo "$ambil[foto]"?>" alt="">
    <p class=" text-lg mt-5 w-10/12"><?php echo "$ambil[isi]"?></p></p>
</div>
</body>
</html>