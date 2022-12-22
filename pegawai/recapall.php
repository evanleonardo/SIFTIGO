<?php
// include function & css
session_start();
include("../function/koneksi.php");
$getRec = mysqli_query($koneksi, "SELECT u.namatodo, u.kettodo, t.NamaTim, m.EmailMhs, m.NamaMhs, m.NIM, u.KetUp, u.FotoUp, u.poinup, u.TglUp 
FROM mhs m NATURAL JOIN tim t
INNER JOIN 
(
    SELECT max(idup) as idup, idtodo, namatodo, kettodo, EmailMhs, TglUp, MAX(ketup) AS KetUp, max(fotoup) as FotoUp, max(poinup) as poinup
    FROM uptodomhs natural join todo p
    GROUP BY emailmhs, IdTodo
) u 
	ON u.emailmhs = m.EmailMhs
ORDER BY idtodo ASC");

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
                                <a class="nav-link" href="team.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                    Team
                                </a>
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Recap
                                </a>
                    </nav>
                </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Recap</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Recap</li>
                        </ol>
                        </br>
                        <a class="card mb-4 text-center" href=<?php echo'"exportallrecap.php?"'?>>
                            <button type="button" class="btn btn-embossed btn-info btn-xs" style="padding-right:-20">Download PDF</button>
                        </a>
                        <div class="card mb-4">                            
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable of Activity Recap
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
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
                                    <tfoot>
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
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        while ($rowR = mysqli_fetch_array($getRec)){
                                        echo '<tr>
                                            <td>' . $rowR['namatodo'] . '</td>
                                            <td>' . $rowR['kettodo'] . '</td>
                                            <td>'.$rowR['NamaTim'].'</td>     
                                            <td>' . $rowR['NamaMhs'] . '</td>
                                            <td>' . $rowR['NIM'] . '</td>   
                                            <td>' . $rowR['KetUp'] . '</td>   
                                            <td class="text-center">
                                                <a href="downfile.php?path=../file/'.$rowR['FotoUp'].'" download>'.$rowR['FotoUp'].'</a>
                                            </td>                                                   
                                            <td>' . $rowR['TglUp'] . '</td>
                                            <td>' . $rowR['poinup'] . '</td>                                   
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