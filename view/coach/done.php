



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
</head>
<body>
<?php
session_start();
include ('../../component/nav.php');
$mail=$_POST['mail'];
$stmt=$pdo->prepare("insert into messages (sender,receiver,content) values (:sender,:receiver,:content)");
$params=array(
        ':sender'=>$mail,
        ':receiver'=>$_SESSION['mail'],
        ':content'=>'仮予約を受け付けました。'
);
$stmt->execute($params);

?>
<div class="main">
    <div class="left">
        <h1>仮予約完了</h1>
        <p>**まだ予約は完了していません。**<br><br>
            コーチに申し込みメッセージを送信しました。<br>
            チャットよりコーチから返信が届きますので今しばらくお待ちください。<br>
            返信には数日かかることがございます。</p>
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
