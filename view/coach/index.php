



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
            $intro=$row['intro'];


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
                    <h1>$name</h1>
                    <p class='intro'>$intro</p>
                </div>
                <form class='form' action='form.php' method='post'>
                    <input type='hidden' value=$mail name='mail'>
                    <input class='form-btn' type='submit' value='レンタル'>
                </form>
                <div id ='main-table'></div>
                
                <script>
                     var table = document.createElement('table');
                     var date=new Date();
                     var today=date.getDate();
                     var month=date.getMonth();
                     var h1=document.createElement('h1');
                     h1.textContent='一週間の予定';
                     document.getElementById('main-table').appendChild(h1);
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
                                    
                                    no.id='no'+'i'+'j';
                                    yes.id='yes'+'i'+'j';
                                    
                                    no.onclick=function toggle_no(){
                                                    document.getElementById('no').style.cssText='display:none';
                                                    document.getElementById('yes').style.cssText='display:block';
                                                }
                                    yes.onclick=function toggle_yes(){
                                                    document.getElementById('yes').style.cssText='display:none';
                                                    document.getElementById('no').style.cssText='display:block';
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
                
                <form class='form' action='form.php' method='post'>
                    <input type='hidden' value=$mail name='mail'>
                    <input class='form-btn' type='submit' value='レンタル'>
                </form>

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
