<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post</title>
</head>
<body>
    
    <h1 align="center">Webboard kakkak</h1>
    <hr> <!-- ขีด -->
    <br> <!-- บรรทัดใหม่ -->

    <div align ="center">
        ต้องการดูกระทู้หมายเลย <?php echo $_GET["id"]; ?> <br>
        
        <?php
            $id = $_GET["id"];
            if($id % 2 == 0){
                echo "เป็นกระทู้หมายเลขคู่";
            }
            else{
                echo "เป็นกระทู้หมายเลขคี่";
            }
        ?>
        <br> <br>

        <table style="border:2px solid black ; width:40%" align="center">
        
        <tr><td style="background-color:#6CD2FE; text-align : center" > 
           แสดงความคิดเห็น
        </td></tr>

        <tr><td><textarea name="" id="" cols="40" rows="3"></textarea></td></tr>

        <tr><td align="center"><input type="submit" value="ส่งข้อความ" ></td></tr>

        </table>
    </div>

    <br>
    <div align="center"><a href="index.php"> กลับไปยังหน้าหลัก </a></div>

</body>
</html>