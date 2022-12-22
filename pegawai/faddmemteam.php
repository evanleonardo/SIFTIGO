<?php
session_start();
include("../function/koneksi.php");
$link = mysqli_connect("localhost", "root", "", "siftigo");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$NIM=$_GET['NIM'];
$tahun=$_GET['tahun'];
$IdTim = $_GET['IdTim'];
$query = "UPDATE mhs SET IdTim = '$IdTim' WHERE NIM = '$NIM'";
echo $query;

$hasil = mysqli_query($link,$query);
$GLOBALS['mssg']=""; 

header('Location: addmemteam.php?IdTim='.$IdTim.'&tahun='.$tahun.'');
?>