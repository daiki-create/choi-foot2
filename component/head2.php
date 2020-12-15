


<meta charset="UTF-8">
<title>ちょいふっと</title>
<link rel="shortcut icon" href="../../img/favicon.ico">
<meta name="viewport" content="width=device-width,shrink-to-fit=yes">
<script>
    /* ピッチインピッチアウトによる拡大縮小を禁止 */
    document.documentElement.addEventListener('touchstart', function (e) {
        if (e.touches.length >= 2) {e.preventDefault();}
    }, {passive: false});
    /* ダブルタップによる拡大を禁止 */
    var t = 0;
    document.documentElement.addEventListener('touchend', function (e) {
        var now = new Date().getTime();
        if ((now - t) < 350){
            e.preventDefault();
        }
        t = now;
    }, false);
</script>
<style>
    body , input , textarea , select {
        /* 入力欄にフォーカスが当たっても拡大しない */
        font-size:17px;
    }
</style>
<?php
try {
    $pdo = new PDO('mysql:host=mysql1024.db.sakura.ne.jp;dbname=whitecattle2_choi-foot;charset=utf8',
        'whitecattle2',
        'Yd10989286',
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
}catch (Exception $e){
    $error="接続に失敗しました";
    header("location:../view/myPage.php?error=$error");
    exit();
}
?>
<div class="nav2">
    <ul>
        <li class="nav-item"><a href="../../view/index.php">TOP</a></li>
        <li class="nav-item"><a href="../../view/message/index.php">チャット</a></li>
        <li class="nav-item"><a href="../../view/mypage/index.php">マイページ</a></li>
        <li class="nav-item"><a href="../../view/lesson/index.php">レッスン</a></li>
    </ul>
</div>
