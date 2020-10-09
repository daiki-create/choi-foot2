




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
        $error= $_GET['error'];
        echo $error;

        $mail=$_POST['mail'];
        if ($_GET['mail']!=null){
            $mail=$_GET['mail'];
        }

        $pin=$_POST['pin'];
        $input_pin=$_POST['input-pin'];
        if ($pin!=$input_pin){
            $error="PINが違います。";
            header("location: pin.php?error=$error&mail=$mail");
            exit();
        }
        ?>
        <br>
        <form class="form" action="confirm.php" method="post">
            <?php
            echo ("<input type='hidden' value='$mail' name='mail'>")
            ?>
            <h1>生徒アカウントを作成</h1>
            <input class="form-item" type="text" placeholder="ユーザー名" name="name"><br><br>
            <input class="form-item" type="password" placeholder="パスワード" name="passwd"><br><br>
            <input class="form-item" type="password" placeholder="パスワード(確認)" name="passwd2"><br><br>
            <input class="form-btn" type="submit" value="次へ">
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
