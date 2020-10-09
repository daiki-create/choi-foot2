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
        <div>
            <h1>お問い合わせ</h1>
            <p>お問い合わせお問い合わせお問い合わせお問い合わせお問い合わせお問い合わせお問い合わせお問い合わせお問い合わせ</p>
        </div>
        <form class="form" action="done.php">
            <textarea class="contact-txt" name="" id="" cols="30" rows="10"></textarea><br>
            <input class="form-btn" type="button" value="送信">
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
