<?php

$link = mysqli_connect("localhost", "root", "", "siftigo");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$IdTim = $_GET['IdTim'];
$sql="DELETE FROM tim WHERE idtim='$IdTim'";
echo $sql;

$hasil = mysqli_query($link,$sql);
$GLOBALS['mssg']="";

header('Location: team.php');
?>