



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
</head>
<body>
<?php
include ('../../component/nav.php');

session_start();
$me=$_SESSION['mail'];
$coach=$_POST['mail'];
$date=$_POST['date'];
$time=$_POST['time'];
$util=$_POST['util'];
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
        ':content'=>'予約を受け付けました。',
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

$stmt=$pdo->prepare("insert into lessons (coach,student,coach_name,student_name,date,time,util,content) values (:coach,:student,:coach_name,:student_name,:date,:time,:util,:content)");
$params=array(
    ':coach'=>$coach,
    'student'=>$me,
    ':coach_name'=>$coach_name,
    'student_name'=>$student_name,
    ':date'=>$date,
    ':time'=>$time,
    ':util'=>$util,
    ':content'=>$content
);
$stmt->execute($params);

?>
<div class="main">
    <div class="left">
        <h1>予約完了</h1>
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
