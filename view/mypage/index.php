



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
                <form action=''>
                        <label for=''>ユーザー名：　　</label>
                        <input class='form-item'type='text' value='$coach_name' ><br><br>
                        
                        <label for=''>メールアドレス：</label>
                        <input class='form-item' type='text' value='$coach' ><br><br>
                        
                        <div>自己紹介：　　　</div>
                        <textarea class='form-area' name='' id='' cols='30' rows='10'>$intro</textarea><br><br>
                        
                        <div>経歴：　　　　　</div>
                        <textarea class='form-area' name='' id='' cols='30' rows='10'>$career</textarea><br><br>
                        
                        <label for=''>銀行名：　　　　</label>
                        <input class='form-item' type='text'><br><br>
                        
                        <label for=''>支店名：　　　　</label>
                        <input class='form-item' type='text'><br><br>
                        
                        <label for=''>記号番号：　　　</label>
                        <input class='form-item' type='text'><br><br>
                        
                        <input class='form-btn'  style='float: right'type='submit' value='プロフィールを更新'>
                </form>
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
                $prof2=$row['prof'];
                $student=$row['mail'];
            }
            echo ("<div class='student-prof-parent'>
                        <img src='../../img/$prof2' alt='' class='student-prof'>
                    </div>
                    <br><br>
                    <form action=\"\">
                        <label for=''>ユーザー名：　　　　</label>
                        <input class='form-item' type='text' value=$student_name><br><br>
                        
                        <label for=''>メールアドレス：　　</label>
                        <input class='form-item' type='text' value=$student><br><br>
                        
                        <label for=''>カード番号：　　　　</label>
                        <input class='form-item' type='text'><br><br>
                        
                        <label for=''>有効期限：　　　　　</label>
                        <input class='form-item' type='text'><br><br>
                        
                        <label for=''>セキュリティコード：</label>
                        <input class='form-item' type='text'><br><br>
                        
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

