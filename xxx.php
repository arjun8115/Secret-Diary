<?php
  $mysql_host='localhost';
$mysql_user='AJ';
$mysql_password='SACHIN@321m';
$link=mysqli_connect($mysql_host,$mysql_user,$mysql_password,'student');
if(!$link)
{
	echo "Database connection error";
}
else
{
  $query= "UPDATE 'stdiary' SET diary="ashhdbhhdljj" WHERE id=1;"
  if(mysqli_query($link,$query)
  {
    echo "success";
  }
else
{
	echo "fuck";
}
}	
?>