<?php
include_once("../Classes/DB.class.php");
if(isset($_GET['table'] ))
{
  $query ="Delete From $_GET[table] where $_GET[PK] = '$_GET[pkval]'";
  mysql_query($query);
  
 header("Location:$_GET[Page]");	

#echo $query ;	
	
}


?>