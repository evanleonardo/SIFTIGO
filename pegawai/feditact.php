<?php
$link = mysqli_connect("localhost", "root", "", "siftigo");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$idtodo = $_GET['IdTodo'];
$namatodo=$_POST['NamaTodo'];
$stattodo=$_POST['StatTodo'];
$tglmtodo=$_POST['TglMTodo'];
$tglstodo=$_POST['TglSTodo'];
$kettodo=$_POST['KetTodo'];
$pointodo=$_POST['PoinTodo'];

$sql="UPDATE todo SET namatodo ='".$namatodo."',stattodo ='".$stattodo."',
kettodo ='".$kettodo."',pointodo ='".$pointodo."'
      WHERE  idtodo = '".$idtodo."'";
$hasil = mysqli_query($link,$sql);
$GLOBALS['mssg']="";

header('Location: activity.php');

?>
