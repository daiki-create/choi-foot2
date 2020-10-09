



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
</head>
<body>
<?php
include ('../../component/nav.php');
$mail=$_POST['mail'];
?>
<div class="main">
    <div class="left">
        <form action="confirm.php" method="post">
            <h1>希望日時</h1>
            <input type="date" name="date">
            <input type="time" name="time">
            <h1>利用時間</h1>
            <select name="util" id="">
                <option value="30">30分</option>
                <option value="60">60分</option>
                <option value="90">90分</option>
                <option value="120">120分</option>
                <option value="150">150分</option>
                <option value="180">180分</option>
                <option value="210">210分</option>
                <option value="240">240分</option>
            </select>
            <h1>教わりたい内容</h1>
            <textarea name="content" id="" cols="30" rows="10"></textarea>
            <?php
            echo ("<input type='hidden' value=$mail name='mail'>")
            ?>
            <input type="submit" value="確認画面へ">
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
