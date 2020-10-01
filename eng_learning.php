<?php 
 session_start();
?>
<html>
    <head><title>單字背誦王</title></head>
    <script language = javascript>
        //按下 單字管理 的反應
        function click_vb_run() {
            window.alert('您將進去單字管理!');
            main_form.method = 'post';
            main_form.action= 'vb_run.php';
            main_form.submit();
        }
        
        //按下 今日背誦 的反應
        function click_start_run(){
            window.alert('您將開始今日背誦!');
            main_form.method = 'post';
            main_form.action= 'start_run.php';
            main_form.submit();
        }

        //按下 複習單字 的反應
        function click_review_run(){
            window.alert('您將開始複習單字!');
            main_form.method = 'post';
            main_form.action= 'review_menu.php';
            main_form.submit();
        }

        //按下 離開程式 的反應
        function click_exit_run(){
            var sure = confirm('您將離開程式!');
            if(sure){
               main_form.method = 'post';
               main_form.action= 'eng_learning_logout.php';
               main_form.submit();
            }
        }

        //按下 登入 的反應
        function click_login_run(){
            window.alert('您將進入登入頁面');
            main_form.method = 'post';
            main_form.action= 'eng_learning_login.php';
            main_form.submit();
        }

         //按下 創建初始單字庫 的反應
         function click_makeFirst_run(){
            window.alert('您將進入創建單字庫頁面!');
            main_form.method = 'get';
            main_form.action= 'eng_learning_first.php';
            main_form.submit();
        }
    </script>
<body>
    <h4>歡迎進入英語背誦王!</h4>
    <form name=main_form>
    <?php
    if(!isset($_SESSION['username'])){
        print "訪客您好，請先登入授權者給予您的使用者帳號以及密碼!";
        print "<br><br>若您已忘記帳號密碼，請洽您的登入授權者!<br><br>";?>
        <input type="button" name="vb_fun" value="登入" onClick="click_login_run()">
       <?php
    }else{
        print "您好, ".$_SESSION['username'];
        print "<br>歡迎使用本程式<br>請選擇以下功能<br>";
        
        $file_name = $_SESSION['Id']."vbData.txt";
        @$fp  = fopen($file_name,'rb');
        
        if($fp === false){
            print "您尚未建立單字!";
            print "<br> 請先創建屬於自己的單字庫!<br><br>";?>
            <input type="button" name="make_first" value="創建第一個單字庫" onClick="click_makeFirst_run()">
        <?php }else{
        ?>
        <input type="button" name="vb_fun" value="單字管理" onClick="click_vb_run()">
        <br>
        <br>
        <input type="button" name="start_run" value ="開始今日背誦!" onClick="click_start_run()">
        <br>
        <br>
        <input type="button" name="review_run" value="複習單字" onClick="click_review_run()">
        <br>
        <br>
        <input type="button" name="exit_run" value="離開程式" onClick="click_exit_run()">
        <script>
            (function() {
                var cx = '010500787214983865572:u73ya19yhec';
                var gcse = document.createElement('script');
                gcse.type = 'text/javascript';
                gcse.async = true;
                gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(gcse, s);
            })();
        </script>
<gcse:search></gcse:search>
    <?php
        } 
    }?>
   
    </form>
</body>
</html>