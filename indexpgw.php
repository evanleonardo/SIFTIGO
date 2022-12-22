<!DOCTYPE html>
<head>
    <title>SI FTIGO UKDW</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/jpg" href="./image/logo.png">
    <style>
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 100%;
            margin: auto;}
    </style>
</head>

<style>
    #background1 {

        padding: 400px;
        background: url(./image/intro/INDEXFIX.png);
        background-repeat: no-repeat;
        margin-top: 0px;
        background-size: 1366px 800px;
    }


</style>

<body>
<div id="header">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #3D0B0B; border-color: #3D0B0B">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="https://www.ukdw.ac.id" target="ukdw">UNIVERSITAS KRISTEN DUTA WACANA</a></li>
                    </ul>
                    <?php
                    session_start();
                    if (isset($_SESSION['username'])){
                        $username = $_SESSION['username'];
                        echo " 
                    <div class=\"collapse navbar-collapse navbar-right navbar-ex1-collapse stuckMenu\">
                    <ul class=\"nav navbar-nav\">
                        <li class=\"menuItem dropdown\">
                            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">NIM ".$_SESSION['username']."<span class=\"caret\"></span></a>
                            <ul class=\"dropdown-menu\">


                                <li><a href=\"./function/cek_aksesmhs.php\">Perwalianq</a></li>
                                <li><a href=\"./function/logout.php\">Logout</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>";


                    }else{
                        echo'
                        <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse stuckMenu">
                            <ul class="nav navbar-nav">
                                <li class="menuItem dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Login<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                <li><a href="FormLoginMhs.php">Mahasiswa</a></li>
                                <li><a href="FormLogin.php">Pegawai</a></li>
                                </ul>
                                </li>
                            </ul>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="clearfix"></div>
<div id="background1" class="content-section-ss intro-header" style="border-top: 0">
</div>

</body>