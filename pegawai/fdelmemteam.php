<?php

$link = mysqli_connect("localhost", "root", "", "siftigo");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$NIM=$_GET['NIM'];
$tahun=$_GET['tahun'];
$IdTim = $_GET['IdTim'];
$sql="Update mhs Set IdTim = NULL Where NIM='$NIM'";
echo $sql;

$hasil = mysqli_query($link,$sql);
$GLOBALS['mssg']="";

header('Location: detailteam.php?IdTim='.$IdTim.'&tahun='.$tahun.'');
?>