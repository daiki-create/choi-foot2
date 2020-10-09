



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
</head>
<body>
<?php
$date=$_POST['date'];
$time=$_POST['time'];
$util=$_POST['util'];
$content=$_POST['content'];
?>
<?php
include ('../../component/nav.php');
$mail=$_POST['mail'];
?>
<div class="main">
    <div class="left">
        <p>以下の内容で確定してもよろしいですか？</p>
        <h1>希望日時</h1>
        <?php echo ("<div>$date $time</div>");?>
        <h1>利用時間</h1>
        <?php echo ("<div>$util 分</div>");?>
        <h1>教わりたい内容</h1>
        <?php echo ("<div>$content</div>");?>
        <form action='done.php' method="post">
            <?php
            echo ("<input type='hidden' value=$mail name='mail'>")
            ?>
            <input type='submit' value='確認'>
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
