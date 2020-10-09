


<?php
session_start();
$sender=$_SESSION['mail'];
$receiver=$_POST['coach'];
$content=$_POST['request'];

$stmt=$pdo->prepare("insert into messages (sender,receiver,content) values (:sender,:receiver,:content)");
$params=array(
    ':sender'=>$sender,
    ':receiver'=>$receiver,
    ':content'=>$content
);
$stmt->execute($params);

