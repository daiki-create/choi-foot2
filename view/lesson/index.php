



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
        <div class="coach-student">
            <div class="student" onclick="click_student_border()">生徒ページ</div>
            <span class="student-border" id="student-border2"></span>
            <div class="coach" onclick="click_coach_border()">コーチページ</div>
            <span class="coach-border" id="coach-border2"></span>
        </div>
        <br><br>
        <div id="student-post">
            <div id="message"></div>
            <?php


            session_start();
            $me=$_SESSION['mail'];
            $i=0;
            $stmt=$pdo->query("select * from lessons where student='$me'");
            foreach ($stmt as $row){
                $i++;
                $coach_name=$row['coach_name'];
                $coach=$row['coach'];
                $date=$row['date'];
                $time=$row['time'];
                $locate=$row['locate'];
                $fee=$row['fee'];
                $util=$row['util'];
                $content=$row['content'];
                $total=$fee*$util/30;
                $attendance=$row['attendance'];


                echo $charge->amount; // 2000
                echo ("
                <div class='lesson-card' id='lesson-card$i'>
                    <h1>$coach_name</h1>
                    <p>@$locate</p>
                    <p>$date $time</p>
                    <p>$util 分</p>
                    <p>レッスン料金：$total 円</p>
                    <p>$content</p>
                    ");

                if ($attendance===0){
                    echo "<button class='cancel-btn' id='cancel-btn$i'>予約キャンセル</button>";
                }
                else{
                    echo " <p>予約が確定されました。</p>
                           <form action=\"settings.php\" method=\"post\">
                                 <input type='hidden' name='amount' value='$total'>
                                 <script type=\"text/javascript\" src=\"https://checkout.pay.jp\" class=\"payjp-button\" data-key=\"pk_test_516092f3ee570b7c27186501\" ></script>
                          　</form>";
                }

                echo ("    
                </div>
                <script>
                    document.getElementById('cancel-btn$i').onclick=function (){
                        var result=window.confirm('$coach_name の予約をキャンセルしてもよろしいですか？');
                        if (result){
                            document.getElementById('lesson-card$i').style.cssText='display:none'
                            $.ajax({
                                type:\"post\",
                                url:\"cancel.php\",
                                dataType:\"json\",
                                data:{mail:'$coach'},
                                done:function (){
                                    console.log(\"done\");
                                    document.getElementById('message').textContent='予約をキャンセルしました。'  
                                },
                                fail:function (){
                                    console.log('fail');
                                    document.getElementById('message').textContent='予約をキャンセルに失敗しました。'  
                                }
                            });
                        }
                    }
                </script>
            ");
            }
            ?>
        </div>

        <div id="coach-post">
            <?php
            $stmt=$pdo->query("select * from lessons where coach='$me'");
            foreach ($stmt as $row){
                $j++;
                $student_name=$row['student_name'];
                $student=$row['student'];
                $date2=$row['date'];
                $time2=$row['time'];
                $util2=$row['util'];
                $locate2=$row['locate'];
                $fee2=$row['fee'];
                $content2=$row['content'];
                $total2=$fee2*$util2/30;
                $attendance2=$row['attendance'];
                echo ("
               
                <div class='lesson-card' id='lesson-card$j'>
                    <h1>$student_name</h1>
                    <p>@$locate</p>
                    <p>$date2 $time2</p>
                    <p>$util2 分</p>
                    <p>レッスン料金：$total2 円</p>
                    <p>$content2</p>
                   
                    ");
                    if ($attendance2===0){
                        echo "<button class='cancel-btn' id='cancel-btn$j'>予約お断り</button>
                                <button class='cancel-btn' id='ok-btn$j'>出勤確定</button>";
                    }
                    else{
                        echo "<p>出勤確定済</p>";
                    }
                echo ("
                    <div id='message$j' style='color: white'></div>
                </div>
                <script>
                    document.getElementById('cancel-btn$j').onclick=function (){
                        var result=window.confirm('$student_name さんの予約をお断りしてもよろしいですか？');
                        if (result){
                            document.getElementById('lesson-card$j').style.cssText='display:none'
                            $.ajax({
                                type:\"post\",
                                url:\"turn-down.php\",
                                dataType:\"json\",
                                data:{mail:'$student'},
                                done:function (){
                                    console.log(\"done\");
                                    document.getElementById('message').textContent='予約を断りました。'  
                                },
                                fail:function (){
                                    console.log('fail');
                                    document.getElementById('message').textContent='予約の断りに失敗しました。'  
                                }
                            });
                        }
                        document.getElementById('message$j').textContent='出勤確定しました。';
                    }
                    document.getElementById('ok-btn$j').onclick=function (){
                            $.ajax({
                                type:\"post\",
                                url:\"attendance.php\",
                                dataType:\"json\",
                                data:{mail:'$student'},
                                done:function (){
                                    console.log(\"done\");
                                    document.getElementById('message').textContent='予約を断りました。'  
                                },
                                fail:function (){
                                    console.log('fail');
                                    document.getElementById('message').textContent='予約の断りに失敗しました。'  
                                }
                            });
                           document.getElementById('message$j').textContent='出勤確定しました。';
                    }
                </script>
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

