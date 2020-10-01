<?php 
 session_start();
?>
<html>
    <head><title>單字背誦王-複習單字選單</title></head>
    <body>
    <script>
        function click_search(){
            form_choose.method = "get";
            form_choose.action="review_run.php";
            form_choose.submit();
        }

        function click_back(){
            var sure = window.confirm("您確定要回到主選單嗎?");
            if(!sure) return;
            window.location.href='eng_learning.php';
        }

        function click_list(){
            form_choose.method = "get";
            form_choose.action="review_list.php";
            form_choose.submit();
        }
    </script>
        <?php
            if($_SERVER['REQUEST_METHOD'] != 'POST'){
                print "<h4>請您由主選單進入此系統，謝謝!</h4>";
                print "<br>3秒後為您重新導向!";?>
                <script>setTimeout("window.location.href='eng_learning.php'",3000); </script>
            <?php }else{
                print "<h4>您好，".$_SESSION['username']."<br> 請選擇您想要複習的方式:</h4>";
                ?>
                <form name="form_choose">
                <input type="button" value="查詢字庫學習法" onclick="click_search()">
                <br>
                <br>
                <input type="button" value="列表背誦學習" onclick="click_list()">
                <br>
                <br>
                <input type="button" value = "回到選單頁面" onclick="click_back()">
                <br>
                </form>
                
     <?php } ?>
    </body>
</html>