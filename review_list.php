<?php 
    session_start();
?>
<html>
<head><title>單字背誦王-列表背誦學習</title></head>
    <script>
        function click_back_to_main(){
            var sure = window.confirm("您做好足夠的複習，確定要離開嗎?");
            if(!sure) return;
            window.location.href = "eng_learning.php";
        }

        function click_again(){
            form_again.method = "get";
            form_again.action = "review_list.php";
            form_again.submit();
        }

        function click_pic(){
            window.open("view_image.php", "newwindow", "height=400, width=500, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no");
            form_pic.method = "post";
            form_pic.action = "view_image.php";
            form_pic.submit();
        }
  
        function express(name1){
            window.open("view_image.php?file_pic="+name1, "newwindow", "height=400, width=500, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no");
        }

        function open_dic(name1){
            window.open("https://www.merriam-webster.com/dictionary/"+name1, "newwindow", "height=500, width=800, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no");
        }
    </script>
<body>
    <?php
        function handle_word_letter($sorted_array){
            $key_array = array_keys($sorted_array);
            $result_array = array();
            $tmp = "";
            foreach($key_array as $key_word){
                
                if(substr($key_word,0,1) != $tmp){
                    $tmp = substr($key_word,0,1);
                    print $tmp."<br>";
                    array_push($result_array,$tmp);
                }
            }
            return $result_array;
        }

        function handle_choose_key($choose,$sorted_array){
            $result_array = array();
           foreach($sorted_array as $key_word => $content){
               if(substr($key_word,0,1) == $choose){
                 array_push($result_array,$content);
               }
           }
           return $result_array;
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
        }
        ksort($now_vb);

        print "目前已建立".$current_vb_count."個單字<br>";?>
        <h4>您好，<?php print $_SESSION['username']; ?></h4>
        <br>
        歡迎選用列表背誦的複習方法
        <br>
        <br>
        <?php
                if($_SERVER['REQUEST_METHOD'] != 'POST'){?>
                    <form action="review_list.php" method="post">
                    請選擇您要背誦的字母開頭: 
                    <br>
                    <select name="choose"  required>
                        <option value="" selected>選擇字母開頭</option>
                        <?php 
                            $result_array = handle_word_letter($now_vb);
                            $result_count = count($result_array);
                            foreach($result_array as $key_word){
                                print "\n";
                        ?>
                            <option value="<?php print $key_word;?>"><?php print $key_word;?></option>
                        <?php }?>
                        <option value="all">全部都要</option>
                    </select>
                   
                    <input type="submit" value="查詢">
                    <input type="button" value="回到主頁面" onclick="click_back_to_main()">
                    </form>
            <?php }else{
                        print "以下為您 ".$_SESSION['username']." 的字庫中<br>";
                        if($_POST['choose'] == "all"){
                            print "全部的單字(以照字母順序排列)<br>";
                            print "<br><br><br><br><pre>英文單字&#9;&#9;詞性&#9;&#9;中文解釋</pre>";
                            ?>
                                
                            <?php
                            foreach($now_vb as $sub_array){
                                print "<pre>".$sub_array[0]."&#9;&#9;".$sub_array[1]."&#9;&#9;".$sub_array[2];?>
                                <br>
                                <input type="button" onclick = "express('<?php print $sub_array[3]; ?>')" value = <?php print $sub_array[0]."圖片"?>>
                                <br>
                                <input type="button" onclick = "open_dic('<?php print $sub_array[0]; ?>')" value = <?php print $sub_array[0]."字典釋義"?>>
                           <?php 
                                
                                print "</pre><br>";}
                            ?>
                            <?php
                        }else{
                            $result_array =  handle_choose_key($_POST['choose'],$now_vb);
                            print $_POST['choose']."字頭的單字<br><br>";
                            print "<br><br><br><br><pre>英文單字&#9;&#9;詞性&#9;&#9;中文解釋</pre>";
                            foreach($result_array as $sub_array){
                               print "<pre>".$sub_array[0]."&#9;&#9;".$sub_array[1]."&#9;&#9;".$sub_array[2];?>
                               <br>
                                <input type="button" onclick = "express('<?php print $sub_array[3]; ?>')" value = <?php print $sub_array[0]."圖片"?>>
                                <br>
                                <input type="button" onclick = "open_dic('<?php print $sub_array[0]; ?>')" value = <?php print $sub_array[0]."字典釋義"?>>
                           <?php 
                                    print "</pre><br>";}?>
                       <?php }
                        ?>
                        <form name="form_again">
                            <br>
                            <br>
                            <input type="button" value="回到查詢頁面" onclick="click_again()">
                        </form>
                <?php }?>
            


</body>
</html>