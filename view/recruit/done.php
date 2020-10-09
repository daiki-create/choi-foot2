


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
        $stmt=$pdo->prepare("insert into coaches (name,mail,passwd) values (:name,:mail,:passwd)");
        $params=array(
            ':name'=>$name,
            ':mail'=>$mail,
            ':passwd'=>$passwd
        );
        $stmt->execute($params);
        session_start();
        $_SESSION['mail']=$mail;
        $_SESSION['flag']=true;
        ?>
        <h1>コーチ登録完了</h1>
        <p>コーチ登録が完了しました。</p>

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
