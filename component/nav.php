


<div class="nav">
    <div class="top">
        <div class="hamburger">
            <span class="top-hamburger"></span>
            <span class="middle-hamburger"></span>
            <span class="bottom-hamburger"></span>
            <div class="menu-content">
                <ul>
                    <li class="menu-item"><a href="../../view/use/index.php">ご利用について</a></li>
                    <li class="menu-item"><a href="../../view/recruit/index.php">コーチ募集</a></li>
                    <li class="menu-item"><a href="../../view/contact/index.php">お問い合わせ</a></li>
                    <li class="menu-item"><a href="../../view/contact/index.php">利用規約</a></li>
                    <li class="menu-item"><a href="../../view/contact/index.php">プライバシーポリシー</a></li>
                    <li class="menu-item"><a href="../../view/retire/index.php">退会</a></li>
                </ul>
            </div>
        </div>
        <div class="title">ちょいふっと</div>
        <?php
        session_start();
        if ($_SESSION["flag"]===true){
            echo "<div class='login' ><a href='../login/logout.php'>ログアウト</a></div>";
        }else{
            echo "<div class='login'><a href='../login/index.php'>ログイン</a></div> ";
        }
        ?>
        <form class="search" action="../search/index.php" method="post">
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
        <li class="nav-item"><a href="../../view/index.php">TOP</a></li>
        <li class="nav-item"><a href="../../view/message/index.php">チャット</a></li>
        <li class="nav-item"><a href="../../view/mypage/index.php">マイページ</a></li>
        <li class="nav-item"><a href="../../view/lesson/index.php">レッスン</a></li>
    </ul>
</div>