<?php
$mas = ""; $user= "";
include_once("Classes/DB.class.php");
if(isset($_POST['_submit']))
{
	$user = $_POST['_username'];
  if(empty($_POST['_username']) && empty($_POST['_password']) ) 
  $mas = "<font color='#FF0000'>Please enter your username and password. *</font>";	
 else if(empty($_POST['_username']))
  $mas = "<font color='#FF0000'>Please enter your username. *</font>";
 else if(empty($_POST['_password']))
  $mas = "<font color='#FF0000'>Please enter your password. *</font>";	
else
 {
	$query = "select * from members where UserName = '$_POST[_username]' and Password = '$_POST[_password]'" ;
    $result= mysql_query($query);
	if(mysql_affected_rows() == 1)
	{
	  if(isset($_POST['_check']))
	     setcookie("user",$_POST['_username'],time() + 60*60*24*360);
		 
	  else
	  setcookie("user",$_POST['_username']);
	  
	  header("Location:Index.php");	
	}
	
	else
	$mas = "<font color='#FF0000'>You entered the username or password incorrectly. *</font>";
	
	 
	 
 }
	
	
	
	
}


include_once("Header.php");
?>
<form action="Login.php" method="post" > 
<table width="401" height="292" border="0" align="center" >
  <tr>
    <th height="66" colspan="3" scope="row"><h2>Enter your login data</h2>
      <p>_________________________________</p></th>
    </tr>
  <tr>
    <th width="104" height="56" scope="row">User Name :</th>
    <td width="151"><input type="text" name="_username" value="<?=$user?>"></td>
    <td width="124">&nbsp;</td>
  </tr>
  <tr>
    <th height="53" scope="row">Password :</th>
    <td><input type="password" name="_password"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th height="41" scope="row">Save the login :</th>
    <td>&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="_check"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th height="26" colspan="3" scope="row"><?=$mas?></th>
    </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td>&nbsp;</td>
    <th scope="row"><input type="submit" name="_submit" value="  Login  "></th>
  </tr>
</table>

</form>
<?php
include_once("Foter.php");
?>