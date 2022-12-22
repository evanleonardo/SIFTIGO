<?php
$link = mysqli_connect("localhost", "root", "", "siftigo");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


$namatim=$_POST['NamaTim'];
$tahun=$_POST['tahun'];
$emailpgw=$_SESSION['EmailPgw'];
$idtim=$_GET['IdTim'];
$stattim=$_POST['stattim'];
$sql="UPDATE tim SET stattim ='$stattim' WHERE  idtim = '$idtim'";
$hasil = mysqli_query($link,$sql);
$GLOBALS['mssg']="";

header('Location: team.php');

?>
