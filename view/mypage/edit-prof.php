


<?php
session_start();
$me=$_SESSION['mail'];
include '../../component/head.php';

if ($_FILES['student_prof']){
    $img_name=md5(uniqid(rand(),true)).'.jpg';
    $stmt=$pdo->prepare('update students set prof=:prof where mail=:me');
    $params=array(
        ':prof'=>$img_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    move_uploaded_file($_FILES['student_prof']['tmp_name'], '../../img/'.$img_name);
    $referer=$_SERVER['HTTP_REFERER'];
    header("location: $referer");
    exit();
}
if ($_FILES['coach_prof']){
    $img_name=md5(uniqid(rand(),true)).'.jpg';
    $stmt=$pdo->prepare('update coaches set prof=:prof where mail=:me');
    $params=array(
        ':prof'=>$img_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    move_uploaded_file($_FILES['coach_prof']['tmp_name'], '../../img/'.$img_name);
    $referer=$_SERVER['HTTP_REFERER'];
    header("location: $referer");
    exit();
}


if ($_FILES['movie1']){
    $video_name=md5(uniqid(rand(),true)).'.mp4';
    $stmt=$pdo->prepare('update coaches set movie1=:movie1 where mail=:me');
    $params=array(
        ':movie1'=>$video_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    move_uploaded_file($_FILES['movie1']['tmp_name'], '../../video/'.$video_name);
    $referer=$_SERVER['HTTP_REFERER'];
    $message1="変更しました。";
    header("location: $referer?&message1=$message1");
}
if ($_FILES['movie2']){
    $video_name=md5(uniqid(rand(),true)).'.mp4';
    $stmt=$pdo->prepare('update coaches set movie2=:movie2 where mail=:me');
    $params=array(
        ':movie2'=>$video_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    move_uploaded_file($_FILES['movie2']['tmp_name'], '../../img/'.$video_name);
    $referer=$_SERVER['HTTP_REFERER'];
    $message2="変更しました。";
    header("location: $referer?&message2=$message2");
}
if ($_FILES['sub1']){
    $img_name=md5(uniqid(rand(),true)).'.jpg';
    $stmt=$pdo->prepare('update coaches set sub1=:sub1 where mail=:me');
    $params=array(
        ':sub1'=>$img_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    move_uploaded_file($_FILES['sub1']['tmp_name'], '../../img/'.$img_name);
    $referer=$_SERVER['HTTP_REFERER'];
    $message3="変更しました。";
    header("location: $referer?&message3=$message3");
}
if ($_FILES['sub2']){
    $img_name=md5(uniqid(rand(),true)).'.jpg';
    $stmt=$pdo->prepare('update coaches set sub2=:sub2 where mail=:me');
    $params=array(
        ':sub2'=>$img_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    move_uploaded_file($_FILES['sub2']['tmp_name'], '../../img/'.$img_name);
    $referer=$_SERVER['HTTP_REFERER'];
    $message4="変更しました。";
    header("location: $referer?&message4=$message4");
}

