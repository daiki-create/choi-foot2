




<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
    <link rel="stylesheet" href="../../css/540.css" media="screen and (max-width:540px)">
    <link rel="stylesheet" href="../../css/320.css" media="screen and (max-width:320px)">
</head>
<body>
<?php
include ('../../component/nav.php')
?>
<div class="main">
    <div class="left">
        <?php
        $error= htmlentities($_GET['error']);
        echo $error;

        $mail=htmlentities($_POST['mail']);
        if ($_GET['mail']!=null){
            $mail=htmlentities($_GET['mail']);
        }

        else{
            $pin=htmlentities($_POST['pin']);
            $input_pin=htmlentities($_POST['input-pin']);
            if ($pin!=$input_pin){
                $error="PINが違います。再送します。";
                header("location: pin.php?error=$error&mail=$mail");
                exit();
            }
            if (strlen(trim($input_pin))!=5){
                $error="PINの長さが違います。";
                header("location: pin.php?error=$error&mail=$mail");
                exit();
            }
            if (!is_numeric($input_pin)){
                $error="PINは数字です。";
                header("location: pin.php?error=$error&mail=$mail");
                exit();
            }
        }
        ?>
        <br>
        <form class="form" action="confirm.php" method="post">
            <?php
            echo ("<input type='hidden' value='$mail' name='mail'>")
            ?>
            <h1>生徒アカウントを作成</h1>
            <input class="form-item" type="text" placeholder="ユーザー名" name="name" maxlength="20" minlength="1"><br><br>
            <input class="form-item" type="password" placeholder="パスワード" name="passwd" maxlength="20" minlength="4"><br><br>
            <input class="form-item" type="password" placeholder="パスワード(確認)" name="passwd2" maxlength="20" minlength="4"><br><br>
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
