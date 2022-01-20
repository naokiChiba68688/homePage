<?php
    $title = $_POST['title'];
    $body = $_POST['body'];
    $dsn = 'mysql:host=localhost;dbname=diary;charset=utf8';
    $db = new PDO($dsn,'naoki','password');
    $size = $db->query("select count(*) as size from article");
    $result = $size->fetch();
    $table_size = $result['size'].PHP_EOL;
    $table_size = (int)$table_size + 1;
    //echo $table_size;
    $table_size = (string)$table_size;
    $stmt = $db->query("insert into article (id,title,body) values($table_size,'$title','$body')");
    $stmt->execute();
    echo '投稿完了しました';
?>
<a href="../admin.html"><p>続けて投稿する</p></a>
<a href="../index.php"><p>トップに戻る</p></a>