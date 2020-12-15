



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');
    session_start();
    if ($_SESSION['student']!=true){
        $uli=$_SERVER['HTTP_REFERER'];
        $message='生徒アカウントでログイン後にご利用いただけます。';
        header("location:".$uli."&message=$message");
    }
    ?>
    <link rel="stylesheet" href="../../css/layout.css">
    <link rel="stylesheet" href="../../css/540.css" media="screen and (max-width:540px)">
    <link rel="stylesheet" href="../../css/320.css" media="screen and (max-width:320px)">
</head>
<body>
<?php
include ('../../component/nav.php');
$mail=$_GET['mail'];
?>
<div class="main">
    <div class="left">
        <?php
        $day=$_GET['day'];
        $time=$_GET['time'];
        $locate=$_GET['locate'];
        $fee=$_GET['fee'];

        echo "
           <form action=\"confirm.php\" method=\"post\">
            <h1>希望日時</h1>
                <p>$day $time ～</p>
            <h1>利用時間</h1>
            <select name=\"util\" id=\"\">
                <option value=\"30\">30分</option>
                <option value=\"60\">60分</option>
                <option value=\"90\">90分</option>
                <option value=\"120\">120分</option>
                <option value=\"150\">150分</option>
                <option value=\"180\">180分</option>
                <option value=\"210\">210分</option>
                <option value=\"240\">240分</option>
            </select>
            <h1>教わりたい内容</h1>
            <textarea class='form-area' name=\"content\" id=\"\" cols=\"30\" rows=\"10\"></textarea>
            
            <input type=\"hidden\" name=\"date\" value=$day>
            <input type=\"hidden\" name=\"time\" value='$time'>
            <input type=\"hidden\" name=\"locate\" value='$locate'>
            <input type=\"hidden\" name=\"fee\" value='$fee'>
            <input type='hidden' value=$mail name='mail'>
            <input class='form-btn' type=\"submit\" value=\"確認画面へ\">
        </form> 
        "
        ?>

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
