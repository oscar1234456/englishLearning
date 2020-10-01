<?php 
 session_start();
 unset($_SESSION['uploadedName']);
 unset($_SESSION['img_ready']);

?>
<html>
    <head><title>單字背誦王-新增單字</title></head>
    <script language="javascript">
        function click_img(){
            window.open("uploadimg.php", "newwindow", "height=400, width=500, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no");
        }

        function back_word(){
           window.location.href='eng_learning.php';
        }

        function back_word_manage(){
            window.location.href='vb_run.php';
        }
    </script>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
        print $_SESSION['username']." 您好，";
        print "<br> <br>";
        $file_name = $_SESSION['Id']."vbData.txt";
        $fp = fopen($file_name,'ab+');
        $current_vb_count = 0;
        while((!feof($fp))&&($line = fgets($fp))){
            $line = trim($line);
            $info = explode('|',$line);
            $current_vb_count++;
        }
        print "目前已建立".$current_vb_count."個單字<br>";
        ?>
        
        <form action="eng_learning_first2.php" method="post" enctype="multipart/form-data">
            <br>
            <br>
            英文單字:<input type="text" name="vb_name" required>
            <br>
            <br>
            詞性: <select name="part_of">
                <option value="verb">動詞</option>
                <option value="noun">名詞</option>
                <option value="adj">形容詞</option>
                <option value="prep">介係詞</option>
                <option value="adv">副詞</option>
                <option value="aux">助動詞</option></select>
            <br>
            <br>
            中文解釋: <input type="text" name="chinese" required>  
            <br>
            <br>
        
            <input type="button" value="圖片上傳" name="uploadimg" onclick="click_img()">
            
           
            <br>
            <br>
            <input type="submit" name="submit" value="新增單字" />
            <input type="button" name="back" onclick="back_word()" value="回到主畫面">
            <input type="button" name="exit_run" value="回到單字管理選單" onClick="back_word_manage()">
        </form>
        
    <?php }else{
         print "<h4>請您由主選單進入此系統，謝謝!</h4>";
         print "<br>3秒後為您重新導向!";?>
         <script>setTimeout("window.location.href='eng_learning.php'",3000); </script>   
        
   <?php }?>


</body>    
</html>