


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
        $mail=htmlentities($_POST['mail']);
        $name=htmlentities($_POST['name']);
        $passwd=htmlentities($_POST['passwd']);
        $stmt=$pdo->prepare("insert into students (name,mail,passwd) values (:name,:mail,:passwd)");
        $params=array(
            ':name'=>$name,
            ':mail'=>$mail,
            ':passwd'=>$passwd
        );
        $stmt->execute($params);
        session_destroy();
        ?>
        <h1>生徒登録完了</h1>
        <p>生徒登録が完了しました。</p>
        <a href="../login/index.php">ログイン</a>
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
