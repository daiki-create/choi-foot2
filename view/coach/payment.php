



<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../../js/jquery.min.js"></script>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
</head>
<body>
<?php
include ('../../component/nav.php');
$date=$_POST['date'];
$time=$_POST['time'];
$util=$_POST['util'];
$content=$_POST['content'];
$mail=$_POST['mail'];
?>
<div class="main">
    <div class="left">
        <p>カード会社</p>
        <select name="" id="" class="form-item2">
            <option style="background-color: black" value="">選択してください</option>
            <option style="background-color: black" value="">VISA</option>
            <option style="background-color: black" value="">MASTER</option>
            <option style="background-color: black" value="">JCB</option>
            <option style="background-color: black" value="">Diners</option>
            <option style="background-color: black" value="">AMEX</option>
        </select>
        <p>カード番号</p>
        <input  class="cardnumber form-item2" size="4" maxlength="4" required="required" type="text" id="CreditcardCcNumber1"/> -
        <input  class="cardnumber form-item2" size="4" maxlength="4" required="required" type="text" id="CreditcardCcNumber2"/> -
        <input  class="cardnumber form-item2" size="4" maxlength="4" required="required" type="text" id="CreditcardCcNumber3"/> -
        <input  class="cardnumber form-item2" size="4" maxlength="4" required="required" type="text" id="CreditcardCcNumber4"/>
        <p>有効期限</p>
        <select name="" id="mm">
            <option value="">--</option>
        </select>/
        <select name="" id="yy">
            <option value="">--</option>
        </select>
        <script>
            var mm=document.getElementById('mm');
            var yy=document.getElementById('yy');
            var date=new Date();
            var current_year=date.getFullYear();
            for (i=0;i<12;i++){
                var mm_option=document.createElement('option');
                mm.appendChild(mm_option);
                mm_option.innerHTML=i+1;
                mm_option.value=i+1;
            }
            for (i=0;i<20;i++){
                var yy_option=document.createElement('option');
                yy.appendChild(yy_option);
                yy_option.innerHTML=current_year+i;
                yy_option.value=current_year+i;
            }
        </script>
        <p>名義人</p>
        <input  placeholder="YAMADA CHOITARO" class="form-item2" required="required" type="text" />
        <p>CVC</p>
        <input  class="form-item2" size="3" maxlength="3" required="required" type="text"/>
        <br><br><br>

        <script>
            $(function(){
                $('.cardnumber').bind('keyup',function(){
                    var thisValueLength = $(this).val().length;
                    if (thisValueLength >= 4) {
                        $(this).next().focus();
                    }
                });
            });
        </script>
        <form action='done.php' method="post">
            <?php
            echo ("<input type='hidden' value=$mail name='mail'>
                    <input type='hidden' value=$date name='date'>
                    <input type='hidden' value=$time name='time'>
                    <input type='hidden' value=$util name='util'>
                    <input type='hidden' value=$content name='content'>")
            ?>
            <input class="form-btn" type='submit' value='次へ'>
        </form>
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
