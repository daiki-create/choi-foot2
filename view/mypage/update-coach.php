<?php


include ("../../component/head.php");
session_start();
$me=$_SESSION['mail'];
$name=htmlentities($_POST['name']);
$mail=htmlentities($_POST['mail']);
$passwd=htmlentities($_POST['passwd']);
$passwd2=htmlentities($_POST['passwd2']);
$prefecture=htmlentities($_POST['prefecture']);
$fee=htmlentities($_POST['fee']);
$comment=htmlentities($_POST['comment']);
$intro=htmlentities($_POST['intro']);
$career=htmlentities($_POST['career']);
$bank=htmlentities($_POST['bank']);
$branch=htmlentities($_POST['branch']);
$number=htmlentities($_POST['number']);
$locate=htmlentities($_POST['locate']);

if($passwd!=$passwd2) {
    $error = "確認パスワードが一致しません。";
    header("location:index.php?error=$error");
}
    $stmt=$pdo->prepare("update coaches set name=:name, mail=:mail, passwd=:passwd, prefecture=:prefecture, fee=:fee, comment=:comment, intro=:intro, career=:career, bank=:bank, branch=:branch, number=:number,locate=:locate where mail=:me");
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
    ':locate'=>$locate,
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
