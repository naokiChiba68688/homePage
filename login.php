<?php
    ini_set('display_errors',"On");
    $user = $_POST['user'];
    $pass = $_POST['password'];
    if($pass == null){
        echo '<script>window.location.href = "/index.php";</script>';
    }
    $dsn = 'mysql:host=localhost;dbname=diary;charset=utf8';
    $db = new PDO($dsn,'naoki','password');
    $stmt = $db->query("select password from login where user = '$user'");
    $result = $stmt->fetch();
    $password = $result['password'].PHP_EOL;
    if($password == (int)$pass){
        echo '<script>window.location.href = "/admin.html";</script>';
    }else{
        echo '<script>window.location.href = "/login.html";</script>';
    }
?>