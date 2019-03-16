<?php 
include("Login/config.php");
include('Login/class/userClass.php');
$userClass = new userClass();

$errorMsgReg='';
$errorMsgLogin='';
if (!empty($_POST['loginSubmit'])) 
{
$usernameEmail=$_POST['usernameEmail'];
$password=$_POST['password'];
 if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
   {
    $uid=$userClass->userLogin($usernameEmail,$password);
    if($uid)
    {
        $url=BASE_URL.'Login/inicio.php';
        header("Location: $url");
    }
    else
    {
        $errorMsgLogin="Revise sus credenciales de ingreso";
    }
   }
   else if (strlen(trim($usernameEmail))<1){
	   $errorMsgLogin="Por favor ingrese usuario o correo";
   }
   else if (strlen(trim($password))<1){
	   $errorMsgLogin="Por favor ingrese password";
   }
}

if (!empty($_POST['signupSubmit'])) 
{

	$username=$_POST['usernameReg'];
	$email=$_POST['emailReg'];
	$password=$_POST['passwordReg'];
    $name=$_POST['nameReg'];
	$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
	$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
	$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

	if($username_check && $email_check && $password_check && strlen(trim($name))>0) 
	{
    $uid=$userClass->userRegistration($username,$password,$email,$name);
    if($uid)
    {
    	$url=BASE_URL.'inicio.php';
    	header("Location: $url");
    }
    else
    {
      $errorMsgReg="Username or Email already exits.";
    }
    
	}

}

?>
<!DOCTYPE html>
<html>
<head>
<style>
.header {
  overflow: hidden;
  background-color: #999;
  padding: 20px 10px;
  font-family:Arial, Helvetica, sans-serif;
  opacity: 0.6;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}
.header p {
  float: right;
  font-family:Arial, Helvetica, sans-serif;
  size: 10px;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
.footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: #999;
  opacity: 0.6;
  text-align: center;
  font-family:Arial, Helvetica, sans-serif;
}
#container{width: 800px}
#login,#signup{width: 300px; border: 1px solid #d6d7da; padding: 0px 15px 15px 15px; border-radius: 5px;font-family: arial; line-height: 16px;color: #333333; font-size: 14px; background: #ffffff;rgba(200,200,200,0.7) 0 4px 10px -1px}
#login{float:right;}
#signup{float:right;}
h3{color:#365D98}
form label{font-weight: bold;}
form label, form input{display: block;margin-bottom: 5px;width: 90%}
form input{ border: solid 1px #666666;padding: 10px;border: solid 1px #BDC7D8; margin-bottom: 20px}
.button {
    background-color: #5fcf80 !important;
    border-color: #3ac162 !important;
    font-weight: bold;
    padding: 12px 15px;
    max-width: 100px;
    color: #ffffff;
}
.errorMsg{color: #cc0000;margin-bottom: 10px}
</style>
<body>
<div class="header">
  <a href="#default" class="logo">SAAP</a>
</div>
<div id="container">
<p>&nbsp;</p>
<div id="login">
<h3>Ingreso al sistema</h3>
<form method="post" action="" name="login">
<label>Usuario o correo</label>
<input type="text" name="usernameEmail" autocomplete="off" />
<label>Password</label>
<input type="password" name="password" autocomplete="off"/>
<div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
<input type="submit" class="button" name="loginSubmit" value="Ingresar">
</form>
</div>
</div>
<div class="footer">Software desarrollado por <strong>SAAP</strong>.</div>
</body>
</html>
