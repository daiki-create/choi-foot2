

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
        $content=$_POST['content'];
        $from=$_POST['mail'];
        $subject='ちょいふっと';
        $headers=$from;
        $to="6280ikiad@gmail.com";
        mb_send_mail($to,$subject,$content,$headers);
        ?>
        <h1>送信完了</h1>
        <p>お問い合わせを送信しました。返信にしばらくお時間をいただくことがございますがご了承ください。</p>
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