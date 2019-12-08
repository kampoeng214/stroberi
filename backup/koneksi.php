<?php
$host="localhost";
$username="root";
$pass="";
$db_name="stroberi";
//$url=$_SERVER['REQUEST_URI'];

    $connect = mysqli_connect('localhost','root','','stroberi');
    if (mysqli_connect_errno())
    {
        echo "<script language='javascript'>alert('Gagal Koneksi Database MySql !!')</script>";	
    }else 
      
    

?>