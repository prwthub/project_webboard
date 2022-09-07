<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verify</title>
</head>
<body>
    
    <h1 align="center">Webboard kakkak02(lab02)</h1>
    <hr> <!-- ขีด -->
    <br> <!-- บรรทัดใหม่ -->

    <div align = "center">
        <?php
            $user = $_POST["user"];
            $pass = $_POST["pass"];

            if($user == "admin" && $pass == "ad1234"){
                echo "ยินดีต้อนรับ ADMIN";
            }
            elseif($user == "member" && $pass == "mem1234"){
                echo "ยินดีต้อนรับ MEMBER";
            }
            else{
                echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง";
            }

        ?>
        <br>
        <a href="index.php">กลับสู่หน้าหลัก</a>
    </div>

</body>
</html>