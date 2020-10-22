<?php


include "../../component/head.php";
session_start();
$schedule=$_POST['data_csv'];
$mail=$_SESSION['mail'];
$stmt=$pdo->prepare("update coaches set schedule=:schedule where mail='$mail'");
$params=array(
    ':schedule'=>$schedule
);
$stmt->execute($params);

