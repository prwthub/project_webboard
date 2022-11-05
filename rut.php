<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=css_all.css>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!--Icon-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  
    <title>post</title>
</head>
<body>
<h1 style="text-align: center;">Web App_Nirut_mini</h1>
    <hr>
    <div align="center">
        <h2> ต้องการดูกระทู้หมายเลข <?php echo $_GET["id"]."<br>";?>
        <?php echo (($_GET["id"]%2)==0) ?  "เป็นกระทู้หมายเลขคู่": "เป็นกระทู้หมายเลขคี่"; ?>
        </h2><br>
        <div class="container">
        <?php
            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
            $sql_head = "SELECT post.id , post.title,post.content, user.name ,post.post_date FROM post
                INNER JOIN category ON category.id=post.cat_id
                INNER JOIN user ON user.id=post.user_id
                WHERE post.id=$_GET[id]
                ORDER BY post.post_date;";
            $sql_commentPost = "SELECT comment.content,user.name,comment.post_date FROM comment
            INNER JOIN user ON user.id=comment.user_id
            WHERE comment.post_id=$_GET[id]
            ORDER BY comment.post_date;";
            $result = $conn->query($sql_head);    
            $data=$result->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="card text-dark bg-white border-info mb-4 text-start">
                <div class="card-header bg-primary text-white "><?php echo $data["title"];?></div>
                <div class="card-body">
                    <?php echo $data["content"];?> 
                    <br><br>
                    <?php echo $data["name"]." - ".$data["post_date"];?> 
                </div>
        </div>
        <?php 
            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
            $i=0;
            foreach($conn->query($sql_commentPost) as $row){
                $i++;?>
                <div class="card text-dark bg-white border-info mb-4 text-start">
                    <div class="card-header bg-info text-white "><?php echo "ความคิดเห็นที่ ".$i;?></div>
                    <div class="card-body">
                        <?php echo $row["content"];?> 
                        <br><br>
                        <?php echo $row["name"]." - ".$row["post_date"];?> 
                    </div>
                </div>
        <?php
            }
            $conn = null;
        ?>
       
        <div class="card text-dark bg-white border-success">
                <div class="card-header bg-success text-white text-start">แสดงความคิดเห็น</div>
                <div class="card-body">
                    <form action="post_save.php" method="post">
                    <input type="hidden" name="post_id" value="<?= $_GET['id']; ?>">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-lg-10">
                            <textarea name="comment" class="from-control w-100" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                                <button type="submit" class="btn btn-success text-white btn-sm">
                                <i class="bi bi-box-arrow-up-right me-1"></i>ส่งข้อความ</button>
                            </center>
                        </div>
                    </div>    
                        
                    </form>
                </div>
            </div>
            </div>
        <!--<table>
            <tr><th class="head_table">แสดงความคิดเห็น</th></tr>
            <tr><td  style="text-align: center;"><textarea name="message" rows="5" cols="100%" placeholder="เชิญระบาย"></textarea></td></tr>
            <tr><td style="text-align: center;"><input type="submit" value="ส่งข้อความ"></td></tr>
        </table>-->
        <a href="index.php" rel="noopener noreferrer">กลับไปหน้าหลัก</a>
    </div>
</body>
</html>