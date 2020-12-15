



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');
    session_start();
    if ($_SESSION['student']!=true){
        $uli=$_SERVER['HTTP_REFERER'];
        $message='生徒アカウントでログイン後にご利用いただけます。';
        header("location:".$uli."&message=$message");
    }?>
    <link rel="stylesheet" href="../../css/layout.css">
    <link rel="stylesheet" href="../../css/540.css" media="screen and (max-width:540px)">
    <link rel="stylesheet" href="../../css/320.css" media="screen and (max-width:320px)">
</head>
<body>
<?php
include ('../../component/nav.php');

session_start();
$me=$_SESSION['mail'];
$coach=$_POST['mail'];
$date=$_POST['date'];
$time=$_POST['time'];
$locate=$_POST['locate'];
$util=$_POST['util'];
$fee=$_POST['fee'];
$content=$_POST['content'];

$stmt=$pdo->query("select * from coaches where mail='$coach'");
foreach ($stmt as $row){
    $coach_name=$row['name'];
}

$stmt=$pdo->query("select * from students where mail='$me'");
foreach ($stmt as $row){
    $student_name=$row['name'];
}

$stmt=$pdo->prepare("insert into messages (sender,receiver,content,sender_name) values (:sender,:receiver,:content,:sender_name)");
$params=array(
        ':sender'=>$coach,
        ':receiver'=>$_SESSION['mail'],
        ':content'=>'仮予約を受け付けました。
        まだ確定はしておりません。出勤不可の場合は恐れ入りますがこのチャットルームが削除されますのでご了承ください。',
        ':sender_name'=>$coach_name
);
$stmt->execute($params);

$stmt=$pdo->prepare("insert into message_posts (coach,student,coach_name,student_name) values (:coach,:student,:coach_name,:student_name)");
$params=array(
        ':coach'=>$coach,
        'student'=>$me,
        ':coach_name'=>$coach_name,
        'student_name'=>$student_name
);
$stmt->execute($params);

$stmt=$pdo->prepare("insert into lessons (coach,student,coach_name,student_name,date,time,util,content,locate,fee) values (:coach,:student,:coach_name,:student_name,:date,:time,:util,:content,:locate,:fee)");
$params=array(
    ':coach'=>$coach,
    'student'=>$me,
    ':coach_name'=>$coach_name,
    'student_name'=>$student_name,
    ':date'=>$date,
    ':time'=>$time,
    ':util'=>$util,
    ':content'=>$content,
    ':locate'=>$locate,
    ':fee'=>$fee
);
$stmt->execute($params);

?>
<div class="main">
    <div class="left">
        <h1>仮予約完了</h1>
        <p>練習の詳細につきましてはチャットよりコーチと連絡を取ってください。</p>
    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<?php
include ('../../component/footer.php')
?>

</body>
</html>
