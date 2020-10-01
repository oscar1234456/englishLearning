<?php 
 session_start();
 unset($_SESSION['uploadedName']);
 unset($_SESSION['img_ready']);

 if(!isset($_SESSION['answer_quest'])){
    $_SESSION['answer_quest'] = 1;
 }

 if(!isset($_SESSION['count'])){
    $_SESSION['count'] = 0;
 }
 if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
 }
 if(!isset($_SESSION['choosed_vb'])){
    $_SESSION['choosed_vb'] = "";
 }
?>
<html>
<head><title>單字背誦王-今日背誦</title></head>
</html>
    <script>
       function back_menu(){
           window.location.href = 'eng_learning.php';
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

        function problem1($vb_data){
            $choosed_vb = array_rand($vb_data);
            $_SESSION['choosed_vb'] = $choosed_vb;
            print "<form action='handle_anwser.php' method='post'>請輸入此單字:<input type='text' name='vb_anwser' >"."<br>"."詞性: ".handle_part_of($vb_data[$choosed_vb][1])."<br>"."中文: ".$vb_data[$choosed_vb][2]."<br><br><input type='submit' name='vb' value= '送出答案' >"."</form>";
        }

        function problem2($vb_data){
            $choosed_vb = array_rand($vb_data);
            $_SESSION['choosed_vb'] = $choosed_vb;
            print "<br><img src='upload/".$vb_data[$choosed_vb][3]."'width = 500px alt=''> <br>";
            print "<form action='handle_anwser.php' method='post'>請看圖輸入此單字:<input type='text' name='vb_anwser' >"."<br><br><input type='submit' name='vb' value= '送出答案' >"."</form>";
            
        }

        function problem3($vb_data){
            $choosed_vb = array_rand($vb_data);
            $_SESSION['choosed_vb'] = $choosed_vb;
            print "<form action='handle_anwser.php' method='post'>單字: ".$vb_data[$choosed_vb][0]."<br>"."詞性: ".handle_part_of($vb_data[$choosed_vb][1])."<br>"."請輸入此中文: "."<input type='text' name='ch_anwser' >"."<br><br><input type='submit' name='vb' value= '送出答案' >"."</form>";
            
        }

        
    ?>
    
    <?php
 if(!isset($_SESSION['Id'])){
    print "請先登入!<br> 即將為您導向";
    ?>
 
 <script>setTimeout("window.location.href='eng_learning.php'",2000); </script>
  
 <?php
 }else{
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
            $_SESSION['now_vb'] = $now_vb;
            
            
            print "目前已建立".$current_vb_count."個單字<br>";?>
            <h4>您好，<?php print $_SESSION['username']; ?></h4>
            <br>
            歡迎來到 今日背誦 系統
            <br>
            <br>
            <?php
            if( $current_vb_count<5){
                print "<p><b>請先將您的字庫充滿到5個以上<br>再使用本服務進行遊戲呦!</b></p>";
            }else{
                if($_SESSION['count'] == 5){

                    print "恭喜完成今日訓練！<br><br>";
                    print "總分： ".$_SESSION['score']."<br>";
                    print "<input type='button' onclick='back_menu()' value='回到主選單'>";

                    unset($_SESSION['count']);
                    unset($_SESSION['answer_quest']);
                    unset($_SESSION['score']);
                    unset($_SESSION['choosed_vb']);
                    
                }else{
                    $choose_quest = rand(1,3);
                    $_SESSION['count'] ++;
                    print "回合：".$_SESSION['count']."/5";
                    print "<br>累積分數：".$_SESSION['score']."<br><br><br>";
                    if($choose_quest == 1){
                        $_SESSION['answer_quest'] = 1;
                        problem1($now_vb);
                    }else if($choose_quest == 2){
                        $_SESSION['answer_quest'] = 2;
                        problem2($now_vb);
                    }else{
                        $_SESSION['answer_quest'] = 3;
                        problem3($now_vb);
                    }
                }
                
                
            }
    }  ?> 
</body>