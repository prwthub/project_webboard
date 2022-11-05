<?php
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $query = $conn->query("SELECT * FROM user");
    while($result = $query->fetch(PDO::FETCH_ASSOC)){
        echo $result['id']."<BR>";
        echo $result['login']."<BR>";
        echo $result['password']."<BR>";
        echo $result['name']."<BR>";
        echo $result['gender']."<BR>";
        echo $result['role']."<BR>";
        echo "<BR><BR>";
    }

?>