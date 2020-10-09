



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
            <div class="coach" onclick="click_coach_border()">コーチ</div>
            <span class="coach-border" id="coach-border"></span>
            <div class="student" onclick="click_student_border()">生徒</div>
            <span class="student-border" id="student-border"></span>
        </div>
        <br>
        <br>
        <div id="coach-page">
            <?php
            session_start();
            $mail=$_SESSION['mail'];
            $name='コーチアカウントはありません。';
            $prof='no-image.jpg';
            $sub1='no-image.jpg';
            $sub2='no-image.jpg';
            $stmt=$pdo->query("select * from coaches where mail='$mail'");
            foreach ($stmt as $row){
                $name=$row['name'];
                $prof=$row['prof'];
                $movie1=$row['movie1'];
                $movie2=$row['movie2'];
                $sub1=$row['sub1'];
                $sub2=$row['sub2'];
                $intro=$row['intro'];
                $career=$row['career'];
            }
                echo ("
                <div class='left-img'>
                    <img class='main-img' src='../../img/$prof' alt=''>
                </div>
                <div class='right-img'>
                    <video class='sub-img' src='../../video/$movie1' controls></video>
                    <video class='sub-img' src='../../video/$movie2' controls></video>
                    <img class='sub-img' src='../../img/$sub1' alt=''>
                    <img class='sub-img' src='../../img/$sub2' alt=''>
                </div>
                <div>
                    <h1>$name</h1>
                    <p class='intro'>$intro</p>
                    <h3>経歴</h3>
                    <p>$career</p>
                    <h3>振込先</h3>
                    <p>銀行：</p>
                    <p>支店：</p>
                    <p>記号番号：</p>
                </div>
                <div id ='main-table'></div>

                <script>
                     var table = document.createElement('table');
                     var date=new Date();
                     var today=date.getDate();
                     var month=date.getMonth();
                     var h3=document.createElement('h3');
                     h3.textContent='一週間の予定';
                     document.getElementById('main-table').appendChild(h3);
                      for (var i = 0; i < 28; i++) {
                        var tr = document.createElement('tr');
                        if (i%2===0){
                        }
                        else {
                        }
                        for (var j = 0; j < 8; j++) {
                            if(i === 0) {
                                var th = document.createElement('th');
                                if (j===0){
                                    th.textContent='';
                                }
                                else {
                                     th.textContent = today+j+'日';
                                }
                                tr.appendChild(th);
                                
                            } else {
                                var td = document.createElement('td');
                                if (j===0){
                                    td.textContent=parseInt(9+(i-1)/2)+':'+('0'+(i-1)%2*30).slice(-2);
                                }
                                else {
                                    var no=document.createElement('div');
                                    var yes=document.createElement('div');
                                    no.textContent='-';
                                    yes.textContent='〇';
                                    
                                    no.style.cssText='cursor:pointer;'
                                    yes.style.cssText='display:none;' +
                                     'cursor:pointer';
                                    
                                    no.id='no'+parseInt(i)+parseInt(j);
                                    yes.id='yes'+parseInt(i)+parseInt(j);
                                    
                                   document.getElementById('no'+parseInt(i)+parseInt(j)).onclick=function(){
                                        document.getElementById('no'+parseInt(i)+parseInt(j)).style.cssText='display:none';
                                        document.getElementById('yes'+parseInt(i)+parseInt(j)).style.cssText='display:block';
                                    }
                                  document.getElementById('yes'+parseInt(i)+parseInt(j)).onclick=function(){
                                        document.getElementById('yes'+parseInt(i)+parseInt(j)).style.cssText='display:none';
                                        document.getElementById('no'+parseInt(i)+parseInt(j)).style.cssText='display:block';
                                    }
                                    
                                    td.appendChild(no);
                                    td.appendChild(yes);
                                    }
                                tr.appendChild(td);
                            }
                        }
                        table.appendChild(tr);
                        }
                          document.getElementById('main-table').appendChild(table);
                          
                </script>
                
               

            ");

            ?>
        </div>
        <div id="student-page">
            <?php
            $prof2='no-image.jpg';
            $name2='生徒アカウントはありません。';
            $stmt2=$pdo->query("select * from students where mail='$mail'");
            foreach ($stmt2 as $row){
                $name2=$row['name'];
                $prof2=$row['prof'];
                $mail2=$row['mail'];
            }
            echo ("<div class='student-prof-parent'>
                        <img src='../../img/$prof2' alt='' class='student-prof'>
                    </div>
                    <h1 style='text-align: center'>$name2</h1>
                    <div>メールアドレス：$mail2</div>
                    <h3>決済情報</h3>
                    <p>カード番号：</p>
                    <p>有効期限：</p>
                    <p>セキュリティコード：</p>
            ");
            ?>
        </div>
        <script>
            function click_coach_border(){
                document.getElementById('coach-border').style.cssText='display:block'
                document.getElementById('student-border').style.cssText='display:none'
                document.getElementById('coach-page').style.cssText='display:block'
                document.getElementById('student-page').style.cssText='display:none'
            }
            function click_student_border(){
                document.getElementById('coach-border').style.cssText='display:none'
                document.getElementById('student-border').style.cssText='display:block'
                document.getElementById('coach-page').style.cssText='display:none'
                document.getElementById('student-page').style.cssText='display:block'
            }
        </script>
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

