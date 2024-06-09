<?php
//handler signin
include "koneksi.php";

if(!empty($_SESSION["id"])){
    header("location: admin.php");
}

if(isset($_POST["submit"])){
    $username= $_POST["username"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $cek= mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' OR email ='$email'");
    if(mysqli_num_rows($cek)>0){
        echo "
        <script>
            alert('Username atau Email sudah terpakai');        
        </script>
        ";
    }
    else{
       $query = mysqli_query($koneksi,"INSERT INTO tb_user(username,email,password) VALUES('$username','$email','$password')");
        if($query){
            $last_id = $query->insert_id;
            $hasil= mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username' && password = '$password'");
            $row = mysqli_fetch_assoc($hasil);
            if(mysqli_num_rows($hasil)>0){
                $_SESSION["Login"]= true;
                $_SESSION["id"]= $row["id"];
                header("location: admin.php");
            }
            
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" m-0 bg-neutral-800">

<div class=" mt-6 ml-4"><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24"><path fill="white" d="M18.464 2.114a.998.998 0 0 0-1.033.063l-13 9a1.003 1.003 0 0 0 0 1.645l13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-.536-.886M17 19.091L6.757 12L17 4.909z"/></svg></a></div>

<!--form sign in-->
    <div class=" bg-white flex justify-center w-4/12 mt-4 m-auto h-5/6 rounded">
    <form class=" mt-6" action=""method="post" autocomplete="off">
        <h1 class=" text-4xl font-bold">Daftar</h1>
        <div class="mt-10">
        <label class="text-xl font-medium" for="username">Nama:</label><br>
        <input class=" bg-zinc-300 h-8 rounded w-96" type="text" name="username" id="username" required value=""><br>

        <label class="text-xl font-medium" for="email">Email:</label><br>
        <input class=" bg-zinc-300 h-8 rounded w-96" type="email" name="email" id="email" required value=""><br>

        <label class="text-xl font-medium" for="password">Password:</label><br>
        <input class=" bg-zinc-300 h-8 rounded w-96" type="password" name="password" id="password" required value=""><br>
        <div class=" ml-44">
        <a class=" font-medium">Sudah memiliki akun?</a>
        <a class=" font-semibold hover:font-bold" href="login.php">Masuk</a><br>
        </div>
        <div>
        <button class=" bg-red-700 mt-14 text-white h-10 rounded w-96 text-xl hover:bg-red-900 font-semibold" type="submit" name="submit">Daftar</button>
        </div>
    </form>
    <div class=" bg-white flex justify-center mt-24 m-auto">
        </div>
    </div>
    </div>
</body>
</html>