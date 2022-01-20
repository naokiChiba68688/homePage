<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日記</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <style>
        body{
            margin:0;
        }
        h1{
            font-size:25px;
        }
        .header{
            max-width: 100%;
            background-color: black;
            padding: 0 160px;
        }
        .menu{
            display: flex;
            width: 100%;
        }
        .menu button{
            margin: 20px;
            background-color: black;
            color: #ffff;
            border: none;
            outline: none;
            cursor: pointer;
        }
        .content{
            padding: 20px;
        }
        .article_block{
            border-top:1px dashed black;
            border-bottom:1px dashed black;
            width:50%;
            margin:50px 0;
            padding:20px;
        }
    </style>
    <div class="header">
        <div class="menu">
            <div><a href="../index.php"><button>TOP</button></a></div>
            <div><a href="../profile.html"><button>プロフィール</button></a></div>
            <div><a href="../article.php"><button>記事</button></a></div>
            <div><a href="../login.html"><button>管理</button></a></div>
        </div>
    </div>
    <div class="content">
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
                echo '<div class="article_block" id="article_'.$id.'">';
                echo '<h1>'.$title.'</h1>';
                $body = $result['body'].PHP_EOL;
                echo '<p>'.$body.'</p>';
                echo '</div>';
            }
        ?>
    </div>
</body>