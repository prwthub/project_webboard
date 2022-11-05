<?php
    session_start();
    if(isset($_SESSION["username"]) && $_SESSION["id"]==session_id()){
        header("Location:login.php");
        die();
    }
?>

        <?php
            
            isset($_POST['username']) ? $u = $_POST['username'] : $u = "";
            isset($_POST['password']) ? $p = $_POST['password'] : $p = "";
            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
            $sql = "SELECT * FROM user where login='$u' and password = sha1('$p') ";
            $result = $conn->query($sql);
            if($result->rowCount()==1){
                $data=$result->fetch(PDO::FETCH_ASSOC);
                $_SESSION["username"] = $data["login"];
                $_SESSION["role"] = $data["role"];
                $_SESSION["user_id"] = $data["id"];
                $_SESSION["id"] = session_id();
                header("Location: login.php");       
                die();
            }else{
                $_SESSION["error"] = 1;
                header("Location: login.php");       
                die();
            }
            $conn=null;
            
            /*
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
            */
        ?>

