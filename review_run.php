<?php 
 session_start();
?>
<html>
<head><title>單字背誦王-查詢字庫</title></head>
</html>
    <script>
        function click_back(){
            form_error.method = "get";
            form_error.action = "review_run.php";
            form_error.submit();
        }

        function click_again(){
            form_again.method = "get";
            form_again.action = "review_run.php";
            form_again.submit();
        }

        function click_back_to_main(){
            var sure = window.confirm("您做好足夠的複習，確定要離開嗎?");
            if(!sure) return;
            window.location.href = "eng_learning.php";
        }

        function open_dic(name1){
            window.open("https://www.merriam-webster.com/dictionary/"+name1, "newwindow", "height=500, width=800, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no");
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
            歡迎選用字庫查詢的複習方法
            <br>
            <br>
            <?php
                if($_SERVER['REQUEST_METHOD'] != 'POST'){?>
                    <form action="review_run.php" method="post">
                    請輸入您欲查詢的單字: 
                    <br>
                    <input type="text" name="wantTosearch" required>
                   
                    <input type="submit" value="查詢">
                    <input type="button" value="回到主頁面" onclick="click_back_to_main()">
                    </form>
            <?php }else{
                    if(!array_key_exists($_POST['wantTosearch'],$now_vb)){
                        print "此字不存在於您的字庫喔!";?>
                        <form name="form_error">
                            <input type="button" value="回到查詢頁面" onclick="click_back()">
                        </form>
                <?php }else{ ?>
                        英文單字: <input type="text" value="<?php print $now_vb[$_POST['wantTosearch']][0]?>" readonly>
                         <br>
                        詞性: <input type="text" value="<?php print  handle_part_of($now_vb[$_POST['wantTosearch']][1]);?>" readonly>
                        <br>
                        中文解釋: <input type="text" value="<?php print  $now_vb[$_POST['wantTosearch']][2];?>" readonly>
                        <br>
                        圖片: 
                        <br>
                        <img src="upload/<?php print $now_vb[$_POST['wantTosearch']][3] ?>" alt="">
                        <br>
                        <br>
                        <input type="button" onclick = "open_dic('<?php print $now_vb[$_POST['wantTosearch']][0]; ?>')" value = <?php print $now_vb[$_POST['wantTosearch']][0]."字典釋義"?>>
                        <br>
                        <br>
                        <form name="form_again">
                            <input type="button" value="回到查詢頁面" onclick="click_again()">
                        </form>
                   <?php }
                }?>
            
</body>


