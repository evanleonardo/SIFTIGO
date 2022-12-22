<?php
session_start();
if (isset($_SESSION['EmailPgw'])) {
    $link = mysqli_connect("localhost", "root", "", "siftigo");

    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $query = "SELECT EmailPgw FROM pgw WHERE EmailPgw = '" . $_SESSION['EmailPgw'] . "'";

    if ($result = mysqli_query($link, $query)) {

        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($result)) {
            $cek = $row['EmailPgw'];

            if ($cek == $_SESSION['username']) {
                header("location: ../pegawai/index.php?EmailPgw=".$cek."");
            } else {
                header("location: ../index.php");
            }
        }
    }
}else{

}
?>