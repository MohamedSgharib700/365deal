<?php
include_once("../Classes/DB.class.php");
$mas= ""; $sqlArea= "";
if(!empty($_POST['_phrase']))
   $sqlArea = $_POST['_phrase'] ;
if(isset($_POST['_submit']))
   $mas = SearchGrid($_POST['_phrase']);




include_once("Header.php");
?>
<form  action="GeneralQuery.php" method="post" name="GeneralQuery" id="sendemail">
 <table width="100" height="200"  border="0" id="sendemail" align="center" >
  <tr>
    <th height="54" colspan="3" scope="row"><h2> Search for posts added :</h2>
    <p>_____________________________________</p></th>
  </tr>
  <tr>
    <th width="94" height="44" scope="row">Search phrase :</th>
    <td width="382"><textarea name="_phrase" cols="60" rows="4"> <?=$sqlArea?></textarea></td>
  </tr>
  <tr>
    <td> </td>
    <td> </td>
    <td width="72"><input type="submit" name="_submit" value="  Search  "></td>
  </tr>
  <tr>
    <td colspan="3"><?=$mas?></td>
  </tr>
 </table>
</form>

<?php
include_once("Foter.php");
?>