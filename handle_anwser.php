<?php 
 session_start();


?>
<html>
<head><title>單字背誦王-今日背誦</title></head>
</html>
    <script>
       function back_menu(){
           window.location.href = 'eng_learning.php';
       }

       function express(name1){
            window.open("view_image.php?file_pic="+name1, "newwindow", "height=400, width=500, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no");
        }

        function open_dic(name1){
            window.open("https://www.merriam-webster.com/dictionary/"+name1, "newwindow", "height=500, width=800, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no");
        }

        function back_quest(){
           window.location.href = 'start_run.php';
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
 if(!isset($_SESSION['Id'])){
    print "請先登入!<br> 即將為您導向";
    ?>
 
 <script>setTimeout("window.location.href='eng_learning.php'",2000); </script>
  
 <?php
 }else{
            
            
            //print "目前已建立".$current_vb_count."個單字<br>";?>
            <h4>您好，<?php print $_SESSION['username']; ?></h4>
            <br>
            歡迎來到 今日背誦 系統
            <br>
            <br>
            <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $now_vb  = $_SESSION['now_vb'];
                $anwser_quest = $_SESSION['answer_quest'];
                $choosed_vb = $_SESSION['choosed_vb'];
                if($anwser_quest == 1){
                    if($_POST['vb_anwser'] == $choosed_vb){
                        print "恭喜您答對了，總分累加10分！<br>";
                        $_SESSION['score'] += 10;
                        print "<br><br><br><br><pre>英文單字&#9;&#9;詞性&#9;&#9;中文解釋</pre>";
                        print "<pre>".$now_vb[$choosed_vb][0]."&#9;&#9;".$now_vb[$choosed_vb][1]."&#9;&#9;".$now_vb[$choosed_vb][2];?>
                        <br>
                        <input type="button" onclick = "express('<?php print $now_vb[$choosed_vb][3]; ?>')" value = <?php print $now_vb[$choosed_vb][0]."圖片"?>>
                        <br>
                        <input type="button" onclick = "open_dic('<?php print $now_vb[$choosed_vb][0]; ?>')" value = <?php print $now_vb[$choosed_vb][0]."字典釋義"?>>
                        <br>
                        <br>
                        <input type="button" onclick="back_quest()" value="繼續下一題">
                   <?php }else{
                       print "您答錯了，再接再勵！<br>";
                       print "<br><br><br><br><pre>英文單字&#9;&#9;詞性&#9;&#9;中文解釋</pre>";
                       print "<pre>".$now_vb[$choosed_vb][0]."&#9;&#9;".$now_vb[$choosed_vb][1]."&#9;&#9;".$now_vb[$choosed_vb][2];?>
                       <br>
                       <input type="button" onclick = "express('<?php print $now_vb[$choosed_vb][3]; ?>')" value = <?php print $now_vb[$choosed_vb][0]."圖片"?>>
                       <br>
                       <input type="button" onclick = "open_dic('<?php print $now_vb[$choosed_vb][0]; ?>')" value = <?php print $now_vb[$choosed_vb][0]."字典釋義"?>>
                       <br>
                       <br>
                       <input type="button" onclick="back_quest()" value="繼續下一題"> 
                    <?php   }
                }else if($anwser_quest == 2){
                    if($_POST['vb_anwser'] == $choosed_vb){
                        print "恭喜您答對了，總分累加10分！<br>";
                        $_SESSION['score'] += 10;
                        print "<br><br><br><br><pre>英文單字&#9;&#9;詞性&#9;&#9;中文解釋</pre>";
                        print "<pre>".$now_vb[$choosed_vb][0]."&#9;&#9;".$now_vb[$choosed_vb][1]."&#9;&#9;".$now_vb[$choosed_vb][2];?>
                        <br>
                        <input type="button" onclick = "express('<?php print $now_vb[$choosed_vb][3]; ?>')" value = <?php print $now_vb[$choosed_vb][0]."圖片"?>>
                        <br>
                        <input type="button" onclick = "open_dic('<?php print $now_vb[$choosed_vb][0]; ?>')" value = <?php print $now_vb[$choosed_vb][0]."字典釋義"?>>
                        <br>
                        <br>
                        <input type="button" onclick="back_quest()" value="繼續下一題">
                   <?php }else{
                       print "您答錯了，再接再勵！<br>";
                       print "<br><br><br><br><pre>英文單字&#9;&#9;詞性&#9;&#9;中文解釋</pre>";
                       print "<pre>".$now_vb[$choosed_vb][0]."&#9;&#9;".$now_vb[$choosed_vb][1]."&#9;&#9;".$now_vb[$choosed_vb][2];?>
                       <br>
                       <input type="button" onclick = "express('<?php print $now_vb[$choosed_vb][3]; ?>')" value = <?php print $now_vb[$choosed_vb][0]."圖片"?>>
                       <br>
                       <input type="button" onclick = "open_dic('<?php print $now_vb[$choosed_vb][0]; ?>')" value = <?php print $now_vb[$choosed_vb][0]."字典釋義"?>>
                       <br>
                       <br>
                       <input type="button" onclick="back_quest()" value="繼續下一題"> 

                <?php  }
                }else{
                    if($_POST['ch_anwser'] == $now_vb[$choosed_vb][2]){
                        print "恭喜您答對了，總分累加10分！<br>";
                        $_SESSION['score'] += 10;
                        print "<br><br><br><br><pre>英文單字&#9;&#9;詞性&#9;&#9;中文解釋</pre>";
                        print "<pre>".$now_vb[$choosed_vb][0]."&#9;&#9;".$now_vb[$choosed_vb][1]."&#9;&#9;".$now_vb[$choosed_vb][2];?>
                        <br>
                        <input type="button" onclick = "express('<?php print $now_vb[$choosed_vb][3]; ?>')" value = <?php print $now_vb[$choosed_vb][0]."圖片"?>>
                        <br>
                        <input type="button" onclick = "open_dic('<?php print $now_vb[$choosed_vb][0]; ?>')" value = <?php print $now_vb[$choosed_vb][0]."字典釋義"?>>
                        <br>
                        <br>
                        <input type="button" onclick="back_quest()" value="繼續下一題">
                   <?php }else{
                       print "您答錯了，再接再勵！<br>";
                       print "<br><br><br><br><pre>英文單字&#9;&#9;詞性&#9;&#9;中文解釋</pre>";
                       print "<pre>".$now_vb[$choosed_vb][0]."&#9;&#9;".$now_vb[$choosed_vb][1]."&#9;&#9;".$now_vb[$choosed_vb][2];?>
                       <br>
                       <input type="button" onclick = "express('<?php print $now_vb[$choosed_vb][3]; ?>')" value = <?php print $now_vb[$choosed_vb][0]."圖片"?>>
                       <br>
                       <input type="button" onclick = "open_dic('<?php print $now_vb[$choosed_vb][0]; ?>')" value = <?php print $now_vb[$choosed_vb][0]."字典釋義"?>>
                       <br>
                       <br>
                       <input type="button" onclick="back_quest()" value="繼續下一題"> 
                    <?php   }
                        
               }
            }else{
                print "請從選單開始進入！ 即將進行轉向";
                unset($_SESSION['count']);
                    unset($_SESSION['answer_quest']);
                    unset($_SESSION['score']);
                    unset($_SESSION['choosed_vb']); ?>

                <script> setTimeout('window.location.href="eng_learning.php"',2000)</script>

            <?php }
            

        
    }  ?> 
</body>