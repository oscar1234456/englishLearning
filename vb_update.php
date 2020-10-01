<?php 
 session_start();
 unset($_SESSION['uploadedName']);
 unset($_SESSION['img_ready']);
?>
<html>
<head><title>單字背誦王-修改單字</title></head>
</html>
    <script>
        function click_back(){
            form_error.method = "get";
            form_error.action = "vb_update.php";
            form_error.submit();
        }

        function click_again(){
            form_again.method = "get";
            form_again.action = "vb_run.php";
            form_again.submit();
        }

        function click_back_to_main(){
            window.location.href="vb_run.php";
        }

        function open_dic(name1){
            window.open("https://www.merriam-webster.com/dictionary/"+name1, "newwindow", "height=500, width=800, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no");
        }

        function click_img(){
            window.open("uploadimg_update.php", "newwindow", "height=400, width=500, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no");
        }
    </script>
<body>
    <?php
        function handle_part_of($convert){
            switch($convert){
                case "verb":
                    return "動詞";
                    break;
                case "noun":
                    return "名詞";
                    break;   
                case "adj":
                    return "形容詞";
                    break;
                case "prep":
                    return "介係詞";
                    break;
                case "adv":
                    return "副詞";
                    break;
                case "aux":
                    return "助詞";
                    break;  
            }               
        }
    ?>
    <?php

    $file_name = $_SESSION['Id']."vbData.txt";
            $fp = fopen($file_name,'rb');
            $current_vb_count = 0;
            $now_vb = array();
            while((!feof($fp))&&($line = fgets($fp))){
                $line = trim($line);
                $info = explode('|',$line);
                $current_vb_count++;
                $now_vb[$info[0]]= array($info[0],$info[1],$info[2],$info[3]);
                //print $info[0]." ".$info[1]." ".$info[2]." ".$info[3]."<br>";
            }
            ksort($now_vb);
            $_SESSION['now_vb'] = $now_vb;
                /*for($m=0;$m<4;$m++){
                    print $now_vb['make'][$m]." ";
                }*/
                /*foreach($now_vb as $word => $content){
                    foreach($content as $content_inside){
                        print $content_inside." ";
                    }
                    print "<br>";
                }*/
                
            
            print "目前已建立".$current_vb_count."個單字<br>";?>
            <h4>您好，<?php print $_SESSION['username']; ?></h4>
            <br>
            歡迎進入 修改單字 系統
            <br>
            <br>
            <?php
                if($_SERVER['REQUEST_METHOD'] != 'POST'){?>
                    <form action="vb_update.php" method="post">
                    請輸入您欲修改的單字: 
                    <br>
                    <input type="text" name="wantTosearch" required>
                   
                    <input type="submit" value="查詢">
                    <input type="button" value="回到單字管理頁面" onclick="click_back_to_main()">
                    </form>
            <?php }else{
                    if(!array_key_exists($_POST['wantTosearch'],$now_vb)){
                        print "此字不存在於您的字庫喔!";?>
                        <form name="form_error">
                            <input type="button" value="回到查詢頁面" onclick="click_back()">
                        </form>
                <?php }else{ ?>
                        <form action="vb_update2.php" method="post">
                        英文單字: <input type="text" name = "update_vb" value="<?php print $now_vb[$_POST['wantTosearch']][0]?>" required readonly>
                         <br>
                        詞性:  <select name="part_of">
                              
                                <option value="verb" <?php if($now_vb[$_POST['wantTosearch']][1] == 'verb') print 'selected'?>>動詞</option>
                                <option value="noun"<?php if($now_vb[$_POST['wantTosearch']][1] == 'noun') print 'selected'?>>名詞</option>
                                <option value="adj"<?php if($now_vb[$_POST['wantTosearch']][1] == 'adj') print 'selected'?>>形容詞</option>
                                <option value="prep"<?php if($now_vb[$_POST['wantTosearch']][1] == 'prep') print 'selected'?>>介係詞</option>
                                <option value="adv"<?php if($now_vb[$_POST['wantTosearch']][1] == 'adv') print 'selected'?>>副詞</option>
                                <option value="aux"<?php if($now_vb[$_POST['wantTosearch']][1] == 'aux') print 'selected'?>>助動詞</option></select>
                        <br>
                        中文解釋: <input type="text" name="update_ch" value="<?php print  $now_vb[$_POST['wantTosearch']][2];?>" required>
                        <br>
                       
                        <br>
                        <br>
                        <input type="button" onclick = "open_dic('<?php print $now_vb[$_POST['wantTosearch']][0]; ?>')" value = <?php print $now_vb[$_POST['wantTosearch']][0]."字典釋義"?>>
                        <br>
                        <br>
                        <input type="button" value="圖片上傳" name="uploadimg" onclick="click_img()">
                        <br>
                        <br>
                        <input type="submit" value="完成" name="uploadimg" onclick="">
                        <br>
                        <br>
                        <input type="reset" value="恢復原來資料" name="uploadimg" onclick="">
                        </form>
                        <?php 
                                if(!isset($_SESSION['uploadedName'])){
                                    $_SESSION['uploadedName'] = $now_vb[$_POST['wantTosearch']][3];
                                }

                                if(!isset($_SESSION['img_ready'])){
                                    $_SESSION['img_ready'] = true;
                                }
                                if($now_vb[$_POST['wantTosearch']][3]!=""){
                                    $_SESSION['uploadedName'] = $now_vb[$_POST['wantTosearch']][3];
                                    $_SESSION['img_ready'] = true;
                                }else{
                                    $_SESSION['uploadedName'] = "";
                                    $_SESSION['img_ready'] = false;
                                }
                                ?>
                      
                   <?php }
                }?>
            
</body>


