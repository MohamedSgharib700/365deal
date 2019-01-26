<?php
$mas ="";
include_once("../Classes/Post.class.php");
 if(isset($_POST['submit']))
 {
    $postA= new POST();
	$mas = $postA->SearchPost($_POST['RadioGroup1'],$_POST['searchword'],"Searchp.php") ; 
	 
 }


include_once("Header.php");
?>
<form enctype="multipart/form-data" action="Searchp.php" method="post" name="Search">
 <table align="center" >
 <tr>
 <th><h2> Search for posts </h2>
 <p>_____________________________</p> </th>
 </tr>
 
 <tr>
 <td>
   Search field effects :
   <p>
     <label>
       <input type="radio" name="RadioGroup1" value="subject_title" checked id="RadioGroup1_0">
      : Title </label>
     <br>
     <label>
       <input type="radio" name="RadioGroup1" value="Mdate" id="RadioGroup1_2">
      : Month </label>
     <br>
     <label>
       <input type="radio" name="RadioGroup1" value="Ydate" id="RadioGroup1_3">
      : Year </label>
     <br>
   </p></td>
 </tr>
 
 <tr>
 <td>
  Enter the search word : <input type="text" name="searchword" >
  <p> <input type="submit" name="submit" value="  Search  " > </p>
 </td>
 </tr>
 
 <tr>
 <td>
  <?=$mas?>
 </td>
 </tr>
 </table>
</form>

<?php
include_once("Foter.php");
?>