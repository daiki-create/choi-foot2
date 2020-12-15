



<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../../js/jquery.min.js"></script>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
    <link rel="stylesheet" href="../../css/540.css" media="screen and (max-width:540px)">
    <link rel="stylesheet" href="../../css/320.css" media="screen and (max-width:320px)">
</head>
<body>
<?php
include ('../../component/nav.php')
?>
<div class="main">
    <div class="left">
        <h1>利用規約</h1>
        <p>
            ■ご利用の際のお願い<br>
            <br>
            『ちょいふっと』は健全にご利用していただくことを目的としております。<br>
            生徒もコーチもお互いを尊重して楽しく有意義な時間を過ごせるよう必要最低限の配慮をお願いしています。<br>
            ■レッスンお支払いに関する規約<br>
            <br>
            お客様はレッスン申込みの際『ちょいふっと』の定める料金を銀行振込またはクレジットカード決済にてお支払いください。<br>
            レッスンご予約後の日時、場所の変更はチャットにて行ってください。但し、コーチの変更はできません。<br>
            レッスン予約日2日前～レッスン開始時間２４時間前までのキャンセルの場合、『レッスン料』の50％をお支払いいただきます。<br>
            レッスン開始時間２４時間切ってのキャンセル（連絡が無い場合も同様）はいかなる理由でも『レッスン料』をキャンセル料としてお支払いいただきます。<br>
            お支払いについて故意に遅らせるなど悪意があると判断した場合、即刻キャンセルとし、キャンセル料（『レッスン料』の100％）をお支払いいただきます。<br>
            連絡の取れない30分以上の遅刻、コーチが30分以上一人になる時間が出来た場合は、当日キャンセル扱いとさせていただきます。<br>
            キャンセル時に返金がある場合、所定の手数料が発生します。<br>
            ■コーチが当日レッスンに行けなくなった場合の規約<br>
            <br>
            コーチが止むなく病気や事故などで当日どうしてもレッスンに行けなくなった場合、日時の変更で対応いたします。それが難しい場合は利用料金を返金いたします。また当日予約をしたコート、公園、体育館などのあらゆる費用、キャンセル料金などはお支払いできません。<br>
            また、コーチがその他理由で故意にレッスンを休み生徒様が一人になる時間が出来た場合はレッスン料を全額返金致します。それ以上の保証は致しかねますのでご了承ください。
            コーチが10分以上遅刻した場合は30分分のレッスン料が無料になり、コーチの報酬額も30分のぶん差し引かれます。
            ■延長料金支払いに関する規約<br>
            <br>
            レッスンの延長は基本的には認められません。<br>
            ■未払い、滞納がある場合に関する規約<br>
            <br>
            当サイトに未払い、滞納などがある場合、ご予約いただいても利用できない場合がございます。またそれが発覚した場合、入金額より相殺することができるものといたします。<br>
            ■掲載素材に関する規約<br>
            <br>
            本サービス上の写真、映像、音声、イラスト、テキスト、またそれに付随、類似するあらゆる素材は一切『ちょいふっと』に帰属するものであり、これらを無断で使用することはできません。<br>
            ■禁止事項<br>
            <br>
            チャットでの不用意な発言や迷惑と判断されるメッセージの送信。<br>
            サッカー禁止エリアでのレッスン（実技を伴わない場合は可）<br>
            わいせつな行為、暴力行為等の相手の嫌がること。<br>
            ※上記に違反した場合、速やかに今後のご利用の禁止、損害賠償請求などの法的処置（警察への通報も含む）を取らせていただきます。また『ちょいふっと』はお客様自身、またそれが起因、付随するトラブル・損害・事故・怪我が起きた場合は速やかにお問い合わせフォームよりご連絡ください。
            当サイトで可能な限りの措置は取らさせていただきますが、すべての責任は負いかねますのでご了承ください。
        </p>
    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<script>
    function click_coach_border(){
        document.getElementById('coach-border2').style.cssText='display:block'
        document.getElementById('student-border2').style.cssText='display:none'
        document.getElementById('coach-post').style.cssText='display:block'
        document.getElementById('student-post').style.cssText='display:none'
    }
    function click_student_border(){
        document.getElementById('coach-border2').style.cssText='display:none'
        document.getElementById('student-border2').style.cssText='display:block'
        document.getElementById('coach-post').style.cssText='display:none'
        document.getElementById('student-post').style.cssText='display:block'
    }
</script>
<?php
include ('../../component/footer.php')
?>
</body>
</html>

