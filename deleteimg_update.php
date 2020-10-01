<?php
    session_start();
?>
<?php
    $wantTodelete = "upload/".$_SESSION['uploadedName'];
    if(file_exists($wantTodelete)){
            unlink($wantTodelete);//將檔案刪除
            print "已經刪除!<br>即將回到上傳頁面!";
            $_SESSION['uploadedName'] = "";
            $_SESSION['img_ready'] = false;?>
    <script>setTimeout("window.location.href='uploadimg_update.php'",3000);</script>
       <?php }else{
            echo"檔案不存在";
        }
?>        