<?php
// include function & css
session_start();
include("../function/koneksi.php");
$IdTodo = $_GET['IdTodo'];
$getDataT = mysqli_query($koneksi, "SELECT * FROM todo where IdTodo= '$IdTodo'");
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
    
    <script type="text/javascript">
        <?php
            $idt=$IdTodo;
            $getTodo = mysqli_query($koneksi, "SELECT * FROM todo where IdTodo= '$idt'");
            if(mysqli_num_rows($getTodo))
            {                
              while($row = mysqli_fetch_assoc($getTodo))
              {
                $lat= $row["Lat"];
                $lng= $row["Lng"];
                
        ?>
                var myCenter=new google.maps.LatLng(<?php echo $lat;?>,<?php echo $lng;?>);
                   function initialize()
                   {
                    var mapProp = {
                    center:myCenter,
                    zoom:18,
                    mapTypeId:google.maps.MapTypeId.ROADMAP
                    };
                    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
                    var marker=new google.maps.Marker({
                    position:myCenter,
                    });
                    marker.setMap(map);
                    //var infowindow = new google.maps.InfoWindow({
                    //    content:"<?php echo $lat?><?php echo $lng?>"
                    //});

                   infowindow.open(map,marker);
                    }  
                google.maps.event.addDomListener(window, 'load', initialize);
<?php
              }
            }
            ?>
    </script>
</head>

<body>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <!-- Navbar Brand-->
                <a class="navbar-brand ps-3" href="index.php">FTIGO</a>
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
                                <a class="nav-link" href="index.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                    Team
                                </a>
                                <a class="nav-link" href="recapall.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Recap
                                </a>
                    </nav>
                </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Detail Activity</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="activity.php">Activity</a></li>
                            <li class="breadcrumb-item active">Detail Activity</li>
                        </ol>

                        
                        <a class="card mb-4 text-center" href=<?php echo'"reportmhs.php?IdTodo='.$IdTodo.'"';?>>
                            <button type="button" class="btn btn-embossed btn-info btn-xs" style="padding-right:-20">Team Report</button>
                        </a>
                    
                        <?php
        while ($rowT= mysqli_fetch_array($getDataT)) {
            echo '
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="" method="">                                
                                            <div id="googleMap" style="width:100%;height:380px;"></div>                                    
                                            <input type="hidden" id="lat" name="lat" value="'.$rowT['Lat'].'" readonly>
                                            <input type="hidden" id="lng" name="lng" value="'.$rowT['Lng'].'" readonly> </br>
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <p>Activity Year</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-floating">
                                                    <p>'.$rowT['tahun'].'</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <p>Activity Name</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-floating">
                                                        <p>'.$rowT['NamaTodo'].'</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <p>Description</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-floating">
                                                    <p>'.$rowT['KetTodo'].'</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <p>Start Date</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-floating">
                                                    <p>'.date('d-m-Y',strtotime($rowT['TglMTodo'])).'</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <p>Finish Date</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-floating">
                                                    <p>'.date('d-m-Y',strtotime($rowT['TglSTodo'])).'</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <p>Point</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-floating">
                                                    <p>'.$rowT['PoinTodo'].'</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <p>Status</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-floating">
                                                    <p>'; if($rowT['StatTodo']=='1'){
                                                        echo'Active';}
                                                        else echo'Inactive';'
                                                    </p>
                                                </div>
                                            </div>                                     
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>                        
            ';}
            ?>
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