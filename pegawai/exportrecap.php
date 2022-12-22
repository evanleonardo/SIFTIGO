<?php
include("../function/koneksi.php");

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=recapexport.xls");

$idtim = $_GET['idtim'];

// Tambahkan table
include 'datarecap.php';







/*echo'
<table border="1">
	<tr>
		<th>NO.</th>
		<th>NIM</th>
	</tr>';


	//query menampilkan data
    $query="SELECT * FROM pendaftaran where kd_bsw='".$_GET['kd_bsw']."' and nominal_disetujui is not null ";
	$sql = mysqli_query($koneksi,$query);

	$no = 1;
	while($data = mysqli_fetch_array($sql)){
        echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['nim'].'</td>
		</tr>
		';
        $no++;
    }
echo'</table>';*/


?>
