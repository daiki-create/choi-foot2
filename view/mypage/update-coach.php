<?php


include "../../component/head.php";
session_start();
$me=$_SESSION['mail'];
$name=$_POST['name'];
$mail=$_POST['mail'];
$passwd=$_POST['passwd'];
$passwd2=$_POST['passwd2'];
$prefecture=$_POST['prefecture'];
$fee=$_POST['fee'];
$comment=$_POST['comment'];
$intro=$_POST['intro'];
$career=$_POST['career'];
$bank=$_POST['bank'];
$branch=$_POST['branch'];
$number=$_POST['number'];

$stmt=$pdo->prepare("update coaches set name=:name, mail=:mail, passwd=:passwd, prefecture=:prefecture, fee=:fee, comment=:comment, intro=:intro, career=:career, bank=:bank, branch=:branch, number=:number where mail=:me");
$params=array(
    ':name'=>$name,
    ':mail'=>$mail,
    ':passwd'=>$passwd,
    ':prefecture'=>$prefecture,
    ':fee'=>$fee,
    ':comment'=>$comment,
    ':intro'=>$intro,
    ':career'=>$career,
    ':bank'=>$bank,
    ':branch'=>$branch,
    ':number'=>$number,
    ':me'=>$me
);

$stmt->execute($params);
$stmt=$pdo->prepare("update students set mail=:mail, passwd=:passwd where mail=:me");
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
