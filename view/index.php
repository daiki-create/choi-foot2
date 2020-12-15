<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../component/head.php');  ?>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/540.css" media="screen and (max-width:540px)">
    <link rel="stylesheet" href="../css/320.css" media="screen and (max-width:320px)">
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
                    <li class="menu-item"><a href="../view/terms/index.php">利用規約</a></li>
                    <li class="menu-item"><a href="../view/terms/privacy.php">個人情報保護方針</a></li>
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
    <ul class="nav-ul">
        <li class="nav-item"><a href="./">TOP</a></li>
        <li class="nav-item"><a href="message/index.php">チャット</a></li>
        <li class="nav-item"><a href="mypage/index.php">マイページ</a></li>
        <li class="nav-item"><a href="lesson/index.php">レッスン</a></li>
    </ul>
</div>
<div class="main">
    <div class="left">
        <?php
        echo htmlentities($_GET['error'])
        ?>
        <div class="all-favo" style="display: none">
            <div class="all" onclick="click_all_border()">すべて</div>
            <span class="all-border" id="all-border"></span>
            <div class="favo" onclick="click_favo_border()">お気に入り</div>
            <span class="favo-border" id="favo-border"></span>
        </div>
        <br>
        <br>
        <div class="pr_sp" >
            <a href="http://toyama.e-vida.jp/">
                <img src="../img/vida.jpg" alt="" style="max-width: 100%; object-fit: cover">
                <p style="color: lightblue">[PR]フットサルのことならVIDA富山!</p>
            </a>
        </div>
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
                    <div style='position: absolute;top:20px;left: 100px ;display: none'>
                        <div style='color: white'>♡</div>
                        <div style='color: lightgreen;display: none'>♥</div>
                     </div>
                    <div class='prefecture'>$prefecture</div>
                    <div class='fee'>$fee 円/30分</div>
                </a>
                <div class='comment'>$comment</div>
            </div>
            
           
            
        ";

            }

            ?>
        </div>
        <br><br>
        <div class="pr_sp" >
            <a href="https://t.afi-b.com/visit.php?guid=ON&a=Y7654s-j259751p&p=j790713o" rel="nofollow"><img src="https://www.afi-b.com/upload_image/7654-1455263468-3.jpg" width="336" height="280" style="border:none;" alt="全国菓子大博覧会受賞店のホワイトデー" /></a><img src="https://t.afi-b.com/lead/Y7654s/j790713o/j259751p" width="1" height="1" style="border:none;" />        </div>
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
        <p>[PR]</p>
        <p>フットサルのことならVIDA富山!</p>
        <a href="http://toyama.e-vida.jp/">
            <img src="../../img/vida.jpg" alt="" style="max-width: 100%; object-fit: cover">
        </a>
        <br>
        <p>好きならーめん見つかる↓</p>
        <a href="https://noodrepo.net">
            <img src="../../img/noodrepo.jpg" alt="" style="max-width: 100%;object-fit: cover">
        </a>
        <p>by「ぬどレポ」</p>
        <br>
        <a href="https://t.afi-b.com/visit.php?guid=ON&a=Y7654s-k257228b&p=x790622p" rel="nofollow"><img src="https://www.afi-b.com/upload_image/7654-1452130094-3.jpg" width="336" height="280" style="border:none;" alt="チョコレート専門店サロンドロワイヤルのバレンタイン" /></a><img src="https://t.afi-b.com/lead/Y7654s/x790622p/k257228b" width="1" height="1" style="border:none;" />
        <br>
        <p>みんなが密かに好きな商品を共有できるサイト（完全無料）</p>
        <a href="https://itutubo.com">
            <img src="../../img/itutubo.jpg" alt="" style="max-width: 100%;object-fit: cover">
        </a>

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
<div class="nav2">
    <ul>
        <li class="nav-item"><a href="../view/index.php">TOP</a></li>
        <li class="nav-item"><a href="../view/message/index.php">チャット</a></li>
        <li class="nav-item"><a href="../view/mypage/index.php">マイページ</a></li>
        <li class="nav-item"><a href="../view/lesson/index.php">レッスン</a></li>
    </ul>
</div>



</body>
</html>
