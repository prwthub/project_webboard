<?php
    session_start();
    
    $login = $_POST["login"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    // เข้ารหัส password
    $password = sha1($password);

    $sql = "SELECT * FROM user where login = '$login'";
    $result = $conn->query($sql);
    // ถ้ามีคนใช้แล้ว (user ซ้ำ)
    if($result->rowCount()==1){
        $_SESSION["add_login"] = "error";
    }
    // ถ้าไม่มี (ไม่ซ้ำ)
    else{
         // check อีกที ไม่แน่ใจ
         $sql1 = "INSERT INTO user(login,password,name,gender,email,role) 
         VALUES ('$login','$password','$name','$gender','$email','m')";
         $conn->exec($sql1);
         $_SESSION["add_login"] = "success";
    }
    $conn = null;
    header("location:register.php");
    die();
?>