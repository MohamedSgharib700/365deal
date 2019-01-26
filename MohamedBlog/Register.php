
<?php
$msg = ""; 
$name =""; $address =""; $gender =""; $email =""; $user =""; $phone =""; $old ="";

if ( isset($_POST['_submit'] ) )
{
 $name= $_POST['_name'];
 $address= $_POST['_address'];
 $gender= $_POST['_gender'];
 $email= $_POST['_email'];
 $user= $_POST['_username'];
 $phone= $_POST['_phone'];
 $old= $_POST['_old'];

if (empty($_POST['_name'])&& empty($_POST['_Email'])&& empty($_POST['_username'])&& empty($_POST['_password'])&&
empty( $_POST['_RePass']) )
 $msg = "<font color='#FF0000'>Please enter data in the fields. *</font>";
else if (empty($_POST['_name']))
 $msg = "<font color='#FF0000'>Please enter your name. *</font>";
else if (empty($_POST['_email']))
 $msg = "<font color='#FF0000'>Please enter the email. *</font>";
 else if (empty($_POST['_username']))
  $msg = "<font color='#FF0000'>Please enter your username. *</font>";
else if (empty($_POST['_password']))
 $msg = "<font color='#FF0000'>Please enter your password. *</font>";
else if ($_POST['_password'] != $_POST['_RePass'])
 $msg = "<font color='#FF0000'>Password mismatch try again. *</font>";
 
 else 
 {
	/*$db=new PDO('mysql:host=localhost;dbname=blog','root','');
$db->exec("INSERT INTO members VALUES('$_POST[_name]','$_POST[_address]','$_POST[_gender]','$_POST[_Email]','$_POST[_username]','$_POST[_password]','$_POST[_phone]','$_POST[_Old]')");*/ 
	mysql_connect("localhost","root","");
	mysql_select_db("blog");
	mysql_query("INSERT INTO members
	 VALUES ('$_POST[_name]','$_POST[_address]','$_POST[_gender]',
     '$_POST[_email]','$_POST[_username]','$_POST[_password]','$_POST[_phone]','$_POST[_old]')");
   if (mysql_errno() == 0)
    {
	  setcookie('user',$user);
	  header("Location:Index.php");	
		
	}
   
   else if(mysql_errno() == 1062)
    $msg = "Username is already used to try again";
	 
 }// else
} //end if submit
 
 
  






include_once("Header.php");
?>

<form action=" Register.php " method="post" name="Register">
  
<table width="437" height="513" border="0" align="center">
  
  <tr>
    <th colspan="3" scope="row"><h2>Register with us in the blog</h2>
      <p>____________________________________________</p></th>
      
    </tr>
    
    <tr>
    <th colspan="3" scope="row"> <h3><?= $msg  ?></h3> </th> 
    </tr>
        
    <tr>
    <th width="106" scope="row">Name :</th>
    <td width="177"><input name="_name" type="text" value="<?=$name?>"></td>
    <td width="140">  </td>
  </tr>
  <tr>
    <th scope="row">Address :</th>
    <td><input name="_address" type="text" value="<?=$address?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">Gender :</th>
    <td>
    <input  name="_gender" type="radio" value="M"     checked>Male 
    
    
    <input  name="_gender" type="radio" value="F">
    Female 
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">E_Mail :</th>
    <td><input name="_email" type="text" value="<?=$email?>"></td>
    <td>  </td>
  </tr>
  <tr>
    <th scope="row">User Name :</th>
    <td><input name="_username" type="text" value="<?=$user?>"></td>
    <td>  </td>
  </tr>
  <tr>
    <th scope="row">Password :</th>
    <td><input name="_password" type="Password"></td>
    <td>  </td>
  </tr>
  <tr>
    <th height="40" scope="row">RePassword :</th>
    <td><input name="_RePass" type="Password"></td>
    <td>  </td>
  </tr>
  <tr>
    <th scope="row">Phone :</th>
    <td><input name="_phone" type="text" value="<?=$phone?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">Old :</th>
    <td><input name="_old" type="text" value="<?=$old?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th height="46" scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td> <input name="_submit" type="submit" value="  Register  " /></td>
  </tr>
</table>

</form>

<?php

include_once("Foter.php");

?>



