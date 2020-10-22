


<?php
include('../../component/head.php');

$mail=$_POST['mail'];
$passwd=$_POST['passwd'];
$stmt=$pdo->query("select * from coaches where mail='$mail'");
foreach ($stmt as $row){
    $correct_passwd=$row['passwd'];
}
$stmt=$pdo->query("select * from students where mail='$mail'");
foreach ($stmt as $row){
    $correct_passwd=$row['passwd'];
}
if ($passwd==$correct_passwd){
    session_start();
    $_SESSION['mail']=$mail;
    $_SESSION['flag']=true;
    header("location: ../index.php");
    exit();
}
else{
    $error='メールアドレスかパスワードが違います。';
    header("location:index.php?error=$error");
    exit();
}


