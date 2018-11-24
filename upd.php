<?php

session_start();
  if(array_key_exists("content",$_POST)){
	  
	  include("connection.php");
	  
	   $query = "UPDATE `stdiary` SET `diary` = 
'".mysqli_real_escape_string($link, $_POST['content'])."' WHERE `stdiary`.`id`=29 LIMIT 1";
        
        if(mysqli_query($link, $query)){
			echo "success";
		}
		else
		{
			echo "failed";
		}
	  
	  
  }
  
?>