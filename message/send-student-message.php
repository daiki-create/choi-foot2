


<?php
include "../../component/head.php";
session_start();
$student=$_SESSION['mail'];
$coach=$_POST['mail'];
$content=$_POST['content'];
$student_name='';
$stmt=$pdo->query("select * from students where mail='$student'");
foreach ($stmt as $row){
    $student_name=$row['name'];
}
$stmt=$pdo->prepare("insert into messages (sender,receiver,content,sender_name) values (:sender,:receiver,:content,:sender_name)");
$params=array(
    ':sender'=>$student,
    ':receiver'=>$coach,
    ':content'=>$content,
    ':sender_name'=>$student_name,
);
$stmt->execute($params);

