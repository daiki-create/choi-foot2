<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
    <link rel="stylesheet" href="../../css/540.css" media="screen and (max-width:540px)">
    <link rel="stylesheet" href="../../css/320.css" media="screen and (max-width:320px)">
</head>
<body>
<?php
include ('../../component/nav.php')
?>
<div class="main">
    <div class="left">
        <?php
        $search=htmlentities($_POST['search-txt']);
        $referer=$_SERVER['HTTP_REFERER'];
        if (strlen(trim($search))>100){
            $error="検索語数が多すぎます。";
            header("location: $referer?error=$error");
            exit();
        }
        echo "<h1>「 $search 」の検索結果</h1>";
        $stmt=$pdo->query("select * from coaches where name like '%$search%' or prefecture like '%$search%'");
        foreach ($stmt as $row){
            $id=$row['id'];
            $prefecture=$row['prefecture'];
            $fee=$row['fee'];
            $comment=$row['comment'];
            $prof=$row['prof'];
            echo "
            <div class='coach-card'>
                <a href='../coach/index.php?id=$id'>
                    <img class='coach-prof' src='../../img/$prof' alt=''>
                    <div class='prefecture'>$prefecture</div>
                    <div class='fee'>$fee 円/30分</div>
                </a>
                <div class='comment'>$comment</div>
            </div>
            ";

        }
        ?>
    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<div class="footer">
    <ul class="footer-box">
        <li class="footer-item"><a href="index.php">TOP</a></li>
        <li class="footer-item"><a href="message/index.php">チャット</a></li>
        <li class="footer-item"><a href="mypage/index.php">マイページ</a></li>
        <li class="footer-item"><a href="lesson/index.php">レッスン</a></li>
    </ul>
    <ul class="footer-box">
        <li class="footer-item"><a href="use/index.php">ご利用について</a></li>
        <li class="footer-item"><a href="recruit/index.php">コーチ募集</a></li>
        <li class="footer-item"><a href="contact/index.php">お問い合わせ</a></li>
    </ul>
</div>



</body>
</html>
