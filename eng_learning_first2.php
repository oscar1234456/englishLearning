<?php 
 session_start();

?>
<html>
    <head><title>單字背誦王-創建單字庫</title></head>
<body>
<?php
       $file_name = $_SESSION['Id']."vbData.txt";
       $fp = fopen($file_name,'ab+');
       $current_vb_count = 0;

        fwrite($fp,$_POST['vb_name']."|".$_POST['part_of']."|".$_POST['chinese']."|".$_SESSION['uploadedName']."\n");

       print "已新增 1 個單字<br>";
       
       unset($_SESSION['uploadedName']);
       unset($_SESSION['img_ready']);
       ?>
          <script>
            function back_post(){
                form_back.method="get";
                form_back.action = "eng_learning_first.php";
                form_back.submit();
            }
          </script>
          <form name="form_back">
            <input type="hidden">
          </form>
          <script type="text/javascript"> setTimeout("back_post()",3000)</script>
</body>    
</html>