<?php
// include function & css
session_start();
include("../function/koneksi.php");
$IdTodo = $_GET['IdTodo'];
$TglSTodor = $_GET['TglSTodo'];
$EmailMhs = $_SESSION['EmailMhs'];
$TglSTodo = date('m/d/Y', strtotime($TglSTodor));
$getTDate = date('m/d/Y', time());
$getDataT = mysqli_query($koneksi, "SELECT * FROM todo where IdTodo= '$IdTodo'");
$getDataUp = mysqli_query($koneksi, "SELECT * FROM uptodomhs where IdTodo= '$IdTodo' and emailmhs = '$EmailMhs' ORDER BY IdUp DESC LIMIT 1");
?>
<html>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SI FTIGO UKDW</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw&callback=initMap"></script>
<script>
// variabel global marker
var marker;
  
function taruhMarker(peta, posisiTitik){
    
    if( marker ){
      // pindahkan marker
      marker.setPosition(posisiTitik);
    } else {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta
      });
    }
    // isi nilai koordinat ke form
    document.getElementById("lat").value = posisiTitik.lat();
    document.getElementById("lng").value = posisiTitik.lng();
    
}
  
function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(-7.784830194,110.373498506),
    zoom:9,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });

}


// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
  

</script>
</head>

<body>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <!-- Navbar Brand-->
                <a class="navbar-brand ps-3" href="index.html">FTIGO</a>
                <!-- Sidebar Toggle-->
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                <!-- Navbar Search-->
                <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!-- Navbar-->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../function/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                </div>
            </nav>
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <a class="nav-link" href="index.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                                <a class="nav-link" href="activity.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Activity
                                </a>
                                <a class="nav-link" href="team.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                    Team
                                </a>
                                <a class="nav-link" href="logbook.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Recap
                                </a>
                    </nav>
                </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Upload Activity</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="activity.php">Activity</a></li>
                            <li class="breadcrumb-item active">Upload Activity</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <?php
                            if($TglSTodo > $getTDate){
                                            echo '                       
                                            <form action="faddupact.php?IdTodo='.$IdTodo.'" method="POST" enctype="multipart/form-data">
                                                        <div class="row mb-3">
                                                            <div class="col-md-3">
                                                                <div class="form-floating mb-3 mb-md-0">
                                                                    <p>Description</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="form-floating">
                                                                    <input class="form-control" id="KetUp" Name="KetUp" type="text" placeholder="Enter activity desc" required>
                                                                    <label for="NamaTodo">Activity Description</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-3">
                                                                <div class="form-floating mb-3 mb-md-0">
                                                                    <p>File</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input class="form-control" id="file" name="file" type="file" required>
                                                            </div>
                                                        </div>                                                      
                                                        <div id="googleMap" style="width:100%;height:380px;"></div>
                                                        <input type="text" id="lat" name="lat" value="" readonly required>
                                                        <input type="text" id="lng" name="lng" value="" readonly required>                                
                                                        <div class="mt-4 mb-0">
                                                            <div class="d-grid"><input type="submit" class="btn btn-primary" value="submit"></div>
                                                        </div>
                                            </form>
                                            ';           
                                        }
                            else if($TglSTodo < $getTDate) {
                                            echo '<h3>TIME IS UP! CANNOT UPLOAD ACTIVITY!😋</h3>';                 
                                        }		
                            ?>                                
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable of Upload Activity
                            </div>
                            <h5 style="color:red;" class="text-center"> THE NEWEST UPLOAD IS THE ONE GETTING SCORED</h5>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>File</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Description</th>
                                            <th>File</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        while ($rowUp = mysqli_fetch_array($getDataUp)){
                                        echo '<tr>
                                            <td>' .$rowUp['KetUp']. '</td>
                                            <td class="text-center">
                                                <a href="downfile.php?path=../file/'.$rowUp['FotoUp'].'" download>'.$rowUp['FotoUp'].'</a>
                                            </td> 
                                        </tr>
                                        ';}
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>