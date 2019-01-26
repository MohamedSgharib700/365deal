<?php
include_once("DB.class.php");
include_once("Utility.php");
class COMMENT
{ 
var $CommentID ,$UserName ,$PostID ,$Comment ,$CommentDate ;

function AddC($Comment,$PostID)
{
	$histury = date("Y")."-".date("m")."-".date("d")." " .date("H").":".date("i").":".date("s");
	
	$query = "insert into comments(UserName ,PostID ,Comment ,CommentDate) 
	           values ('".CheckUserLogin()."',$PostID,'$Comment','$histury')";
	   mysql_query($query);
	   
	   $masg = ReturnMas("Comment Added");
	   return $masg ;
}


function RemoveC($CommentID)
{
  $query = "delete from comments where CommentID=$CommentID";
  mysql_query($query);
  return ReturnMas("Comment Removed");
}


function GetLastCommentID()
 {
	$query  ="select max(CommentID) from comments"; 
	$result =mysql_query($query);
	$row = mysql_fetch_row($result);
	return $row[0];
 }
 
  
  function SearchPost($field,$value,$Page,$cond="like")
   {
	 if($cond == "like")
	  $query = "select * from comments where $field like '%$value%'";
	 else
	  $query = "select * from comments where $field $cond '$value'"; 
	 return SearchGrid($query,true,"Index.php",true,$Page);  
   }
   
   
   function GetLinksLastsComments($cont=3)
   {
	 $query = "select * from comments order by CommentID desc limit $cont";
	 $result = mysql_query($query);
	 $links = "";
	 while($row = mysql_fetch_row($result))
	 {
	   $links.= "<li><a href='Index.php?subject_id=$row[0]'>$row[1]</a><br />
                   $row[3],$row[4],$row[5]</li>";	 
	 }
	 
	 return $links ;
   }
   
   function GetComments($subject_id)
   {
	 $query = "select * from comments where PostID =".$subject_id;  
	 $result= mysql_query($query);
	 $comment= "<table width=60%> <tr><td> <h2>Comments :</h2> </td></tr>";
	 while($row=mysql_fetch_row($result)) 
	 {
	   $comment.="<tr > <td>User : $row[1]>> $row[3] </td> <td valign='top'>";
	   if((CheckUserLogin()!= false) &&(CheckUserLogin()=="Gharib Admin") || (CheckUserLogin()==$row[1]))
	    $comment.= "<a href='Admin\Del.php?table=comments&PK=CommentID&pkval=$row[0]&Page=../Index.php?PostID=$subject_id&comments=true'> Remove </a>";
		$comment.="<br /> <br /> </td> </tr>";
	 }
	 if(CheckUserLogin()!=false)
	 {
	   $comment.="<tr><td> <form action='Index.php' method=get> 
	               <input type='hidden' name='action' value='addcomment' />
	              <input type='hidden' name=subject_id value=$subject_id /> 
	               <textarea name='comment' rows=3 cols=70> </textarea> <br /> 
				   <input type='submit' value=' Add Comment'/> </form> </td> <td></td> </tr>";	 
	 }
	 
	 return $comment.="</table>";
   }

}
?>