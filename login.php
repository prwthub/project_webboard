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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container">
    
        <h1><center>Webboard kakkak</center></h1>
        <?php include "nav.php" ?>
        <br>
        
        <div class="row">
            <div class="col-md-4"></div>
            
            <div class="col-md-4">
                <?php
                    // ถ้ามี session มาจะมีการแสดงผล
                    if(isset($_SESSION["error"])){
                        echo "<div class='alert alert-danger'><i class='bi bi-exclamation-circle-fill'></i>  ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง</div>";
                        // unset ไว้ เมื่อแจ้งเตือนเสร็จแล้ว ก็ลบ ไม่งั้นมันจะคาไว้
                        unset($_SESSION["error"]);
                    }
                ?>
                <div class="card text-dark bg-light">
                    <div class="card-header">เข้าสู่ระบบ</div>
                    <div class="card-body">
                        <form action="verify.php" method="POST">
                            <div class="form-group mb-2">
                                <label class="form-label">username</label>
                                <input type="text" name="login" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label">password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <center><button type="submit" class="btn btn-secondary btn-sm mt-3">Login</button></center>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4"></div>

            <center><div class="mt-3">ถ้ายังไม่ได้สมัคร <a href="register.php">กรุณาสมัครสมาชิก</a></div></center>
        </div>


    <!-- ของเก่า
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
    -->
    </div>

</body>
</html>