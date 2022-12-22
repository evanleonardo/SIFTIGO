<?php
session_start();
include("../function/koneksi.php");
$link = mysqli_connect("localhost", "root", "", "siftigo");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$idtodo=$_GET['IdTodo'];
$emailmhs=$_SESSION['EmailMhs'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$tglup=date('Y-m-d H:i:s');
$ketup=$_POST['KetUp'];
$nama = $_FILES['file']['name'];
$asal = $_FILES['file']['tmp_name'];
move_uploaded_file($asal,'../file/'.$nama);
$query = "INSERT INTO uptodomhs VALUES ('','$idtodo', '$emailmhs', '$tglup', '$ketup', '$nama', '$lat','$lng','')";
echo $query;

$hasil = mysqli_query($link,$query);
$GLOBALS['mssg']="";
header('Location: detailact.php?IdTodo='.$idtodo.'');
?>