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
    <!-- icon -->
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
        
        <!-- เดียวต้องโชว์ว่าทำการ regis สำเร็จหรือไม่ -->

        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6">
                <div class="card text-dark bg-light border-primary">
                    <div class="card-header bg-primary text-white"><i class="bi bi-box-arrow-in-right"></i>&nbsp;&nbsp;กรอกข้อมูล</div>
                    <div class="card-body">
                        <form action="register_save.php" method="POST">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label">username</label>
                                <div class="col-md-9">
                                    <input type="text" name="login" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label">password</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label">name-lastname</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label pt-0">gender</label>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <input type="radio" name="gender" value="m" class="form-check-input" required>
                                        <label class="form-check-label">male</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="gender" value="f" class="form-check-input" required>
                                        <label class="form-check-label">female</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="gender" value="o" class="form-check-input" required>
                                        <label class="form-check-label">other</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label">email</label>
                                <div class="col-md-9">
                                    <input type="text" name="email" class="form-control" required>
                                </div>
                            </div>

                            <center><button type="submit" class="btn btn-primary btn-sm mt-3"><i class="bi bi-save"></i>&nbsp;&nbsp;register</button></center>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3"></div>
        </div>
    
    </div>

        <!-- อันเก่า 

        <table style="border:2px solid black ; width:40%" align="center">
            
            <tr><td style="background-color:#6CD2FE; text-align : center" colspan="2"> 
                กรอกข้อมูล
            </td></tr>

            <tr><td>ชื่อบัญชี</td>         <td><input type="text" name="login" size="30"></td></tr>
            <tr><td>รหัสผ่าน</td>         <td><input type="text" name="password" size="30"></td></tr>
            <tr><td>ชื่อ-นามสกุล</td>      <td><input type="text" name="name" size="30"></td></tr>
            
            <tr><td rowspan="3">เพศ</td> 
                <td><input type="radio" name="gender" value="m">
                    ชาย</td></tr>
                <td><input type="radio" name="gender" value="f">
                    หญิง</td></tr>
                <td><input type="radio" name="gender" value="o">
                    อื่นๆ</td></tr>

            
            <tr><td>อีเมล</td>      <td><input type="text" name="email" size="30"></td></tr>
            
            <tr><td colspan="2" align="center"><input type="submit" value="sign in" ></td></tr>

        </table><br>

        <center><div><a href="index.php">กลับไปหน้าหลัก</a></div></center>
        -->
    
</body>
</html>