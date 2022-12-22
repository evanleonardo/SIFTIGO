<?php
session_start();
include("../function/koneksi.php");
$emailmhs = $_SESSION['EmailMhs'];
$tahun = $_SESSION['tahun'];
$IdTim = $_SESSION['IdTim'];
$getTodo = mysqli_query($koneksi, "SELECT * FROM todo where tahun= '$tahun'");
$listeDesPoints='';
while($row = mysqli_fetch_array($getTodo)){
if($listeDesPoints!='') $listeDesPoints.=','; 
$listeDesPoints.='['.$row['Lat'].','.$row['Lng'].']';}
$getTeamP = mysqli_query($koneksi, "SELECT t.IdTim, t.NamaTim, t.tahun, SUM(u.poinup) as poinup FROM tim t natural join mhs m natural join uptodomhs u GROUP BY IdTim ORDER BY poinup DESC");
if (isset($_SESSION['EmailMhs'])){
    $username = $_SESSION['EmailMhs'];
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
            
	<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw&callback=initMap\"></script>
    <script type=\"text/javascript\">
         function initialize() {
            var optionsCarte = {
              center: new google.maps.LatLng(-7.784830194,110.373498506),
              zoom: 13,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById('googleMap'),
            optionsCarte);

            var liste_des_points=["; echo $listeDesPoints; echo"];

            var i=0,li=liste_des_points.length;
            while(i<li){
            new google.maps.Marker({
                   position: new google.maps.LatLng(liste_des_points[i][0], liste_des_points[i][1]),
                   map: map,
            });
            i++;
            }

          }          
// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
        </script> 
    </head>
        <body class=\"sb-nav-fixed\">
            <nav class=\"sb-topnav navbar navbar-expand navbar-dark bg-dark\">
                <!-- Navbar Brand-->
                <a class=\"navbar-brand ps-3\" href=\"\">FTIGO</a>
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
                                <a class=\"nav-link\" href=\"\">
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
                                <a class=\"nav-link\" href=\"logbook.php\">
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
                            </ol></br>
                            <p>"; $markers; echo"</p>
                            <h4><a style=\"color:black\" href=\"team.php\">Team</a></h4>
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
                                            <th>Point</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Point</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>";
                                    while ($rowTeam = mysqli_fetch_array($getTeamP)){
                                        echo"
                                        <tr>
                                            <td>".$rowTeam['NamaTim']."</td>
                                            <td>".$rowTeam['poinup']."</td>
                                        </tr>
                                    ";} echo"
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div id=\"googleMap\" style=\"width:100%;height:380px;\"></div>  
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