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
            <p>サッカーの指導経験がなくとも「キックの基礎なら教えられる」、<br>「ディフェンダー経験があるので1対1のDFだけなら付き合ってあげられる」、<br>「戦術に詳しいので一緒にサッカー、フットサルについて語ってあげられる」、<br>
                「フリースタイルが好きでかっこいい足技を伝授できる」<br>
            など何か一つでも自分の武器があれば喜んでくれる生徒さんは見つかるはずです。</p>
            <h1>ご利用について</h1>
            <p>30分あたりの料金はコーチによって自由に決められます。<br>
                給与につきましてはコーチアカウント作成後にマイページから給与受け取り用の口座を設定してください。</p>
        </div>
        <form class="form" method="post" action="pin.php">
            <input class="form-item" type="email" placeholder="メールアドレス" name="mail"><br><br>
            <input class="form-btn" type="submit" value="コーチ登録へ">
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
