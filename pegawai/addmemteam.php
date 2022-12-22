<?php
// include function & css
session_start();
include("../function/koneksi.php");
$IdTim = $_GET['IdTim'];
$tahun = $_GET['tahun'];
$getDataT = mysqli_query($koneksi, "SELECT * FROM tim where IdTim= '$IdTim'");
$getDataM = mysqli_query($koneksi, "SELECT * FROM mhs where IdTim IS NULL AND tahun = '$tahun'");
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
                        <h1 class="mt-4">Add New Team</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href=<?php echo'"detailteam.php?IdTim='.$IdTim.'&tahun='.$tahun.'"'?>>Detail Team</a></li>
                            <li class="breadcrumb-item active">Add New Team</li>
                        </ol><h3>Team <?php while ($rowN= mysqli_fetch_array($getDataT)){echo $rowN['NamaTim'];}?></h3>                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable of Team Member
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Name</th>
                                            <th>Add</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Name</th>
                                            <th>Add</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        while ($rowAct = mysqli_fetch_array($getDataM)){
                                        echo '<tr>
                                            <td>' . $rowAct['NIM'] . '</td>
                                            <td>' . $rowAct['NamaMhs'] . '</td>
                                            <td class="text-center">
                                                <a href="faddmemteam.php?NIM='.$rowAct['NIM'].'&IdTim='.$IdTim.'&tahun='.$tahun.'"><button type="button" class="btn btn-embossed btn-info btn-xs" style="padding-right:-20">Add</button></a>
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