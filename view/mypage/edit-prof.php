

<?php
session_start();
$me=$_SESSION['mail'];
include '../../component/head.php';

$img_name=md5(uniqid(rand(),true)).'.jpg';
$video_name=md5(uniqid(rand(),true)).'.mp4';

if ($_POST['student_prof']){
    $student_prof=$_POST['student_prof'];
    copy($student_prof,"../../img/$img_name");
    $stmt=$pdo->prepare('update students set prof=:prof where mail=:me');
    $params=array(
        ':prof'=>$img_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    exit();
}
$coach_prof=$_POST['coach_prof'];
$movie1=$_POST['movie1'];
$movie2=$_POST['movie2'];
$sub1=$_POST['sub1'];
$sub2=$_POST['sub2'];
if ($_POST['coach_prof']){
    $stmt=$pdo->prepare('update coaches set prof=:prof');
    $params=array(
        ':prof'=>$coach_prof
    );
    $stmt->execute($params);
    copy($coach_prof,"../../img/$img_name");
    exit();
}
if ($_POST['movie1']){
    $stmt=$pdo->prepare('update coaches set movie1=:movie1');
    $params=array(
        ':movie1'=>$movie1
    );
    $stmt->execute($params);
    copy($movie1,"../../video/$video_name");
    exit();
}
if ($_POST['movie2']){
    $stmt=$pdo->prepare('update coaches set movie2=:movie2');
    $params=array(
        ':movie2'=>$movie2
    );
    $stmt->execute($params);
    copy($movie2,"../../video/$video_name");
    exit();
}
if ($_POST['sub1']){
    $stmt=$pdo->prepare('update coaches set sub1=:sub1');
    $params=array(
        ':sub1'=>$sub1
    );
    $stmt->execute($params);
    copy($sub1,"../../img/$img_name");
    exit();
}
if ($_POST['sub2']){
    $stmt=$pdo->prepare('update coaches set sub2=:sub2');
    $params=array(
        ':sub2'=>$sub2
    );
    $stmt->execute($params);
    copy($sub2,"../../img/$img_name");
}
