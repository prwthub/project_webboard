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
    <h1><center>สมัคร Webboard kakkak</center></h1>
    
    <hr><br>

    
    <table style="border:2px solid black ; width:40%" align="center">
        
        <tr><td style="background-color:#6CD2FE; text-align : center" colspan="2"> 
            กรอกข้อมูล
        </td></tr>

        <tr><td>ชื่อบัญชี</td>         <td><input type="text" name="user" size="30"></td></tr>
        <tr><td>รหัสผ่าน</td>         <td><input type="text" name="pass" size="30"></td></tr>
        <tr><td>ชื่อ-นามสกุล</td>      <td><input type="text" name="name" size="30"></td></tr>
        
        <tr><td rowspan="3">เพศ</td> 
            <td><input type="radio" name="gender" value="m">
                ชาย</td></tr>
            <td><input type="radio" name="gender" value="f">
                หญิง</td></tr>
            <td><input type="radio" name="gender" value="o">
                อื่นๆ</td></tr>

        
        <tr><td>อีเมล</td>      <td><input type="text" name="mail" size="30"></td></tr>
        
        <tr><td colspan="2" align="center"><input type="submit" value="sign in" ></td></tr>

    </table><br>

    <center><div><a href="index.php">กลับไปหน้าหลัก</a></div></center>
    
</body>
</html>