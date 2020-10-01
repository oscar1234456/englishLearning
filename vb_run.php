<?php 
 session_start();
?>
<html>
    <head><title>單字背誦王-單字管理</title></head>
    <script>
        function add_vb(){
           
            vb_main.method = 'get';
            vb_main.action= 'eng_learning_first.php';
            vb_main.submit();
        }

        function update_vb(){
            window.location.href="vb_update.php";
        }

        function delete_vb(){
          
            vb_main.method = 'get';
            vb_main.action= 'vb_cancel.php';
            vb_main.submit();
        }

        function back_menu(){
            window.location.href="eng_learning.php";
        }
    </script>
<body>
    <?php
     print $_SESSION['username']." 您好，";
     print "<br> 歡迎進入 單字管理 頁面!";?>
     <form name="vb_main">
     <br>
     <input type="button" name="vb_fun" value="新增單字" onClick="add_vb()">
        <br>
        <br>
        <input type="button" name="start_run" value ="修改單字" onClick="update_vb()">
        <br>
        <br>
        <input type="button" name="review_run" value="刪除單字" onClick="delete_vb()">
        <br>
        <br>
        <input type="button" name="exit_run" value="回到主選單" onClick="back_menu()">

     </form>
     

</body>    
</html>