<?php

    session_start();
    if (array_key_exists("content", $_POST)) {
        
        include("connection.php");
       // $query = "UPDATE `stdiary` SET `diary` = 
//'".mysqli_real_escape_string($link, $_POST['content'])."' WHERE id = 
//".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
   $id=$_SESSION['id'];     
   
   $sq = "SELECT * FROM stdiary WHERE id='$id'";
   
$query="UPDATE `stdiary` SET `diary` = '".mysqli_real_escape_string($link, $_POST['content'])."' WHERE `stdiary`.`id` = $id";		
	
        if(mysqli_query($link, $query)){
			echo "success";
		}
		else
		{
			echo "failed";
		}
        
    }

?>
