<?php
session_start();
$host="localhost";
$username= "root";
$password="";
$database="berita";

$koneksi = new mysqli($host,$username,$password,$database);
//if(!$koneksi){
    //echo "database tidak terkoneksi";
//}else{
    //echo "database terkoneksi";
//}

?>