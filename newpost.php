<?php
    session_start();
    if(!isset($_SESSION["id"])){
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
        
        <h1><center>Webboard</center></h1>
        <?php include "nav.php" ?>
        <br>

        <div class="row">
            <div class="col-md-3"></div>
            
            <div class="col-md-6">
                <div class="card text-dark bg-white border-info" >
                    <div class="card-header bg-info text-white">ตั้งกระทู้ใหม่</div>
                    <div class="card-body">
                        <form action="newpost_save.php" method="post">
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">หมวดหมู่ :</label>
                                <div class="col-lg-9">
                                    <select name="category" class="form-select">
                                    <!--
                                        <option value="general">เรื่องทั่วไป</option>
                                        <option value="study">เรื่องเรียน</option>
                                    -->
                                        <?php
                                            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                                            $sql = "SELECT * FROM category";
                                            foreach($conn->query($sql) as $row){
                                                echo "<option value=".$row['id'].">".$row['name']."</option>";
                                            }
                                            $conn = null;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">หัวข้อ</label>
                                <div class="col-lg-9">
                                    <input type="text" name="topic" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">เนื้อหา</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" name="comment" rows="8" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <center>
                                        <button type="submit" class="btn btn-info btn-sm text-white">
                                            <i class="bi bi-caret-right-square me-1"></i>บันทึกข้อความ
                                        </button>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3"></div>
            
        </div>

    </div>

    <!--
    <table>
        <form action="index.php" method="POST"></form>    
        <tr> <td> หมวดหมู่ : </td>
        <td> <select name="subject">
            <option value="Math">คณิตศาสตร์</option>
            <option value="Science">วิทยาศาสตร์</option>
            <option value="English">ภาษาอังกฤษ</option>
        </select></td> </tr>   
        
        <tr><td> หัวข้อ : </td>   <td><textarea name="" id="" cols="40" rows="1"></textarea> </td></tr>
        
        <tr><td> เนื้อหา : </td>  <td><textarea name="" id="" cols="40" rows="3"></textarea> </td></tr>
        
        <tr><td>         </td>  <td><input type="submit" value="บันทึกข้อความ" >             </td></tr>

        </form>
    </table>
    -->
</body>
</html>