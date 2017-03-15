<?php 
require_once("../include/initialize.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sr" lang="sr">
<head>
<title>Cenus</title>
<meta http-equiv="Content-Type" content="text/xml; charset=utf-8"/>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<!--<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    
<!-- bootstrap -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="app/login.js"></script>
</head>

<?php 
    
if (isset($_POST['submit'])){
    
    $found_admin = Administrator::authenticate($_POST['username'], $_POST['password']);
    
    if ($found_admin){
        $session->login($found_admin);
        header("Location: manage_admins.php");
        exit;
    }
    
}    
    
    
?>
    
    
    
<body>
    <style>
@import url(http://fonts.googleapis.com/css?family=Roboto:400);
body {
  background-color:#fff;
  -webkit-font-smoothing: antialiased;
  font: normal 14px Roboto,arial,sans-serif;
}

.container {
    padding: 25px;
    position: fixed;
}

.form-login {
    background-color: #EDEDED;
    padding-top: 10px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 15px;
    border-color:#d2d2d2;
    border-width: 5px;
    box-shadow:0 1px 0 #cfcfcf;
}

h4 { 
 border:0 solid #fff; 
 border-bottom-width:1px;
 padding-bottom:10px;
 text-align: center;
}

.form-control {
    border-radius: 10px;
}

.wrapper {
    text-align: center;
}

</style>
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
            <h4>Dobrodosli...</h4>
            <form action="login.php" method="post">
                <input type="text" id="username" name="username"class="form-control input-sm chat-input" placeholder="username" />
                <br/>
                <input type="text" id="password" name="password" class="form-control input-sm chat-input" placeholder="password" />
                <br/>
                <div class="wrapper">
                    <span class="group-btn">     
                        <input type="submit" name="submit" value="Uloguj se" class="btn btn-primary btn-md">
                    </span>
                </div>
            </form>
                
            </div>
            </div>
        
        </div>
    </div>
</div>
</body>
