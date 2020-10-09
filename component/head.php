


<meta charset="UTF-8">
<title>ちょいふっと</title>
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=mysql;charset=utf8',
        'root',
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
