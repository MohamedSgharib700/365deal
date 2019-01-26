<?php
include_once("Classes/DB.class.php");
$masg=""; $name=""; $email=""; $message="";

if(isset($_POST['_submit']))
{
  $name= $_POST['_name'];
  $email= $_POST['_email'];
  $message= $_POST['_message'];
if(empty($_POST['_name']) && empty($_POST['_email']) && empty($_POST['_message']))
 $masg = "<font color='#FF0000'>Please enter data in the fields. *</font>";
else if(empty($_POST['_name']))
 $masg = "<font color='#FF0000'>Please enter your name. *</font>";
else if(empty($_POST['_email']))
 $masg = "<font color='#FF0000'>Please enter your email. *</font>";
else if(empty($_POST['_message']))
 $masg = "<font color='#FF0000'>Please enter your message. *</font>";

else
{
	
  mysql_query("insert into contactus (Name , Email , Massges)
            values('$_POST[_name]' , '$_POST[_email]' , '$_POST[_message]')");
   if (mysql_errno() == 0)
    $masg = "Your message was sent successfully √ √";
   else 
    $masg= mysql_error();
}

}

include_once("Header.php");
?>
<form action=" Contact.php " method="post" name="ContactUs">
  <table align="center" width="533" height="386" border="0">
  <tr>
    <th height="60" colspan="3" scope="row"><h2>Leave your message here :
        <hr /></h2></th>
    </tr>
  <tr>
    <th height="23" colspan="3" scope="row"><?=$masg?></th>
    </tr>
  <tr>
    <th width="78" scope="row">Name :</th>
    <td width="217"><input type="text" name="_name" value="<?=$name?>"></td>
    <td width="110">&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">Email :</th>
    <td><input type="text" name="_email" value="<?=$email?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th height="101" scope="row">Message :</th>
    <td><textarea name="_message" cols="30" rows="6"><?=$message?></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
     <th scope="row"><input type="submit" name="_submit" value="  Send  "/></th>
  </tr>
 </table>
</form>


<?php
include_once("Foter.php");
?>