



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
        session_start();
        $me=$_SESSION['mail'];
        $stmt=$pdo->query("select * from messages where receiver='$me'");
        foreach ($stmt as $row){
            $coach=$row['sender'];
            echo ("
            <div><a href='chat.php?mail=$coach'>$coach</a></div>
            ");
        }
        ?>

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

