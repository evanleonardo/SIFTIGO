<?php
/**
 * Created by PhpStorm.
 * User: user comp
 * Date: 15/05/2017
 * Time: 2:13
 */
$namahost     = "localhost";
$namaPengguna = "root";
$katasandi    = "";
$nama_dbase   = "siftigo";
$koneksi      = mysqli_connect($namahost,$namaPengguna,$katasandi);
$GLOBALS["koneksi"] = $koneksi;
$database     = mysqli_select_db($koneksi,$nama_dbase);
//cek koneksi
if(!$koneksi)
    echo '<div class="alert alert-danger" role="alert">Koneksi Gagal</div>';
if(!$database)
    echo '<div class="alert alert-success" role="alert">Database tidak ditemukan</div>'
?>