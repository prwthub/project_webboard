<?php
    session_start();
    if(isset($_SESSION["id"])){
        header("location:index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webboard kakkak</title>
</head>
<body>
    <h1><center>Webboard kakkak</center></h1>
    
    <hr><br>

    <form action="verify.php" method="post">
    
        <table style="border:2px solid black ; width:40%" align="center">
        
        <tr><td style="background-color:#6CD2FE; text-align : center" colspan="2"> 
            เข้าสู่ระบบ
        </td></tr>

        <tr><td>login</td>          <td><input type="text" name="user" size="40"></td></tr>
        <tr><td>password</td>       <td><input type="password" name="pass" size="40"></td></tr>
    
        <tr><td colspan="2" align="center"><input type="submit" value="Login" ></td></tr>

        </table><br>
    
    </form>
    
    <center><div>ถ้ายังไม่ได้สมัคร <a href="register.php">กรุณาสมัครสมาชิก</a></div></center>
    
</body>
</html>