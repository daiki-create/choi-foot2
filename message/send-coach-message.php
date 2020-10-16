


<?php
include "../../component/head.php";
session_start();
$coach=$_SESSION['mail'];
$student=$_POST['mail'];
$content=$_POST['content'];
$coach_name='';
$stmt=$pdo->query("select * from coaches where mail='$coach'");
foreach ($stmt as $row){
    $coach_name=$row['name'];
}
$stmt=$pdo->prepare("insert into messages (sender,receiver,content,sender_name) values (:sender,:receiver,:content,:sender_name)");
$params=array(
    ':sender'=>$coach,
    ':receiver'=>$student,
    ':content'=>$content,
    ':sender_name'=>$coach_name,
);
$stmt->execute($params);

