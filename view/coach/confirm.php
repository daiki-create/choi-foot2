



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');
    session_start();
    if ($_SESSION['student']!=true){
        $uli=$_SERVER['HTTP_REFERER'];
        $message='生徒アカウントでログイン後にご利用いただけます。';
        header("location:".$uli."&message=$message");
    }?>
    <link rel="stylesheet" href="../../css/layout.css">
    <link rel="stylesheet" href="../../css/540.css" media="screen and (max-width:540px)">
    <link rel="stylesheet" href="../../css/320.css" media="screen and (max-width:320px)">
</head>
<body>
<?php
include ('../../component/nav.php');
$date=$_POST['date'];
$time=$_POST['time'];
$util=$_POST['util'];
$locate=$_POST['locate'];
$fee=$_POST['fee'];
$content=$_POST['content'];
$mail=$_POST['mail'];
$total=$fee*$util/30;
?>
<div class="main">
    <div class="left">
        <p>以下の内容で確定してもよろしいですか？</p>
        <h1>希望日時</h1>
        <?php echo ("<div>$date $time</div>");?>
        <h1>利用時間</h1>
        <?php echo ("<div>$util 分</div>");?>
        <h1>レッスン料金</h1>
        <?php echo ("<div>$total 円</div>");?>
        <h1>教わりたい内容</h1>
        <?php echo ("<div>$content</div>");?>
        <form action='done.php' method="post">
            <?php
            echo ("<input type='hidden' value=$mail name='mail'>
                    <input type='hidden' value=$date name='date'>
                    <input type='hidden' value=$time name='time'>
                    <input type='hidden' value=$locate name='locate'>
                    <input type='hidden' value=$fee name='fee'>
                    <input type='hidden' value=$util name='util'>
                    <input type='hidden' value=$content name='content'>")
            ?>
            <input class="form-btn" type='submit' value='OK'>
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
