<?php
include_once("../Classes/Post.class.php");
$mas= ""; $postA= new POST(); $PkVal= "";
 
 if(isset($_GET['pkval']))
 {
   $postA->FindBySubject_id($_GET['pkval']);
   $PkVal= $_GET['pkval']; 
 }
 
 if(isset($_POST['_submit']))
 {
  if(empty($_POST['_title'])&& empty($_FILES['_image'])&& empty($_POST['_details']))
    $mas = "<font color='#FF0000'>Please enter the subject data. *</font>";

   else if(empty($_POST['_title']))
    $mas = "<font color='#FF0000'>Please enter the subject title. *</font>";
  
   else if(empty($_POST['_details']))
    $mas = "<font color='#FF0000'>Please enter the subject details. *</font>";

	else
	{
	if($_POST['_postID'] != "")
	{
	 $mas = $postA->UpdateP($_POST['_postID'],$_POST['_title'],$_POST['_details'],$_FILES['_image']);
	  $PkVal = $_POST['_postID'];
	  $postA->FindBySubject_id($PkVal);
	}
	 
    else 
	$mas = $postA->AddP($_POST['_title'],$_POST['_details'],$_FILES['_image']); 
	}
 }
	 
  

include_once("Header.php");
?>
<form enctype="multipart/form-data" action="AddPost.php" method="post" name="AddNewP">
 <input type="hidden" name="_postID" value="<?=$PkVal?>">
 <table width="505" height="297" border="0" align="center">
  <tr>
    <th height="54" colspan="3" scope="row"><h2>Add your new post here</h2>
    <p>_____________________________________</p></th>
  </tr>
  <tr>
    <th width="154" height="44" scope="row">Subject Title :</th>
    <td width="218"><input type="text" name="_title" value="<?=$postA->subject_title?>" ></td>
    <td width="119">&nbsp;</td>
  </tr>
  <tr>
    <th height="42" scope="row">Subject image :</th>
    <td><input type="file" name="_image" max="30000"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th height="45" scope="row">Subject details :</th>
    <td><textarea name="_details" cols="30" rows="7"><?=$postA->subject_detils?> </textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th height="33" colspan="3" scope="row"><?=$mas?></th>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <th height="37" scope="row"><input type="submit" name="_submit" value="  Save  "></th>
  </tr>
 </table>
</form>

<?php
include_once("Foter.php");
?>