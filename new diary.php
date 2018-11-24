<?php

session_start();
$error="";

if(array_key_exists("logout",$_GET)){
	
	unset($_SESSION);
	setcookie("id","",time()-60*60);
	$_COOKIE["id"] = "";
}
else if((array_key_exists("id",$_SESSION) AND $_SESSION['id']) OR
(array_key_exists("id",$_COOKIE) AND $_COOKIE['id']))
{
	header("Location: loggedin.php");
}
 if(array_key_exists("submit", $_POST))
 {
	include("connection.php");
 	
    if(!$_POST['email'])
    {
    	$error.="email is required<br>";
    }
    if(!$_POST['password'])
    {
    	$error.="password is required<br>";
    }
    if($error!="")
    {
    	$error="<p>there are errors in form</p>".$error;
    }
    else
    {
    	if($_POST['signUp']=='1'){
		
		$query = "SELECT id FROM `stdiary` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
    	$result=mysqli_query($link,$query);
    	if(mysqli_num_rows($result)>0)
    	{
    		$error="that email address is already taken";
    	}
    	else
    	{
    		$query="INSERT INTO stdiary (email,password) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";
    		if(!mysqli_query($link,$query))
    		{
    			$error="<p> try again later";
    		}
    		else
    		{
				$p=mysqli_insert_id($link);
  $query = "UPDATE stdiary SET password ='".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";
				mysqli_query($link,$query);
				//$_SESSSION['id'] = mysqli_insert_id($link);
				//$p=$_SESSION['id'];
				/*if($_POST['stayloggedin'] == '1'){
					setcookie("id", mysqli_insert_id($link),time()+
					60*60*24*365);
				}*/
				header("Location: loggedin.php?id=".$p);
    		}
    	}
		}
		else
		{
			$query = "select * from stdiary where email = '".mysqli_real_escape_string($link,
			$_POST['email'])."'";
			$result = mysqli_query($link,$query);
			$row = mysqli_fetch_array($result);
			if(isset($row)){
				
				$hashedpassword = md5(md5($row['id']).$_POST['password']);
				if($hashedpassword == $row['password']){
					$_SESSION['id']=$row['id'];
					$p=$row['id'];
						if($_POST['stayloggedin'] == '1'){
					setcookie("id", $row['id'],time()+
					60*60*24*365);
				}
				header("Location: loggedin.php?id=".$p);
				
				}
				else
				{
					$error = "That email/password could not be find";
				}
			}
			else
			{
				$error = "That email/password could not be find";
			}
		}
    }
 }

?>
<?php
 if(!empty($error))
 { 
     echo $error; 
  } 
?>

<?php include("header.php"); ?>

  <div class="container" id="homepagecontainer">
  
    
  
    <h1>Secret diary</h1>
	  <p><strong>Store your thoughts permanently and securely.</strong></p>
<form method="post" id="signupform">
<p>Intersested? Sign up now.</p>
<fieldset class="form-group">
  <input class="form-control" type="email" name="email" placeholder="Your Email">
</fieldset>
<fieldset class="form-group">  
  <input class="form-control"type="password" name="password" placeholder="Password">
</fieldset>
<fieldset class="form-group">  
  <input type="checkbox" name="stayloggedin" value=1> Stay logged in
</fieldset>  
<fieldset class="form-group">
  <input type="hidden" name="signUp" value="1">
  <input class="btn btn-success" type="submit" name="submit" value="Sign Up!">
</fieldset>  
<p><a class="toggleForms">Log in</a></p>
</form>

<form method="post" id="loginform">
<p>Log in using your username and password.</p>
  <fieldset class="form-group">
  <input class="form-control"type="email" name="email" placeholder="Your Email">
  </fieldset>
  <fieldset class="form-group">
  <input class="form-control"type="password" name="password" placeholder="Password">
  </fieldset>
  <fieldset class="form-group">
  <input type="checkbox" name="stayloggedin" value=1> Stay logged in
  <input type="hidden" name="signUp" value="0">
  </fieldset>
  <fieldset class="form-group">
  <input class="btn btn-success"type="submit" name="submit" value="Log In!">
  </fieldset>
  <p><a class="toggleForms">Sign up</a></p>
</form>
  </div>
   
  <?php include("footer.php"); ?> 