



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
        <div class="coach-student">
            <div class="student" onclick="click_student_border()">生徒</div>
            <span class="student-border" id="student-border2"></span>
            <div class="coach" onclick="click_coach_border()">コーチ</div>
            <span class="coach-border" id="coach-border2"></span>
        </div>
        <br><br>
        <div id="student-post">
            <?php
            session_start();
            $me=$_SESSION['mail'];

            $stmt=$pdo->query("select * from lessons where student='$me'");
            foreach ($stmt as $row){
                $coach_name=$row['coach_name'];
                $date=$row['date'];
                $time=$row['time'];
                $content=$row['content'];
                echo ("
                <div class='lesson-card'>
                    <h1>$coach_name</h1>
                    <p>$date $time</p>
                    <p>$content</p>
                </div>
            ");
            }
            ?>
        </div>

        <div id="coach-post">
            <?php
            $stmt=$pdo->query("select * from lessons where coach='$me'");
            foreach ($stmt as $row){
                $student_name=$row['student_name'];
                $date2=$row['date'];
                $time2=$row['time'];
                $content2=$row['content'];
                echo ("
                <div class='lesson-card'>
                    <h1>$student_name</h1>
                    <p>$date2 $time2</p>
                    <p>$content2</p>
                </div>
            ");
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

