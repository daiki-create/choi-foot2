


<?php
include '../../component/head.php';
session_start();
$me=$_SESSION['mail'];
$student=htmlentities($_POST['mail']);

$stmt=$pdo->prepare("delete from lessons where student='$student' and coach='$me'");
$stmt->execute();

$stmt=$pdo->prepare("delete from messages where (sender='$me' and receiver='$student') or (sender='$student' and receiver='$me')");
$stmt->execute();

$stmt=$pdo->prepare("delete from message_posts where student='$student' and coach='$me'");
$stmt->execute();


