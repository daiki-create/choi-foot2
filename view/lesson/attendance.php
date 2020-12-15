


<?php
include '../../component/head.php';
session_start();
include '../../component/head.php';

$me=$_SESSION['mail'];
$student=htmlentities($_POST['mail']);

$sender_name="";
$stmt=$pdo->query("select * from coaches where mail ='$me'");
foreach ($stmt as $row){
    $sender_name=$row['name'];
}
$stmt=$pdo->prepare("insert into messages (sender,receiver,content,sender_name) values (:sender,:receiver,:content,:sender_name)");
$params=array(
    ":sender"=>$me,
    ":receiver"=>$student,
    ":content"=>"予約が確定しました。送付されたメールに従ってレッスン料金をお支払いください。",
    ":sender_name"=>$sender_name
);
$stmt->execute($params);

$subject='ちょいふっと 予約確定のお知らせ';
$content="
$sender_name コーチにより予約が確定されました。
レッスン料金につきましては銀行振込またはクレジットカード決済にてお願いいたします。

<お支払期限：レッスン開始時間まで>

・銀行振込の場合
    銀行名：ゆうちょ銀行
    支店名：〇二八支店
    口座番号：6535762

・クレジットカード決済の場合
    本サイトの「レッスン」より「カードで支払う」に進んでください。
    
お問い合わせはお手数ですが、
https://choi-foot.com/view/contact
までお願い致します。";
$headers='';
mb_send_mail($student,$subject,$content,$headers);

$stmt=$pdo->prepare("update lessons set attendance=:attendance where (coach=:coach and student=:student)");
$params=array(
    ":attendance"=>1,
    ":coach"=>$me,
    ":student"=>$student
);
$stmt->execute($params);

