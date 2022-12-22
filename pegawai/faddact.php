<?php
session_start();
include("../function/koneksi.php");
$link = mysqli_connect("localhost", "root", "", "siftigo");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$tahun=$_POST['tahun'];
$namatodo=$_POST['NamaTodo'];
$stattodo=$_POST['StatTodo'];
$tglmtodo=$_POST['TglMTodo'];
$tglstodo=$_POST['TglSTodo'];
$kettodo=$_POST['KetTodo'];
$pointodo=$_POST['PoinTodo'];
$emailpgw=$_SESSION['EmailPgw'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$query = "INSERT INTO todo VALUES ('', '$tahun','$namatodo', '$stattodo', '$kettodo', '$emailpgw', '$tglmtodo', '$tglstodo','$lat','$lng', '$pointodo')";
echo $query;

$hasil = mysqli_query($link,$query);
$GLOBALS['mssg']="";
header('Location: activity.php');
?>