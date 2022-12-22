<!DOCTYPE html>
<html>

    <head>
        <title>SI FTIGO UKDW</title>
    </head>

    <style>
    body {
        background-color: white;
    }
    h1 {
        padding-top: 200px;
        color: black;
        text-align: center;
        font-size:300%;
        font-family: "Lucida Console", "Courier New", monospace;
    }
    h3 {
        padding-top: 0px;
        color: black;
        text-align: center;
        font-size:150%;
        font-family: "Lucida Console", "Courier New", monospace;
    }
    .btn {
        position: center;
        border: 2px solid black;
        background-color: white;
        color: black;
        padding: 14px 28px;
        font-size: 16px;
        cursor: pointer;
    }

    .center {
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    /* Green */
    .mhs {
        border-color: black;
        color: black;
    }

    .mhs:hover {
        background-color: gray;
        color: white;
    }

    /* Blue */
    .dsn {
        border-color: black;
        color: black;
    }

    .dsn:hover {
        background: gray;
        color: white;
    }
    </style>

    <body>
        <h1>SISTEM INFORMASI FTI GO UKDW</h1>
        <h3>Login</h3>
        <div class="center">
        <a href="loginmhs.php">
            <button class="btn mhs">MAHASISWA</button>
        </a>
        <a href="loginpgw.php">
            <button class="btn dsn">DOSEN</button>
        </a>
        </div>
    </body>
</html> 