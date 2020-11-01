<?php


include "../../component/head.php";
session_start();
$me=$_SESSION['mail'];
$name=$_POST['name'];
$mail=$_POST['mail'];
$passwd=$_POST['passwd'];
$passwd2=$_POST['passwd2'];

$stmt=$pdo->prepare("update students set name=:name, mail=:mail, passwd=:passwd where mail=:me");
$params=array(
    ':name'=>$name,
    ':mail'=>$mail,
    ':passwd'=>$passwd,
    ':me'=>$me
);
$stmt->execute($params);


$stmt->execute($params);
$stmt=$pdo->prepare("update coaches set mail=:mail, passwd=:passwd where mail=:me");
$params=array(
    ':mail'=>$mail,
    ':passwd'=>$passwd,
    ':me'=>$me
);
$stmt->execute($params);

$_SESSION['mail']=$mail;
$message='プロフィールを更新しました。';
header("location:index.php?message=$message");
exit();
