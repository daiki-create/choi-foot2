<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../component/head.php');  ?>
    <link rel="stylesheet" href="../css/layout.css">

</head>
<body>
<div class="nav">
    <div class="top">
        <div class="hamburger">
            <span class="top-hamburger"></span>
            <span class="middle-hamburger"></span>
            <span class="bottom-hamburger"></span>
            <div class="menu-content">
                <ul>
                    <li class="menu-item"><a href="../view/use/index.php">ご利用について</a></li>
                    <li class="menu-item"><a href="../view/recruit/index.php">コーチ募集</a></li>
                    <li class="menu-item"><a href="../view/contact/index.php">お問い合わせ</a></li>
                    <li class="menu-item"><a href="../view/contact/index.php">利用規約</a></li>
                    <li class="menu-item"><a href="../view/contact/index.php">プライバシーポリシー</a></li>
                    <li class="menu-item"><a href="../view/retire/index.php">退会</a></li>
                </ul>
            </div>
        </div>
        <div class="title">ちょいふっと</div>
        <?php
        session_start();
        if ($_SESSION["flag"]===true){
            echo "<div class='login' ><a href='login/logout.php'>ログアウト</a></div>";
        }else{
            echo "<div class='login'><a href='login/index.php'>ログイン</a></div> ";
        }
        ?>
        <form class="search" action="search/index.php" method="post">
            <input name="search-txt" class="search-txt" placeholder="search" type="text" id="search-txt">
            <button id="search-btn" class="search-btn" type="button" onclick="click_search_btn()"></button>
            <button id="search-btn2" style="display: none;" class="search-btn" type="submit"></button>
        </form>
        <script>
        var count=0;
            function click_search_btn(){
                document.getElementById('search-txt').style.cssText='display:block'
                document.getElementById('search-btn2').style.cssText='display:block'
                document.getElementById('search-btn').style.cssText='display:none'
            }
        </script>
    </div>
    <ul>
        <li class="nav-item"><a href="./">TOP</a></li>
        <li class="nav-item"><a href="message/index.php">チャット</a></li>
        <li class="nav-item"><a href="mypage/index.php">マイページ</a></li>
        <li class="nav-item"><a href="lesson/index.php">レッスン</a></li>
    </ul>
</div>
<div class="main">
    <div class="left">
        <div class="all-favo">
            <div class="all" onclick="click_all_border()">すべて</div>
            <span class="all-border" id="all-border"></span>
            <div class="favo" onclick="click_favo_border()">お気に入り</div>
            <span class="favo-border" id="favo-border"></span>
        </div>
        <br>
        <br>
        <?php
        echo $_GET['message'];;
        ?>
        <div id="all-page">
            <?php
            $stmt=$pdo->query('select * from coaches');
            foreach ($stmt as $row){
                $id=$row['id'];
                $prefecture=$row['prefecture'];
                $fee=$row['fee'];
                $comment=$row['comment'];
                $prof=$row['prof'];
                echo "
            <div class='coach-card'>
                <a href='coach/index.php?id=$id'>
                    <img class='coach-prof' src='../img/$prof' alt=''>
                    <div class='prefecture'>$prefecture</div>
                    <div class='fee'>$fee 円/30分</div>
                </a>
                <div class='comment'>$comment</div>
            </div>
            
           
            
        ";

            }

            ?>
        </div>
        <div id="favo-page">
            favo
        </div>
        <script>
            function click_all_border(){
                document.getElementById('all-border').style.cssText='display:block'
                document.getElementById('favo-border').style.cssText='display:none'
                document.getElementById('all-page').style.cssText='display:block'
                document.getElementById('favo-page').style.cssText='display:none'
            }
            function click_favo_border(){
                document.getElementById('all-border').style.cssText='display:none'
                document.getElementById('favo-border').style.cssText='display:block'
                document.getElementById('all-page').style.cssText='display:none'
                document.getElementById('favo-page').style.cssText='display:block'
            }

        </script>
    </div>
    <div class="right">
        <?php include('../component/pr.php');  ?>
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
