



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
    <link rel="stylesheet" href="../../css/540.css" media="screen and (max-width:540px)">
    <link rel="stylesheet" href="../../css/320.css" media="screen and (max-width:320px)">
    <script src="../../js/jquery.min.js"></script>
</head>
<body>
<?php
include ('../../component/nav.php');
session_start();
$me=$_SESSION['mail'];
?>
<div class="main" style="margin-bottom:200px ">
    <div class="left">
        <br>

        <form action="edit-prof.php" method="post" enctype="multipart/form-data" style="text-align: center">
            <div>
                <?php
                echo htmlentities(str_replace('?','',$_GET['message1']));
                ?>
            </div>
            <label for="movie1" class="prof-label">動画1を選択</label><input id="movie1" type="file" name="movie1" style='display:none;'>
            <input type="submit" value="変更">
        </form><br>
        <form action="edit-prof.php" method="post" enctype="multipart/form-data" style="text-align: center">
            <div>
                <?php
                echo htmlentities(str_replace('?','',$_GET['message2']));
                ?>
            </div>
            <label for="movie2" class="prof-label">動画2を選択</label><input id="movie2" type="file" name="movie2" style='display:none;'>
            <input type="submit" value="変更">
        </form><br>
        <form action="edit-prof.php" method="post" enctype="multipart/form-data" style="text-align: center">
            <div>
                <?php
                echo htmlentities(str_replace('?','',$_GET['message3']));
                ?>
            </div>
            <label   for="sub1" class="prof-label">サブイメージ1を選択</label><input id="sub1" type="file" name="sub1" style='display:none;'>
             <input type="submit" value="変更">
        </form><br>
        <form action="edit-prof.php" method="post" enctype="multipart/form-data" style="text-align: center">
            <div>
                <?php
                echo htmlentities(str_replace('?','',$_GET['message4']));
                ?>
            </div>
            <label for="sub2" class="prof-label">サブイメージ2を選択</label><input id="sub2" type="file" name="sub2" style='display:none;'>
            <input type="submit" value="変更">
        </form>
        <?php
        $_GET[]=null;
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

