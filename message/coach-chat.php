



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
    <script src="../../js/jquery.min.js"></script>
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
            <textarea class="message-item" id="content" cols="30" rows="1"></textarea>
            <input class="message-btn" id="send" type="button" value="送信">
        </form>
    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<script>
    $('#send').on('click',function(){
        var data= {content:$('#content').val(),
            mail:$('#student').val()};

        $.ajax({
            type:"POST",
            url:"send-coach-message.php",
            dataType:"json",
            data:data,
            success:function (){
                console.log('success');
            },
            error:function (){
                console.log('error');
            }
        });
        return false;
    )}
</script>
<?php
include ('../../component/footer.php')
?>
</body>
</html>
