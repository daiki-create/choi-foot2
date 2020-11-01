



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
        <div class="coach-student">
            <div class="student" onclick="click_student_border()">生徒</div>
            <span class="student-border" id="student-border"></span>
            <div class="coach" onclick="click_coach_border()">コーチ</div>
            <span class="coach-border" id="coach-border"></span>
        </div>
        <br>
        <br>
        <?php
        echo $_GET['message'];
        ?>
        <div id="coach-page">
            <?php
            session_start();
            $mail=$_SESSION['mail'];
            $coach_name='コーチアカウントはありません。';
            $prof='no-image.jpg';
            $sub1='no-image.jpg';
            $sub2='no-image.jpg';
            $stmt=$pdo->query("select * from coaches where mail='$mail'");
            foreach ($stmt as $row){
                $coach_name=$row['name'];
                $coach=$row['mail'];
                $passwd=$row['passwd'];
                $prefecture=$row['prefecture'];
                $fee=$row['fee'];
                $comment=$row['comment'];
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
                <br><br>
                <form action='update-coach.php' method='post'>
                        <label for=''>ユーザー名：　　　　　</label>
                        <input name='name' class='form-item'type='text' value='$coach_name' ><br><br>
                        
                        <label for=''>メールアドレス：　　　</label>
                        <input name='mail' class='form-item' type='text' value='$coach' ><br><br>
                        
                        <label for=''>パスワード：　　　　　</label>
                        <input name='passwd' class='form-item' type='password' value='$passwd' ><br><br>
                        
                        <label for=''>パスワード（確認）：　</label>
                        <input name='passwd2' class='form-item' type='password' value='$passwd' ><br><br>
                        
                        <p>**メールアドレスとパスワードの変更は生徒アカウントと連動します。</p><br><br>
                        
                        <label for=''>都道府県：　　　　　　</label>
                        <select style=\"background-color: black\" class='form-item2' name='prefecture' id='prefecture' class='form-item'>
                            <option value='$prefecture'>$prefecture</option>
                        </select><br><br>
                        
                        <label for=''>料金/30分：　　　　　</label>
                        <input name='fee' class='form-item' type='text' value='$fee' ><br><br>
                        
                        <label for=''>コメント：　　　　　　</label>
                        <input name='comment' class='form-item' type='text' value='$comment' ><br><br>
                        
                        <div>自己紹介：　　　</div>
                        <textarea class='form-area' name='intro' cols='30' rows='10'>$intro</textarea><br><br>
                        
                        <div>経歴：　　　　　</div>
                        <textarea class='form-area' name='career' cols='30' rows='10'>$career</textarea><br><br>
                        
                        <h3>給与振込口座</h3>
                        <label for=''>銀行名：　　　　　　　</label>
                        <input name='bank' class='form-item' type='text'><br><br>
                        
                        <label for=''>支店名：　　　　　　　</label>
                        <input name='branch' class='form-item' type='text'><br><br>
                        
                        <label for=''>記号番号：　　　　　　</label>
                        <input name='number' class='form-item' type='text'><br><br>
                                                
                        <input class='form-btn'  style='float: right'type='submit' value='プロフィールを更新'>
                </form>
                <script >
                    var prefecture=Array('富山','石川','福井');
                    for (i=0;i<prefecture.length;i++){
                        option=document.createElement(\"option\");
                        option.innerText=prefecture[i];
                        document.getElementById('prefecture').appendChild(option);
                    }
                </script>
                <br><br>
                <div id ='main-table'></div>
                <button  class='form-btn' style='float: right' onclick='readTable()'>保存</button>

                <script>
                     var table = document.createElement('table');
                     table.id='table'
                     var date=new Date();
                     var today=date.getDate();
                     var month=date.getMonth();
                     var h3=document.createElement('h3');
                     h3.textContent='出勤可能な日時(クリックで〇に変更して保存ボタン)';
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
                                     th.textContent = today+j-1+'日';
                                }
                                tr.appendChild(th);
                                
                            } else {
                                var td = document.createElement('td');
                                if (j===0){
                                    td.textContent=parseInt(9+(i-1)/2)+':'+('0'+(i-1)%2*30).slice(-2);
                                }
                                else {
                                    const no=document.createElement('div');
                                    const yes=document.createElement('div');
                                    no.textContent='-';
                                    yes.textContent='〇';
                                    
                                    no.style.cssText='cursor:pointer;'
                                    yes.style.cssText='display:none;' +
                                     'cursor:pointer';
                                    
                                   no.onclick=function(){
                                        no.style.cssText='display:none';
                                        yes.style.cssText='display:block;cursor:pointer;';
                                    }
                                    yes.onclick=function(){
                                        yes.style.cssText='display:none';
                                        no.style.cssText='display:block;cursor:pointer;';
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
            <script>
                function readTable(){
                    var bom = new Uint8Array([0xEF, 0xBB, 0xBF]);//文字コードをBOM付きUTF-8に指定
                    var table = document.getElementById('table');//id=table1という要素を取得
                    var data_csv="";//ここに文字データとして値を格納していく

                    for(var i = 0;  i < table.rows.length; i++){
                        for(var j = 0; j < table.rows[i].cells.length; j++){
                            data_csv += table.rows[i].cells[j].innerText;//HTML中の表のセル値をdata_csvに格納
                            if(j === table.rows[i].cells.length-1){
                                data_csv += 'nn';
                            }
                            else {
                                data_csv += ",";
                            }//セル値の区切り文字として,を追加
                        }
                    }
                    var blob = new Blob([ bom, data_csv], { "type" : "text/csv" });//data_csvのデータをcsvとしてダウンロードする関数
                    $.ajax({
                        type:"post",
                        url:"save-schedule.php",
                        dataType:"json",
                        data:{data_csv:data_csv},
                    done:function (){
                        console.log("done");
                    },
                    fail:function (){
                        console.log('fail');
                    }
                });
                }
            </script>
        </div>
        <div id="student-page">
            <?php
            $prof2='no-image.jpg';
            $student_name='生徒アカウントはありません。';
            $stmt=$pdo->query("select * from students where mail='$mail'");
            foreach ($stmt as $row){
                $student_name=$row['name'];
                $student=$row['mail'];
                $passwd2=$row['passwd'];
                $prof2=$row['prof'];
                $student=$row['mail'];
            }
            echo ("
                    <div class='student-prof-parent'>
                        <img src='../../img/$prof2' alt='' class='student-prof'>
                        <label for='prof-form' class='prof-label'>
                            編集
                            <input type='file' id='prof-form' style='display:none;'>
                        </label> 
                                           
                    </div>
                    <script>
                        document.getElementById('prof-form').onchange=function (){
                            var student_prof=document.getElementById('prof-form').value;
                            $.ajax({
                                type:'post',
                                enctype:'multipart/form-data',
                                url:'edit-prof.php',
                                dataType:'json',
                                data:{
                                    student_prof:student_prof
                                },
                                processData: false,
                                contentType: false,
                                cache: false,
                                timeout: 600000,
                                done:function (){
                                    console.log('done')
                                },
                                fail:function (){
                                    console.log('fail')
                                }
                               
                            })
                        }
                    </script>
                    <br><br>
                    <form action=\"update-student.php\" method='post'>
                        <label for=''>ユーザー名：　　　　　　</label>
                        <input name='name' class='form-item' type='text' value=$student_name><br><br>
                        
                        <label for=''>メールアドレス：　　　　</label>
                        <input name='mail' class='form-item' type='text' value=$student><br><br>
                        
                        <label for=''>パスワード：　　　　　　</label>
                        <input name='passwd' class='form-item' type='password' value=$passwd2><br><br>
                        
                        <label for=''>パスワード（確認）：　　</label>
                        <input name='passwd2' class='form-item' type='password' value=$passwd2><br><br>
                        
                        <p>**メールアドレスとパスワードの変更はコーチアカウントと連動します。</p><br><br>
                        
                        <input class='form-btn' style='float: right' type='submit' value='プロフィールを更新'>

                    </form>
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

