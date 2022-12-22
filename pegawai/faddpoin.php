<?php
session_start();
include("../function/koneksi.php");
$link = mysqli_connect("localhost", "root", "", "siftigo");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$pointodo=$_GET['pointodo'];
$idup=$_GET['idup'];
$idtodo=$_GET['idtodo'];
$query = "UPDATE uptodomhs SET poinup='$pointodo' where idup='$idup'";

echo $query;

$hasil = mysqli_query($link,$query);
$GLOBALS['mssg']="";
header('Location: reportmhs.php?IdTodo='.$idtodo.'');
?>