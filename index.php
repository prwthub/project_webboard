<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webboard kakkak</title>
</head>
<!-------------------------------------------------------------------------------------------------------->
<?php
    // check ว่าทำการ log in มาแล้วหรือยัง
    // ถ้า ยังไม่ได้ log in หน้าเว็บต้องเหมือนเดิม
    if(!isset($_SESSION['id'])){

?>

<body>
    
    <h1><center>Webboard kakkak</center></h1>
    
    <hr>
    
    หมวดหมู่ : 
    <select name="subject">
        <option value="Math">คณิตศาสตร์</option>
        <option value="Science">วิทยาศาสตร์</option>
        <option value="English">ภาษาอังกฤษ</option>
    </select>
    <a href="login.php" style="float : right">เข้าสู่ระบบ</a>
    <br>


    <form action="post.php" method="get">
    <ul>
        <?php 
            for($i = 1; $i <= 10; $i++)
                echo " <li><a href=post.php?id="."$i".">กระทู้ที่ ".$i."</a></li>"
        ?>
    </ul>
    </form>
    
</body>

<!-------------------------------------------------------------------------------------------------------->
<?php
    // check ว่าทำการ log in มาแล้วหรือยัง
    // ถ้า log in  แล้ว ต้องมี ผู้ใช้ระบบ และ ปุ่ม log out
    }else{
?>
<body>

<h1><center>Webboard kakkak</center></h1>

<hr>

หมวดหมู่ : 
<select name="subject">
    <option value="Math">คณิตศาสตร์</option>
    <option value="Science">วิทยาศาสตร์</option>
    <option value="English">ภาษาอังกฤษ</option>
</select>

<div style="float : right">
    <?php
        $wel = $_SESSION['username'];
        echo "ผู้ใช้งานระบบ : $wel"; 
        //echo "ผู้ใช้งานระบบ : $_SESSION[username]";
    ?> &nbsp; &nbsp;
    <a href="logout.php">ออกจากระบบ</a>
</div>
<br>

<a href="newpost.php">สร้างกระทู้ใหม่</a>
<br>

<form action="post.php" method="get">
<ul>
    <?php 
        for($i = 1; $i <= 10; $i++){
            echo "<li>";
            echo "<a href=post.php?id="."$i".">กระทู้ที่ ".$i."</a>";
            if($_SESSION["role"] == "a"){
                echo "&nbsp; &nbsp; <a href=delete.php?id="."$i".">ลบ</a></li>";
            }
        }
    ?>
</ul>
</form>
    
</body>
<?php
        }
?>
<!-------------------------------------------------------------------------------------------------------->
</html>
