

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
        $error=htmlentities($_GET['error']);
        echo $error;


        $pin=rand(10000,99999);
        $mail=htmlentities($_POST['mail']);
        if ($_GET['mail']!=null){
            $mail=$_GET['mail'];
        }
        if ($mail==null){
            $error="メールアドレスが未入力です。";
            header("location: index.php?error=$error");
            exit();
        }
        if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$mail)){
            $error="メールアドレスの形式が正しくありません。";
            header("location: index.php?error=$error");
            exit();
        }
        $subject='ちょいふっと';
        $content="PIN: $pin";
        $headers='';
        mb_send_mail($mail,$subject,$content,$headers);

        ?>
        <form class="form" action="personal.php" method="post">
            <p>入力したメールアドレス宛にPINを送信しました。</p>
            <?php
            echo ("<input type='hidden' value='$pin' name='pin'>
            <input type='hidden' value='$mail' name='mail'>")
            ?>
            <input class="form-item" type="text" name="input-pin" placeholder="PIN" pattern="^\d{5}"><br><br>
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




