<?php

$link = mysqli_connect("localhost", "root", "", "siftigo");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$IdTodo = $_GET['IdTodo'];
$sql="DELETE FROM todo WHERE idtodo='$IdTodo'";
echo $sql;

$hasil = mysqli_query($link,$sql);
$GLOBALS['mssg']="";

header('Location: activity.php');
?>