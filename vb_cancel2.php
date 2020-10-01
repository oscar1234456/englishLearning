<?php 
 session_start();

?>
<html>
    <head><title>單字背誦王-刪除單字</title></head>
<body>
<?php
       $file_name = $_SESSION['Id']."vbData.txt";
       $fp = fopen($file_name,'wb');
       $current_vb_count = 0;

       $now_vb = $_SESSION['now_vb'];

      if($now_vb[$_POST['update_vb']][3] != ""){
        $wantTodelete = "upload/".$now_vb[$_POST['update_vb']][3];
        unlink($wantTodelete);//將檔案刪除
     }
    

       unset($now_vb[$_POST['update_vb']]);

       foreach($now_vb as $i => $content){
          
            fwrite($fp,$content[0]."|".$content[1]."|".$content[2]."|".$content[3]."\n");
          
       }
      
       
       print "已刪除 1 個單字<br>";
       
       unset($_SESSION['uploadedName']);
       unset($_SESSION['img_ready']);
       ?>
          <script>
            function back_post(){
                form_back.method="get";
                form_back.action = "vb_cancel.php";
                form_back.submit();
            }
          </script>
          <form name="form_back">
            <input type="hidden">
          </form>
         <script type="text/javascript"> setTimeout("back_post()",3000)</script>
</body>    
</html>