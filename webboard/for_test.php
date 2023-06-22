<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!----------------------------------------------------------------------------------------------------->   
    <!-- ปอปอัพ แจ้งเตือน -->
    <script>
        function myFunction1(){
            let r = confirm("ต้องการลบหรือไม่");
            return r;
        }

    </script>
    <!-----------------------------------------------------------------------------------------------------> 
    <!-- รับค่าจาก A และ เอาไปบวกแล้วแสดงผลใน B -->
    <script>
        function func1(){
            let result = 0;
            let a = parseInt(document.getElementById("a").value);
            for(let i=0; i<=a; i++){
                reseult += i;
            }
            document.getElementById("b").value = result;
        }
    </script>

    <!-- ส่วนนอกสคริป -->
    A = <inoput type="text" id="a"><br>
    B = <inoput type="text" id="b" readonly><br>
    <button onclick="func1();">กดปุ่มเพื่อคำนวน</button>
    <!----------------------------------------------------------------------------------------------------->   
    <!-- ลูกตาเปิดปิดพาสเวิร์ด -->
    <script>
        function password_show_hide(){
            let x = document.getElementById("pwd");
            let show_eye = document.getElementById("show_eye");
            let hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            // check data check type better than ==
            // password -> text
            if(x.type === "password"){
                x.type = "text";
                show_eye.style.display="none";
                hide_eye.style.display="block";
            }
            // text -> password
            else{
                x.type = "password";
                show_eye.style.display="block";
                hide_eye.style.display="none";
            }
        }
    </script>
    <!----------------------------------------------------------------------------------------------------->   
</head>
<body>
<!-----------------------------------------------------------------------------------------------------> 
<!-- โชว์ข้อมูลในดาต้าเบสแบบดรอปดาว -->   
<ul class="dropdown-menu" aria-labelledby="button2">
    <?php
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
        $sql = "SELECT * FROM category";
        foreach($conn->query($sql) as $row){
            echo "<li><a href='#' class='dropdown-item' value=".$row['id'].">".$row['name']."</a></li>";
        }
        $conn = null;
    ?>
</ul> 
<!----------------------------------------------------------------------------------------------------->
<!-- ปริ้นข้อมูลในดาต้าแบสแบบตาราง -->
<table class="table table-striped">
    <?php
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
        $conn -> exec("SET CHARACTER SET utf8");
        $data = $conn->query("SELECT p.id,p.title,p.content,p.post_date ,c.name,u.name FROM post p , user u , category c WHERE p.cat_id = c.id AND p.user_id = u.id order by p.id DESC;");
        if($data !== false){
            while($row = $data->fetch()){
            // echo "<tr><td><a href=\"post.php?id=".$row['0'].'\" style=text-decoration:none></a>"; 
            echo "<tr><td>";
            echo "[ ".$row['4']." ] ";   
            echo "<a href=\"post.php?id=".$row['0']."\" style=text-decoration:none>";            
            echo $row['1']."</a>";
            echo "<br>";
            echo $row['5']." - " . $row['3'];
            if($_SESSION["role"] == "a"){
                echo "</td><td><a href=\"delete.php?id=".$row['0']."\" class=\"btn btn-danger bi bi-trash\" onclick='return myFunction1();'></a>";
                
            }
            echo "</td></tr>"; 
            }
        }
        $conn = null;
    ?>
</table>
<!----------------------------------------------------------------------------------------------------->
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
</div>
<!----------------------------------------------------------------------------------------------------->
<!-- หัวข้อกระทู้ -->
<div class="card text-dark bg-white border-primary">
    <div class="card-header bg-primary text-white" >
        <?php
            $id = $_GET["id"];
            
            $conn = new PDO("mysql:host=localhost; dbname=webboard; charset=utf8" , "root" , "");
            
            $sql = "SELECT * FROM post where id=$id";
            $query = $conn->query($sql);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            
            $title = $result["title"];
            $content = $result["content"];
            $post_date = $result["post_date"];
            
            echo "<span style='float:right'>(id กระทู้หมายเลข $id)</span>";
            echo $title;
        ?>
    </div>
    <div class ="card-body"> 
        <?php
            //SELECT u.login FROM user u,post p WHERE u.id = p.user_id ;
            $sql = "SELECT u.login FROM user u,post p WHERE u.id = p.user_id and p.id = $id";
            $query = $conn->query($sql);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $username = $result["login"]; 

            echo "$content <BR><BR><BR>";
            echo "$username - $post_date <BR>";
            $conn = null;
        ?>
    </div>
</div>
<!----------------------------------------------------------------------------------------------------->
<!-- เพิ่มกระทู้ใหม่ในดาต้าเบส-->
<?php
    session_start();
    $cid = $_POST['category'];
    $uid = $_SESSION["user_id"];
    $title = $_POST["topic"];
    $content = $_POST["comment"];


    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
  
    $sql = "INSERT INTO post (title,content,post_date,cat_id,user_id) VALUES ('$title','$content',NOW(),'$cid', '$uid')";

    $conn -> exec($sql);
    $_SESSION['add_post'] = 'success';
    
    $conn = null;
    header("Location: newpost.php");       
    die();
?>
<!----------------------------------------------------------------------------------------------------->
<?php
    session_start();
    if(!isset($_SESSION["id"])){
        header("location:index.php");
        die();
    }
?>
<!----------------------------------------------------------------------------------------------------->
<!-- สร้างกระทู้ใหม่ -->
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
                            <!-- โชว์หมวดหมู่ที่เก็บในดาต้าเบส -->
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
<!----------------------------------------------------------------------------------------------------->
<!-- เพิ่มข้อมูล -->
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


<!-- แจ้งเตือนว่าเพิ่มสำเร็จมั้ย -->
<?php
    if(isset($_SESSION["add_login"])){
        if(($_SESSION["add_login"]) == "error"){
            echo "<div class='alert alert-danger'><i class='bi bi-exclamation-circle-fill'></i>  ชื่อบัญชีมีการใช้งานแล้ว</div>";
        }else{
            echo "<div class='alert alert-success'><i class='bi bi-check-circle-fill'></i>  สมัครสมาชิกสำเร็จแล้ว</div>";
        }
    }
    unset($_SESSION["add_login"]);
?>

<!----------------------------------------------------------------------------------------------------->
<!-- verify -->
<?php
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
?>
<!----------------------------------------------------------------------------------------------------->
</body>
</html>