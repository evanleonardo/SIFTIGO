<?php
include_once('function/loginpgw.php'); // Memasuk-kan skrip Login

?>
<!DOCTYPE html>

<html>
<head>
    <title>SI FTIGO UKDW</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    .container {
        padding: 16px;
    }

    input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    form {
        width:500px;
        border: 3px solid #f1f1f1;
    }

    .formpos{
        margin: 0;
        position: absolute;
        top: 55%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
</style>



<body>
    <h1>SISTEM INFORMASI FTI GO UKDW</h1>
    <h3>Login</h3>
    <div>
    <form action="" method="POST" class="formpos">
    <div class="container">
        <label for="uname"><b>Email</b></label>
        <input type="text" id="EmailPgw" name="EmailPgw" placeholder="Enter Email @UKDW.AC.ID" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" name="PassPgw" id="PassPgw" placeholder="Enter Password" required>

        <button type="submit" name="submit" id="submit" value="Login">Login</button>
    </div>
</form>
    </div>
</div><br/><br/><br/><br/><br/><br/>

</body>

</html>