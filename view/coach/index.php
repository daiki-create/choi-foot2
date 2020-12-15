



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
include ('../../component/nav.php');
?>
<div class="main">
    <div class="left">
        <?php
        echo $_GET['message'];
        $id=$_GET['id'];
        $stmt=$pdo->query("select * from coaches where id='$id'");
        foreach ($stmt as $row){
            $name=$row['name'];
            $mail=$row['mail'];
            $prof=$row['prof'];
            $movie1=$row['movie1'];
            $movie2=$row['movie2'];
            $sub1=$row['sub1'];
            $sub2=$row['sub2'];
            $comment=$row['comment'];
            $prefecture=$row['prefecture'];
            $intro=$row['intro'];
            $career=$row['career'];
            $schedule=$row['schedule'];
            $locate=$row['locate'];
            $fee=$row['fee'];


            echo ("
                <div>
                    <div class='left-img'>
                        <img class='main-img' src='../../img/$prof' alt=''>
                    </div>
                    <div class='right-img'>
                        <video class='sub-img' src='../../video/$movie1' controls></video>
                        <video class='sub-img' src='../../video/$movie2' controls></video>
                        <img class='sub-img' src='../../img/$sub1' alt=''>
                        <img class='sub-img' src='../../img/$sub2' alt=''>
                    </div>
                </div>
                
                <br>
                
                <div>
                    <h1>$name($prefecture)</h1>
                    <p>レッスン場所：$locate</p>
                    <p>$comment</p>
                    <p class='intro'>$intro</p>
                    <h3>経歴</h3>
                    <p>$career</p>
                </div>
                <h2>予約の取りやすい日時</h2>
                <div id='main-table'><table id='schedule'></table></div>
                <script>
                    const output_csv = document.getElementById('schedule');
                    function csv_array(data) {
                        const dataArray = []; //配列を用意
                        const dataString = data.split('nn'); //改行で分割
                        for (let i = 0; i < dataString.length-1; i++) { //あるだけループ
                            dataArray[i] = dataString[i].split(',');
                        }
                        var wak = \"\";
                        for (i = 0; i < dataArray.length; i++) {
                            wak += \"<tr>\";
                            for (j = 0; j < dataArray[i].length; j++) {
                                if (i===0 || j===0){
                                    wak += \"<td>\";
                                    wak += dataArray[i][j];
                                    wak += \"</td>\";
                                }else {
                                    if (dataArray[i][j]==='〇'){
                                        wak += \"<td><a href='form.php?day=\"+dataArray[0][j]+\"&time=\"+dataArray[i][0]+\"&mail=$mail&locate=$locate&fee=$fee' style='text-decoration:none;color:white'>\";
                                        wak += dataArray[i][j];
                                        wak += \"</a></td>\";
                                    }else {
                                        wak += \"<td>\";
                                        wak += dataArray[i][j];
                                        wak += \"</td>\";
                                    }
                                    
                                }
                                
                            }
                            wak +='</tr>';
                        }
                        output_csv.innerHTML = wak; //表示
                        console.log(dataArray);
                    }
                    csv_array('$schedule');
                </script>
                
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
