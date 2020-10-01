<?php
session_start();
if(!isset($_SESSION['uploadedName'])){
    $_SESSION['uploadedName'] = "";
}

if(!isset($_SESSION['img_ready'])){
    $_SESSION['img_ready'] = false;
}
?>

<script language = javascript>
    function click_img_cancel(){
        var sure = window.confirm("您確定要刪除嗎?");
        if(sure){
            form_cancel.submit();
        }
    }
</script>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if($_FILES['file']['error']>0){
        echo "Error: ".$_FILES['file']['error'];?>
        <script type="text/javascript"> setTimeout("window.location.href='uploadimg.php'",3000)</script>
        <?php
    }else{
        if(file_exists("upload/".$_SESSION['Id']."_".$_FILES['file']['name'])){
            
            for(@$i=0;$i<=100;$i++){
                if(!file_exists("upload/".$_SESSION['Id']."_".$i."_".$_FILES['file']['name'])){
                    move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$_SESSION['Id']."_".$i."_".$_FILES['file']['name']);
                    print "上傳成功! 3秒後關閉視窗!";
                    $_SESSION['uploadedName'] = $_SESSION['Id']."_".$i."_".$_FILES['file']['name'];
                    $_SESSION['img_ready'] = true;
                    break;
                }
            }
            ?>
            
            <script>setTimeout("window.close()",3000);</script>
            <?php
        }else{
            move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$_SESSION['Id']."_".$_FILES['file']['name']);
            print "上傳成功! 3秒後關閉視窗!";
            $_SESSION['uploadedName'] = $_SESSION['Id']."_".$_FILES['file']['name'];
            $_SESSION['img_ready'] = true;
            ?>
            
            <script>setTimeout("window.close()",3000);</script>
            <?php
        }
    }
}else{
    if($_SESSION['img_ready'] === false){?>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        圖片上傳: <input type="file" name="file"  accept="image/*" id="file" /><br />
      
            <input type="submit" value="開始上傳">
        </form>
    <?php }else{
        print "您已上傳:".$_SESSION['uploadedName'];
        print "<br>圖片預覽:<br>"
        ?>
        <img src="<?php print "upload/".$_SESSION['uploadedName']?>" alt="">
        <form action="deleteimg.php" method="post" name="form_cancel">
            <input type="button" value="刪除圖片" onclick="click_img_cancel()">
        </form>
    <?php }
}?>