


<?php
include '../../component/head.php';
session_start();
$me=$_SESSION['mail'];
$stmt=$pdo->prepare("delete from coaches where mail='$me'");
$stmt->execute();
$stmt=$pdo->prepare("delete from students where mail='$me'");
$stmt->execute();
session_destroy();
$message="退会処理が完了しました。";
header("location:../index.php?message=$message");