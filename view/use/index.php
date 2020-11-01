<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
</head>
<body>
<?php
include ('../../component/nav.php')
?>
<div class="main">
    <div class="left">
        <?php
        echo $_GET['error']
        ?>
        <div>
            <h1>レンタルコーチって？</h1>
            <p>レンタルコーチは最短で30分からコーチをレンタルして直接指導してもらえるサービスです。</p>
            <p>サッカーを始めてみたいけどチームに入るほどではない...<br>
            キックのフォームを改善したい。<br>
            1対1に付き合ってほしい、<br>
                戦術について語りたい、<br>
                フリースタイルのかっこいい足技を伝授してほしい、<br>などの様々な声に応えてくれるコーチを探してみましょう。</p>

            <h1>ご利用について</h1>
            <p>30分あたりの料金はコーチによって自由に決められています。<br>
            レッスン料のお支払方法はクレジットカードでレッスン終了後に引き落とされます。</p>
        </div>
        <form class="form" action="pin.php" method="post">
            <input class="form-item" type="email" placeholder="メールアドレス" name="mail"><br><br>
            <input class="form-btn" type="submit" value="生徒登録へ">
        </form>
    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<?php
include ('../../component/footer.php')
?>
</body>
</html>
