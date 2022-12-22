<?php
include("../function/koneksi.php");


?>
<html>
    <?php
        $query1="SELECT u.namatodo, u.kettodo, t.NamaTim, m.EmailMhs, m.NamaMhs, m.NIM, u.KetUp, u.FotoUp, u.poinup, u.TglUp 
        FROM mhs m NATURAL JOIN tim t
        INNER JOIN 
        (
            SELECT max(idup) as idup, idtodo, namatodo, kettodo, EmailMhs, TglUp, MAX(ketup) AS KetUp, max(fotoup) as FotoUp, max(poinup) as poinup
            FROM uptodomhs natural join todo p
            GROUP BY emailmhs, IdTodo
        ) u 
            ON u.emailmhs = m.EmailMhs
         ORDER BY idtodo DESC";
        
        $isi=mysqli_query($koneksi,"SELECT u.namatodo, u.kettodo, t.NamaTim, m.EmailMhs, m.NamaMhs, m.NIM, u.KetUp, u.FotoUp, u.poinup, u.TglUp 
        FROM mhs m NATURAL JOIN tim t
        INNER JOIN 
        (
            SELECT max(idup) as idup, idtodo, namatodo, kettodo, EmailMhs, TglUp, MAX(ketup) AS KetUp, max(fotoup) as FotoUp, max(poinup) as poinup
            FROM uptodomhs natural join todo p
            GROUP BY emailmhs, IdTodo
        ) u 
            ON u.emailmhs = m.EmailMhs
        ORDER BY idtodo DESC");


      $sql1 = mysqli_query($koneksi,$query1);
      $data1 = mysqli_fetch_array($sql1);

      echo'
      <h1>ACTIVITY RECAP OF ALL RECORD</h1></br>
      
      <table>
      <thead>
      <tr>
        <th>Act Name</th>
        <th>Act Desc</th>
        <th>Team Name</th>
        <th>Name</th>
        <th>NIM</th>
        <th>Result Desc</th>
        <th>File</th>
        <th>Upload Date</th>
        <th>Point</th>
    </tr>
    </thead>
    <tbody>
';  while($rowR = mysqli_fetch_array($isi)){
        echo '
		<tr>
        <td>' . $rowR['namatodo'] . '</td>
        <td>' . $rowR['kettodo'] . '</td>
        <td>'.$rowR['NamaTim'].'</td>     
        <td>' . $rowR['NamaMhs'] . '</td>
        <td>' . $rowR['NIM'] . '</td>   
        <td>' . $rowR['KetUp'] . '</td>   
        <td>'.$rowR['FotoUp'].'</td>                                                   
        <td>' . $rowR['TglUp'] . '</td>
        <td>' . $rowR['poinup'] . '</td>
		</tr>
		';
    }
    echo'
    </tbody>
    </table>
    ';
    ?>
</html>
