



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
    <div class="left" >
        <?php
        echo htmlentities($_GET['error']);
        session_start();
        $student=htmlentities($_GET['mail']);
        $me=$_SESSION['mail'];
        $stmt=$pdo->query("select * from coaches where mail='$me'");
        foreach ($stmt as $row){
            $coach_prof=$row['prof'];
        }
        $stmt=$pdo->query("select * from students where mail='$student'");
        foreach ($stmt as $row){
            $student_prof=$row['prof'];
        }
        $stmt=$pdo->query("select * from messages where (sender='$student' and receiver='$me') or (sender='$me' and receiver='$student')");
        foreach ($stmt as $row){
            $content=$row['content'];
            $sender=$row['sender'];
            $sender_name=$row['sender_name'];
            if ($sender===$me){
                echo ("<br><div class='my-message'><div><img src='../../img/$coach_prof' alt='' style='width: 50px;height:50px;object-fit: cover;border-radius: 50%'>$sender_name</div> $content</div>");
            }
            if($sender===$student){
                echo ("<br><div class='coach-message'><div><img src='../../img/$student_prof' alt='' style='width: 50px;height:50px;object-fit: cover;border-radius: 50%'>$sender_name</div> $content</div>");
            }
        }
        ?>
        <form class="message-form" method="post">
            <?php
            echo ("<input type='hidden' value='$student' id='student'>")
            ?>
            <textarea class="message-item" id="content" maxlength="400" cols="30" rows="1"></textarea>
            <button onclick="send()" class="message-btn">送信</button>
        </form>
    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<?php
include ('../../component/footer.php');
?>
<script>
    function send(){
        $.ajax({
            type:"post",
            url:"send-coach-message.php",
            dataType:"json",
            data:{content:$('#content').val(),
                mail:$('#student').val()},
            done:function(){
                console.log("done");
            },
            fail:function () {
                console.log("fail");
            }
        });
    }
</script>



</body>
</html>
