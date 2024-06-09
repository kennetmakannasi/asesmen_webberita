<!DOCTYPE html>
<html class=" fo" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="m-0">
<!--navbar!-->
<div class=" text-white h-20 bg-neutral-800">
    <div class="flex ml-5">
    <a href="index.php" class="m-3 font-medium text-xl mt-6 text-red-700">HOME</a>
    <a href="nasional.php" class="m-3 font-medium text-xl mt-6 hover:font-bold">NASIONAL</a>
    <a href="internasional.php" class="m-3 font-medium text-xl mt-6 hover:font-bold">INTERNASIONAL</a>
    <a href="politik.php" class="m-3 font-medium text-xl mt-6 hover:font-bold">POLITIK</a>
    <a href="olahraga.php" class="m-3 font-medium text-xl mt-6 hover:font-bold">OLAHRAGA</a>
    <a href="lainnya.php" class="m-3 font-medium text-xl mt-6 mr-11 hover:font-bold">LAINNYA</a>
    <a href="admin.php" class="mt-3 ml-96"><svg xmlns="http://www.w3.org/2000/svg" width="3.5em" height="3.5em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2"/><path d="M4.271 18.346S6.5 15.5 12 15.5s7.73 2.846 7.73 2.846M12 12a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/></g></svg></a>
    </div>
</div>
    
<!--banner!-->
<?php
include "koneksi.php";

$ambilbanner=mysqli_query($koneksi, "SELECT * FROM detail_berita ORDER BY RAND()
LIMIT 1");
($tampilbanner = mysqli_fetch_array($ambilbanner));?>

<div class="relative">
        <img class="h-96 w-full object-cover object-center" src="img/<?php echo "$tampilbanner[foto]"?>" alt="">
        <div class="h-full w-auto absolute inset-0 bg-gray-700 opacity-70"></div>
        <div class="absolute inset-0 justify-center top-28 ml-20">
            <h1 class="text-5xl text-white font-semibold max-h-14 max-w-5xl overflow-hidden"><?php echo "$tampilbanner[judul]"?></h1>
            <p class=" text-xl text-white"><?php echo "$tampilbanner[jenis_berita]"?></p>
            <p class=" text-2xl text-white hover:underline"><?php echo "<a href='detail.php?id=$tampilbanner[id]'>Baca Selengkapnya</a>"?> <a>>>>></a> </p>
        </div>
    </div>


<!--list berita!-->
<div class=" mt-7 ml-12">
    <h1 class=" font-bold text-4xl">Terbaru</h1>
    <div class=" h-2 w-11/12 bg-red-700 rounded-lg mt-2"></div>
</div>
<?php
$ambil=mysqli_query($koneksi, "SELECT * FROM detail_berita ORDER BY tanggal DESC");
while ($tampil = mysqli_fetch_array($ambil)){
?>

<div class=" ml-12 mt-6 relative">
<h1 class=" absolute ml-96 mt-5 font-bold text-3xl  max-h-20 max-w-2xl overflow-hidden"><?php echo "$tampil[judul]"?></h1>
<p class=" absolute ml-96 mt-24 font-semibold text-xl"><?php echo "$tampil[jenis_berita]"?></p>
<button class=" absolute ml-96 mt-44 bg-red-700 text-white h-12 w-56 rounded-lg text-xl hover:bg-red-900"><?php echo "<a href='detail.php?id=$tampil[id]'>Baca Selengkapnya</a>"?></button>
<img class=" h-56 w-80 object-cover object-center rounded-sm" src="img/<?php echo "$tampil[foto]"?>" alt=""><br>
</div>

<?php }
?>
</body>
</html>