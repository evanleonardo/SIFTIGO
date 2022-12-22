<?php
session_start();
include("../function/koneksi.php");
$tdate=date('Y-m-d H:i:s');
$getActO = mysqli_query($koneksi, "select sum(case when StatTodo = '1' then 1 else 0 end) as 'Act' from todo where tglstodo >= '$tdate'");
$getActF = mysqli_query($koneksi, "select sum(case when StatTodo = '1' then 1 else 0 end) as 'Act' from todo where tglstodo < '$tdate'");
$getIAct = mysqli_query($koneksi, "select sum(case when StatTodo = '0' then 1 else 0 end) as 'IAct' from todo");
$getTeam = mysqli_query($koneksi, "select sum(case when stattim = '1' then 1 else 0 end) as 'Act',
sum(case when stattim = '0' then 1 else 0 end) as 'Iact' from tim");
$getTeamP = mysqli_query($koneksi, "SELECT t.IdTim, t.NamaTim, t.tahun, SUM(u.poinup) as poinup FROM tim t natural join mhs m natural join uptodomhs u GROUP BY IdTim ORDER BY poinup DESC");
if (isset($_SESSION['EmailPgw'])){
    $username = $_SESSION['EmailPgw'];
    echo "
    <html lang=\"en\">
        <head>
            <meta charset=\"utf-8\" />
            <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\" />
            <meta name=\"description\" content=\"\" />
            <meta name=\"author\" content=\"\" />
            <title>SI FTIGO UKDW</title>
            <link href=\"https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css\" rel=\"stylesheet\" />
            <link href=\"../css/styles.css\" rel=\"stylesheet\" />
            <script src=\"https://use.fontawesome.com/releases/v6.1.0/js/all.js\" crossorigin=\"anonymous\"></script>
        </head>
        <body class=\"sb-nav-fixed\">
            <nav class=\"sb-topnav navbar navbar-expand navbar-dark bg-dark\">
                <!-- Navbar Brand-->
                <a class=\"navbar-brand ps-3\" href=\"index.php\">FTIGO</a>
                <!-- Sidebar Toggle-->
                <button class=\"btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0\" id=\"sidebarToggle\" href=\"#!\"><i class=\"fas fa-bars\"></i></button>
                <!-- Navbar Search-->
                <div class=\"d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0\">
                <!-- Navbar-->
                <ul class=\"navbar-nav ms-auto ms-md-0 me-3 me-lg-4\">
                    <li class=\"nav-item dropdown\">
                        <a class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\"><i class=\"fas fa-user fa-fw\"></i></a>
                        <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdown\">
                            <li><a class=\"dropdown-item\" href=\"../function/logout.php\">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                </div>
            </nav>
            <div id=\"layoutSidenav\">
                <div id=\"layoutSidenav_nav\">
                    <nav class=\"sb-sidenav accordion sb-sidenav-dark\" id=\"sidenavAccordion\">
                        <div class=\"sb-sidenav-menu\">
                            <div class=\"nav\">
                                <a class=\"nav-link\">
                                    <div class=\"sb-nav-link-icon\"><i class=\"fas fa-tachometer-alt\"></i></div>
                                    Dashboard
                                </a>
                                <a class=\"nav-link\" href=\"activity.php\">
                                    <div class=\"sb-nav-link-icon\"><i class=\"fas fa-columns\"></i></div>
                                    Activity
                                </a>
                                <a class=\"nav-link\" href=\"team.php\">
                                    <div class=\"sb-nav-link-icon\"><i class=\"fas fa-user-alt\"></i></div>
                                    Team
                                </a>
                                <a class=\"nav-link\" href=\"recapall.php\">
                                    <div class=\"sb-nav-link-icon\"><i class=\"fas fa-book-open\"></i></div>
                                    Recap
                                </a>
                    </nav>
                </div>
                <div id=\"layoutSidenav_content\">
                    <main>
                        <div class=\"container-fluid px-4\">
                            <h1 class=\"mt-4\">Dashboard</h1>
                            <ol class=\"breadcrumb mb-4\">
                                <li class=\"breadcrumb-item active\">Dashboard</li>
                            </ol>
                            <div class=\"row\">
                            <h4><a style=\"color:black\" href=\"activity.php\">Activity</a></h4>
                                <div class=\"col-xl-3 col-md-6\">
                                    <div class=\"card bg-success text-white mb-4\">
                                        <div class=\"card-body\">";
                                        foreach($getActO as $row){
                                            echo $row['Act'];} echo" Active Ongoing Activity</div>
                                    </div>
                                </div>
                                <div class=\"col-xl-3 col-md-6\">
                                    <div class=\"card bg-warning text-white mb-4\">
                                        <div class=\"card-body\">";
                                        foreach($getActF as $row){
                                            echo $row['Act'];} echo" Active Finish Activity</div>
                                    </div>
                                </div>                                
                                <div class=\"col-xl-3 col-md-6\">
                                    <div class=\"card bg-danger text-white mb-4\">
                                        <div class=\"card-body\">";
                                        foreach($getIAct as $rowI){
                                            echo $rowI['IAct'];} echo" Inactive Activity</div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"row\">
                            <h4><a style=\"color:black\" href=\"team.php\">Team</a></h4>
                                <div class=\"col-xl-3 col-md-6\">
                                    <div class=\"card bg-success text-white mb-4\">
                                        <div class=\"card-body\">";
                                        foreach($getTeam as $row){
                                            echo $row['Act'];} echo" Active Team</div>
                                    </div>
                                </div>
                                <div class=\"col-xl-3 col-md-6\">
                                    <div class=\"card bg-danger text-white mb-4\">
                                        <div class=\"card-body\">";
                                        foreach($getTeam as $row){
                                            echo $row['Iact'];} echo" Inactive Team</div>
                                    </div>
                                </div>
                                <div class=\"card mb-4\">
                                    <div class=\"card-header\">
                                        <i class=\"fas fa-table me-1\"></i>
                                        DataTable of Team's Point
                                    </div>
                                    <div class=\"card-body\">
                                    <table id=\"datatablesSimple\">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Year</th>
                                            <th>Point</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Year</th>
                                            <th>Point</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>";
                                    while ($rowTeam = mysqli_fetch_array($getTeamP)){
                                        echo"  
                                        <tr>
                                            <td>".$rowTeam['NamaTim']."</td>
                                            <td>".$rowTeam['tahun']."</td>
                                            <td>".$rowTeam['poinup']."</td>
                                        </tr>
                                        ";} echo"
                                    </tbody>
                                    </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </main>
                    <footer class=\"py-4 bg-light mt-auto\">
                        <div class=\"container-fluid px-4\">
                            <div class=\"d-flex align-items-center justify-content-between small\">
                                <div class=\"text-muted\">Copyright &copy; Your Website 2022</div>
                                <div>
                                    <a href=\"#\">Privacy Policy</a>
                                    &middot;
                                    <a href=\"#\">Terms &amp; Conditions</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
            <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js\" crossorigin=\"anonymous\"></script>
            <script src=\"../js/scripts.js\"></script>
            <script src=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js\" crossorigin=\"anonymous\"></script>
            <script src=\"../assets/demo/chart-area-demo.js\"></script>
            <script src=\"../assets/demo/chart-bar-demo.js\"></script>
            <script src=\"https://cdn.jsdelivr.net/npm/simple-datatables@latest\" crossorigin=\"anonymous\"></script>
            <script src=\"../js/datatables-simple-demo.js\"></script>
        </body>
    </html>    
";


}else{
    echo "<p> Halaman ini tidak tersedia untuk anda</p>";
}
?>