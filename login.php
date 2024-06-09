<?php
//handler login
include "koneksi.php";
if(isset($_POST["submit"])){
    $usernameemail= $_POST["usernameemail"];
    $password= $_POST["password"];
    $hasil= mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username= '$usernameemail' OR email= '$usernameemail'");
    $row = mysqli_fetch_assoc($hasil);
    if(mysqli_num_rows($hasil)>0){
        if($password== $row["password"]){
            $_SESSION["Login"]= true;
            $_SESSION["id"]= $row["id"];
            header("location: admin.php");
        }
        else{
            echo "
            <script>
                alert('Kata Sandi Salah');        
            </script>
        ";
        }
    }
    else{
        echo "
        <script>
            alert('Pengguna tidak terdaftar');        
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" m-0 bg-neutral-800">
<div class=" mt-6 ml-4"><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24"><path fill="white" d="M18.464 2.114a.998.998 0 0 0-1.033.063l-13 9a1.003 1.003 0 0 0 0 1.645l13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-.536-.886M17 19.091L6.757 12L17 4.909z"/></svg></a></div>

<!--form login-->
    <div class=" bg-white flex justify-center w-4/12 mt-4 m-auto h-5/6 rounded">
    <form class=" mt-6" action=""method="post" autocomplete="off">
        <h1 class=" text-4xl font-bold">Masuk</h1>
        <div class="mt-10">
        <label class="text-xl font-medium" for="usernameemail">Nama atau Email:</label><br>
        <input class=" bg-zinc-300 h-8 rounded w-96" type="text" name="usernameemail" id="usernameemail" required value=""><br>
        <label class="text-xl font-medium" for="password">Password:</label><br>
        <input class=" bg-zinc-300 h-8 rounded w-96" type="password" name="password" id="password" required value=""><br>
        <div class=" ml-44">
        <a class=" font-medium">Belum memiliki akun?</a>
        <a class=" font-semibold hover:font-bold" href="signin.php">Daftar</a><br>
        </div>
        <button class=" bg-red-700 mt-28 text-white h-10 rounded w-96 text-xl hover:bg-red-900 font-semibold" type="submit" name="submit">Masuk</button>
        </div>
        <div class=" bg-white flex justify-center mt-24 m-auto">
        </div>
    </form>
    </div>
</body>
</html>