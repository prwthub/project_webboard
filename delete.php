<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        
        <?php
            // ถ้า ไม่ใช่ role a (admin) ให้กลับไป index
            if(!isset($_SESSION["role"]) == "a"){
                header("location:index.php");
            }
            else{
                $id_post = $_GET["id"];
                echo "<center>ลบกระทู้หมายเลข $id_post</center>" ;
                

                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                $sql_post = "DELETE FROM post WHERE id = $id_post";
                $query = $conn->query($sql_post);

                //DELETE FROM comment WHERE post_id = 9;
                $sql_comment = "DELETE FROM comment WHERE post_id = $id_post";
                $query = $conn->query($sql_comment);
                $conn = null;
                
            }
                
        ?>
    </div>
</body>
</html>