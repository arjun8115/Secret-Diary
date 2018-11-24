<?php
session_start();
if(array_key_exists("id",$_COOKIE)){
	$_SESSION['id'] = $_COOKIE['id'];
}

if(array_key_exists("id",$_SESSION)){
	echo "<p>Logged In! <a href='new diary.php?logout=1'>Log out</a></p>";
}
else{
header("Location: new diary.php");
}	
$id=$_GET['id'];
$_SESSION['id']=$id;
include("header.php");
?>

<div class="container-fluid">
  <textarea id="diary" class="form-control"></textarea>
  
</div> 

<?php
include("footer.php");

?>


