<?php


include ("../../component/head.php");
session_start();
$me=$_SESSION['mail'];
$name=htmlentities($_POST['name']);
$mail=htmlentities($_POST['mail']);
$passwd=htmlentities($_POST['passwd']);
$passwd2=htmlentities($_POST['passwd2']);


if($passwd!=$passwd2){
    $error="確認パスワードが一致しません。";
    header("location:index.php?error=$error");
    exit();
}

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
