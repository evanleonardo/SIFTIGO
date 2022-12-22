<?php
include("../function/koneksi.php");


?>
<html>
    <?php
        $tahun=$_GET['tahun'];
        $emailmhs = $_GET['emailmhs'];

        $todo=mysqli_query($koneksi,"SELECT * FROM todo where tahun = '$tahun'");
        $upmhs=mysqli_query($koneksi, "SELECT * FROM uptodomhs where emailmhs = '$emailmhs'");
        $mhs=mysqli_query($koneksi, "SELECT * FROM mhs where emailmhs = '$emailmhs'");
      $bio = mysqli_fetch_array($mhs);

      echo'
      <h1>ACTIVITY LOGBOOK FTIGO UKDW '.$bio['tahun'].'</h1>
      <h3>Name : '.$bio['NamaMhs'].'</h3> 
      <h3>NIM : '.$bio['NIM'].' </h3></br>
      
      <table>
      <thead>
      <tr>
        <th>Act Name</th>
        <th>Act Desc</th>        
        <th>Act Start & Finish Date</th>
        <th>Act Point</th>
        <th>Result Desc</th>
        <th>File</th>
        <th>Upload Date</th>
        <th>Scored</th>
    </tr>
    </thead>
    <tbody>
';  while($rowTD = mysqli_fetch_array($todo)){
        echo '
		<tr>
        <td>' . $rowTD['NamaTodo'] . '</td>
        <td>' . $rowTD['KetTodo'] . '</td>
        <td>'.date('d-m-Y',strtotime($rowTD['TglMTodo'])).' - '.date('d-m-Y',strtotime($rowTD['TglSTodo'])).'</td>
        <td>' . $rowTD['PoinTodo'] . '</td>
        '; if (mysqli_fetch_assoc($upmhs)){
            while($UpR = mysqli_fetch_array($upmhs)){
        echo'
        <td>' . $UpR['KetUp'] . '</td>   
        <td>' . $UpR['FotoUp'] . '</td>   
        <td>'.date('d-m-Y',strtotime($UpR['TglUp'])).'</td>     
        <td>'.(($UpR['poinup']==0)?"Not Scored Yet":"Scored").'</td>
        ';}} else {echo'            
        <td>Not Upload Yet</td>     
        <td>Not Upload Yet</td>     
        <td>Not Upload Yet</td>     
        <td>Not Upload Yet</td>   
        ';} echo'
		</tr>
		';
    }
    echo'
    </tbody>
    </table>
    ';
    ?>
</html>
