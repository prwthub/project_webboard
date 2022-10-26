<?php
    session_start();
    if(isset($_SESSION["id"])){
        header("location:index.php");
        die();
    }
?>

        <?php
            // ในหน้านี้จะไม่มีการแสดงผลอีก จะเป็นแค่ไฟล์ที่ตรวจสอบตอน log in เท่านั้น
            $login = $_POST["login"];
            $password = $_POST["password"];

            if($login == "admin" && $password == "ad1234"){
                //echo "ยินดีต้อนรับ ADMIN";
                $_SESSION['username'] = "admin";
                $_SESSION['role'] = "a";
                $_SESSION['id'] = "session_id()";
                header("location:index.php");
                die();
            }
            elseif($login == "member" && $password == "mem1234"){
                //echo "ยินดีต้อนรับ MEMBER";
                $_SESSION['username'] = "member";
                $_SESSION['role'] = "m";
                $_SESSION['id'] = "session_id()";
                header("location:index.php");
                die();
            }
            else{
                //echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง";
                $_SESSION['error'] = "error";
                header("location:login.php");
                die();
            }

        ?>
