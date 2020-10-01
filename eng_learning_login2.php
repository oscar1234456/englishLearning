<?php
session_start();
?>
<html>
<head><title>login_test</title></head>
<body>

<?php if($_SERVER['REQUEST_METHOD'] == 'POST'){

try {
    $conn = new PDO("fill your DB info");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $conn -> query("select M_Name,passwords from Member where SId = ".$_POST['username'].";");
    $rows = $q -> fetchAll();
    if(count($rows)==0){
        print "查無此帳號!";
    }else{
     
        $username =  $rows[0][0];
        $password =  $rows[0][1];
        if($_POST['password'] == $password){
            $q2 = $conn->query("select Carde_Name from Member,Carde where ".$_POST['username']."= SId and SId = CSId;");
            $rows2 = $q2 -> fetchAll();
            if(count($rows2)!= 0){
                $Carde = $rows2[0][0];
                $_SESSION['Carde'] = $Carde;
                print $Carde.$username."您好!";
            }else{
                $_SESSION['Carde'] = '社員';
                print "社員".$username."您好!";
            }
            $_SESSION['username'] = $username;
            $_SESSION['Id'] = $_POST['username'];
            print "<br>"; 
            print "已登入完成";
    ?>
    <script type="text/javascript"> setTimeout("window.location.href='eng_learning.php'",3000); </script><?php
        }else{
            print "密碼不對喔!";
        }
        
    }
    
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}


}else{?>
    請至登入畫面進行登入!
    <br>
    正將您帶到登入畫面！
    <script type="text/javascript"> setTimeout("window.location.href='eng_learning_login.php'",3000); </script>
<?php }?>
</body>
</html>