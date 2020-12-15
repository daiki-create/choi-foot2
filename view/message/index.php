



<!DOCTYPE html>
<html lang="en">
<head>
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
        <div class="coach-student">
            <div class="student" onclick="click_student_border()">生徒ページ</div>
            <span class="student-border" id="student-border2"></span>
            <div class="coach" onclick="click_coach_border()">コーチページ</div>
            <span class="coach-border" id="coach-border2"></span>
        </div>
        <br><br>
        <div id="student-post">
            <?php
            session_start();
            $me=$_SESSION['mail'];
            $stmt=$pdo->query("select * from message_posts where student='$me'");
            foreach ($stmt as $row){
                $coach_name=$row['coach_name'];
                $coach=$row['coach'];
                echo ("
                <br><div class='chat-list'><a href='student-chat.php?mail=$coach'>$coach_name</a></div>
                ");
                if ($coach==null){
                    echo "<div style='color: white'>メッセージはありません。</div>";
                }
            }
            ?>
        </div>

        <div id="coach-post">
            <?php
            session_start();
            $me=$_SESSION['mail'];
            $stmt=$pdo->query("select * from message_posts where coach='$me'");
            foreach ($stmt as $row){
                $student_name=$row['student_name'];
                $student=$row['student'];
                echo ("<br><div class='chat-list'><a href='coach-chat.php?mail=$student'>$student_name</a></div>");
                if ($student==null){
                    echo "<div style='color: white'>メッセージはありません。</div>";
                }
            }
             ?>
        </div>

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

