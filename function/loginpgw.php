<?php
include('function/koneksi.php');
session_start(); // Memulai Session
$error=''; // Variabel untuk menyimpan pesan error
if (isset($_POST['submit'])) { // cek dah klik submit blm
    // Variabel username dan password
    $user=$_POST['EmailPgw'];
    $password=$_POST['PassPgw'];

    //$user="admin";
    //$password="admin";
    // Mencegah MySQL injection
    $user = stripslashes($user);
    $password = stripslashes($password);
    $user = mysqli_real_escape_string($koneksi,$user);
    $password = mysqli_real_escape_string($koneksi,$password);
    //Cek user sudah terdaftar blm

    $query = "SELECT * FROM `pgw` WHERE EmailPgw='$user' AND PassPgw='$password'";
    //$query = mysqli_query($koneksi,"select * from pegawai where password='$password' AND user='$username'");
    $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    //$results = mysqli_query($link, $query) or die(mysqli_error($link));
    //$rows = mysqli_num_rows($query);
    $count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
    if ($count == 1){
        $_SESSION['EmailPgw'] = $user;
    }else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        $fmsg = "Invalid Login Credentials.";
        echo "<script type='text/javascript'>alert('Username atau Password belum terdaftar');</script>";
    }
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['EmailPgw'])){
    $username = $_SESSION['EmailPgw'];
    echo "Hai " . $username . "
";
    echo "This is the Members Area
";
    header("location: pegawai/index.php?EmailPgw=".$username."");


}else{

}
?>
