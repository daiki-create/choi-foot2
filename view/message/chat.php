



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
    <script src="../../js/jquery-3.5.1.min.js"></script>
</head>
<body>
<?php
include ('../../component/nav.php')
?>
<div class="main">
    <div class="left">
        <?php
        session_start();
        $coach=$_GET['mail'];
        $me=$_SESSION['mail'];
        $stmt=$pdo->query("select * from messages where (sender='$coach' and receiver='$me') or (sender='$me' and receiver='$coach')");
        foreach ($stmt as $row){
            $content=$row['content'];
            $sender=$row['sender'];
            if ($sender===$me){
                echo ("<div class='my-message'>$me:$content</div>");
            }
            else{
                echo ("<div class='coach-message'>$coach:$content</div>");
            }
        }
        ?>
        <form method="post">
            <?php
            echo ("<input type='hidden' value='$coach' id='coach' name='coach'>")
            ?>
            <input id="request" type="text" name="content">
            <input id="send" type="button" value="send">
        </form>
    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<?php
include ('../../component/footer.php')
?>
<script>
    $('#send').on('click',function(){
        var data= {request:$('#request').val(),
            coach:$('#coach').val()};

        $.ajax({
            type:"POST",
            url:"send-message.php",
            data:data,
            success:function (){

            },
            error:function (){

            }
        });
        return false;
        )}
</script>

</body>
</html>
