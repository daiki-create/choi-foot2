

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
        $mail=$_POST['mail'];
        $name=$_POST['name'];
        $passwd=$_POST['passwd'];
        $passwd2=$_POST['passwd2'];
        if ($passwd!=$passwd2){
            $error="パスワードが一致しません。";
            header("location: personal.php?error=$error&mail=$mail");
            exit();
        }
        if($name==null or $passwd==null){
            $error="未入力の欄があります。";
            header("location: personal.php?error=$error&mail=$mail");
            exit();
        }
        echo ("
            <div class='form'>
                <p>以下の内容でよろしいですか？<br>修正する場合は[戻る]を押してください。</p>
                <div class='confirm'>
                    <div>ユーザー名 : $name</div>
                    <div>パスワード : $passwd</div>
                </div>
                
            
                <form action='done.php' method='post'>
                    <input type='hidden' value='$mail' name='mail'>
                    <input type='hidden' value='$name' name='name'>
                    <input type='hidden' value='$passwd' name='passwd'><br>
                    <input class='form-btn' onclick='history.back()' type='button' value='< 戻る'>
                    <input class='form-btn' type='submit' value='確定 >'>
                </form>
            </div>
            ");
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
