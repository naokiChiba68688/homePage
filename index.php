<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日記</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="header">
        <div class="menu">
            <div><a href="./profile.html"><button>プロフィール</button></a></div>
            <div><a href="./article.php"><button>記事</button></a></div>
            <div><a href="./login.html"><button>管理</button></a></div>
        </div>
    </div>
    <div class="content">
        <h1>日記</h1>
        <h3>記事一覧</h3>
        <?php
            ini_set('display_errors',"On");
            $dsn = 'mysql:host=localhost;dbname=diary;charset=utf8';
            $db = new PDO($dsn,'naoki','password');
            // if($db == true){
            //     echo '接続できました';
            // }
            $size = $db->query("select count(*) as size from article");
            $result = $size->fetch();
            $table_size = $result['size'].PHP_EOL;
            for($i = 0;$i < $table_size;$i++){
                $id = (int)$i + 1;
                $stmt = $db->query("select * from article where id = '$id'");
                $result = $stmt->fetch();
                $title = $result['title'].PHP_EOL;
                echo '<div><a href="article.php/#article_'.$id.'"><h1>'.$title.'</h1></a></div>';
            }
            
        ?>
    </div>
</body>
</html>