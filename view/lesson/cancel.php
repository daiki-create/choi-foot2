


<?php
include '../../component/head.php';
session_start();
$me=$_SESSION['mail'];
$coach=$_POST['mail'];

$stmt=$pdo->prepare("delete from lessons where coach='$coach' and student='$me'");
$stmt->execute();

$stmt=$pdo->prepare("delete from messages where (sender='$coach' and receiver='$me') or (sender='$me' and receiver='$coach')");
$stmt->execute();

$stmt=$pdo->prepare("delete from message_posts where student='$me' and coach='$coach'");
$stmt->execute();


