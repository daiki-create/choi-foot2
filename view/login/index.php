



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
</head>
<body>
<?php
include ('../../component/nav.php');
?>
<div class="main">
    <div class="left">
        <?php
        echo $_GET['error'];
        ?>
        <br>
        <form class="form" action="check_pass.php" method="post">
            <input class="form-item" type="email" name="mail" placeholder="メールアドレス"><br><br>
            <input class="form-item" type="password" name="passwd" placeholder="パスワード"><br><br>
            <input class="form-btn" type="submit" value="ログイン">
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

