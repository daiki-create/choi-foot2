



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
    <link rel="stylesheet" href="../../css/540.css" media="screen and (max-width:540px)">
    <link rel="stylesheet" href="../../css/320.css" media="screen and (max-width:320px)">
    <meta name="google-signin-client_id" content="306983217223-8ku9u1grr7s2g0tsmv1efcppkrpfrrqi.apps.googleusercontent.com">

</head>
<body>
<?php
include ('../../component/nav.php');
?>
<div class="main">
    <div class="left">
        <?php
        echo htmlentities($_GET['error']);
        ?>
        <br>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <form class="form" action="check_pass.php" method="post">
            <input class="form-item" type="email" name="mail" placeholder="メールアドレス" maxlength="100" minlength="3"><br><br>
            <input class="form-item" type="password" name="passwd" placeholder="パスワード"maxlength="20" minlength="4"><br><br>
            <input class="form-btn" type="submit" value="ログイン"><br><br>
            <div  class="g-signin2" style="margin-left:calc(50% - 60px);border-radius: 10px" data-onsuccess="onSignIn"></div>
            <p style="margin: auto;">Googleアカウントでログイン</p><br><br><br>

            <script>
                function onSignIn(googleUser) {

                    // トークンの取得（サーバーにはこちらを送信）
                    var id_token = googleUser.getAuthResponse().id_token;

                    // 接続を解除して、2回目以降の自動ログインを防止
                    var auth2 = gapi.auth2.getAuthInstance();
                    auth2.disconnect();

                    // 5.サーバへ送信
                    var xhr = new XMLHttpRequest();

                    // open()で指定するのは、サーバ側のURL
                    xhr.open('POST', 'post_auth.php');
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                    // 処理が終わった後に呼ばれるコールバック
                    xhr.onload = function() {
                        if(xhr.readyState == 4 && xhr.status == 200){
                            // ログイン完了後にリダイレクト
                            window.location.href = 'https://choi-foot.com/index.php';
                        }
                        else{
                            console.log('エラー');
                        }
                    };
                    xhr.send('idtoken=' + id_token);
                }
            </script>

            <?php
            session_start();
            date_default_timezone_set('Asia/Tokyo');

            require_once '../../vendor/autoload.php';

            $fb = new Facebook\Facebook([
                'app_id' => 'アプリID',
                'app_secret' => 'App Secret',
                'default_graph_version' => 'v2.7'
            ]);

            $helper = $fb->getRedirectLoginHelper();

            $scope = ['public_profile'];
            $link = $helper->getLoginUrl( 'https://gray-code.com/fb/callback.php', $scope);
            ?>
            <a href="<?php echo htmlspecialchars($link); ?>">Login</a>

            <div class="make-new-nav">アカウントをお持ちでない方</div>
            <div class="make-new-parent">
                <a class="make-new" href="../use/index.php" style="color: gold"><生徒アカウントを作成></生徒アカウントを作成></a>
            </div>
            <div class="make-new-parent">
                <a class="make-new" href="../recruit/index.php" style="color: coral"><コーチアカウントを作成></コーチアカウントを作成></a>
            </div>
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

