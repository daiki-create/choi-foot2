



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
        <p>ちょいふっとを退会してもよろしいですか？</p>
        <input value="戻る" onclick="history.back();" type="button">
        <button class="form-btn" onclick="location.href='delete-account.php'">退会する</button>
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

