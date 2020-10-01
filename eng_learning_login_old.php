<?php
session_start();
$title_name = "單字背誦王 登入系統" ;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	  
    <link rel="stylesheet" href="css/e_w3.css">
    <link rel="stylesheet" href="css/movepic.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">  
    <title><?php print $title_name?></title>
  </head>
  <body>
    <div class="takeup"><a href="#"><span class="oi oi-arrow-thick-top"> </span></a></div>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color:#355772;"><a class="navbar-brand" href="index.html"> <img class="d-inline-block align-top" src="images/phy_icon.png" width="30" height="30" alt="">   &nbsp;&nbsp;   *單字背誦王 登入系統*</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <!--導覽列生成位置-->
       
        </ul>
      </div>
     
      
    </nav>
    <div id="container">
<div id="sidebar">
<div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card mx-auto mt-5">
                    <div class="card-header">
                        <h3 align="center">單字背誦王 登入系統</h3>
                        <h5 align="center">English Learning King</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="eng_learning_login2.php">
                            <div class="form-group">
                                <label for="student_id">學號 Student ID</label>
                                <input type="text" class="form-control" name="username" placeholder="學號 Student ID" required>
                            </div>
                            <div class="form-group">
                                <label for="password">密碼 Password</label>
                                <input type="password" class="form-control" name="password" placeholder="密碼 Password" required>
                                <p class="text-muted">密碼預設為連絡電話。<br>Phone number is your default password.</p>
                            </div>
                            <p style="text-align: right;"><a href="/Member/login/forget_pwd.php"><i class="fa fa-refresh fa-fw"></i>忘記密碼 Forgot Password</a></p>

                            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-sign-in fa-fw"></i>登入 Login</button>
                        </form>
                    </div>
                </div>
                <br>
                                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    請先登入。<br>Login required.
                </div>
                            </div>

        </div>
      </div>
     
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </div>
  </body>
</html>