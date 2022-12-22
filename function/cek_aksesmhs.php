<?php
session_start();
if (isset($_SESSION['EmailMhs'])) {
    $link = mysqli_connect("localhost", "root", "", "siftigo");

    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $query = "SELECT EmailMhs FROM mhs WHERE EmailMhs = '" . $_SESSION['EmailMhs'] . "'";

    if ($result = mysqli_query($link, $query)) {

        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($result)) {
            $cek = $row['EmailMhs'];

            if ($cek == $_SESSION['username']) {
                header("location: ../mahasiswa/index.php?EmailMhs=".$cek."");
            } else {
                header("location: ../index.php");
            }
        }
    }
}else{

}
?>