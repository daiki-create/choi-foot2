<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
</head>
<body>
<?php
include ('../../component/nav.php');
session_start();
$mail=$_SESSION['mail'];
?>
<div class="main">
    <div class="left">
        <div>
            <h1>お問い合わせ</h1>
            <p>わからないことなどがあればこちらのフォームよりご連絡ください。なお迷惑行為が認められた場合はご利用を停止させていただくことがごさいます。</p>
        </div>
        <form class="form" action="done.php" method="post">
            <?php
            echo ("<input type='hidden' name='mail' value='$mail'>");
            ?>
            <textarea class="contact-txt" name="" id="content" cols="30" rows="10"></textarea><br>
            <input class="form-btn" type="submit" value="送信">
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
