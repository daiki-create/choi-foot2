<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
</head>
<body>
<?php
include ('../../component/nav.php')
?>
<div class="main">
    <div class="left">
        <?php
        echo $_GET['error']
        ?>
        <div>
            <h1>レンタルコーチって？</h1>
            <p>レンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチ</p>
        </div>
        <div>
            <h1>レンタルコーチって？</h1>
            <p>レンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチレンタルコーチ</p>
        </div>
        <form class="form" action="pin.php" method="post">
            <input class="form-item" type="email" placeholder="メールアドレス" name="mail"><br><br>
            <input class="form-btn" type="submit" value="生徒登録へ">
        </form>
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