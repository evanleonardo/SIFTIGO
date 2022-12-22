<?php
session_start();
include("../function/koneksi.php");
$link = mysqli_connect("localhost", "root", "", "siftigo");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$namatim=$_POST['NamaTim'];
$tahun=$_POST['tahun'];
$emailpgw=$_SESSION['EmailPgw'];
$stattim=$_POST['stattim'];
$query = "INSERT INTO tim VALUES ('','$emailpgw', '$namatim', '', '$stattim','$tahun')";
echo $query;

$hasil = mysqli_query($link,$query);
$GLOBALS['mssg']="";
header('Location: team.php');
?>