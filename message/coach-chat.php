



<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../../js/jquery.min.js"></script>
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
        session_start();
        $student=$_GET['mail'];
        $me=$_SESSION['mail'];
        $stmt=$pdo->query("select * from messages where (sender='$student' and receiver='$me') or (sender='$me' and receiver='$student')");
        foreach ($stmt as $row){
            $content=$row['content'];
            $sender=$row['sender'];
            $sender_name=$row['sender_name'];
            if ($sender===$me){
                echo ("<br><div class='my-message'><div>$sender_name</div> $content</div>");
            }
            if($sender===$student){
                echo ("<br><div class='coach-message'><div>$sender_name</div> $content</div>");
            }
        }
        ?>
        <form class="message-form" method="post">
            <?php
            echo ("<input type='hidden' value='$student' id='student'>")
            ?>
            <input type="text " class="message-item" id="content">
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
