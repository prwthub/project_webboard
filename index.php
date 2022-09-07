<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webboard kakkak(lab02)</title>
</head>
<body>
    <h1><center>Webboard kakkak02(lab02)</center></h1>
    
    <hr>
    
    หมวดหมู่ : 
    <select name="subject">
        <option value="Math">คณิตศาสตร์</option>
        <option value="Science">วิทยาศาสตร์</option>
        <option value="English">ภาษาอังกฤษ</option>
    </select>

    <a href="login.html" style="float : right">เข้าสู่ระบบ</a>
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
</html>
