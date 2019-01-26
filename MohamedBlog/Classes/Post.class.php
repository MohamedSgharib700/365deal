<?php
include_once("DB.class.php");
include_once("Utility.php");
class POST
{ 
var $subject_id ,  $subject_title , $subject_detils ; 
var $Ddate , $Mdate , $Ydate , $subject_Imag ; 

function AddP($subject_title , $subject_detils,$File)
{
	$query = "insert into posts(subject_title,subject_detils,Ddate,Mdate,Ydate) 
	           values ('$subject_title','$subject_detils',". date("d"). ",'".date("F")."'," .date("Y").")";
	   mysql_query($query);
	   $this -> subject_id=$this->GetLastPostID() ;
	   $this->FindBySubject_id($this->subject_id);
	   $masg = ReturnMas("<font color='#00FF00'>Post Added</font>");
	   $masg .= "<br />".$this->UploadImage($File);
	   return $masg ;
}

function UpdateP($subject_id ,  $subject_title , $subject_detils,$File)
{
	$query = "update posts set subject_title='$subject_title' , subject_detils='$subject_detils'
	           where subject_id=$subject_id";
     mysql_query($query);
	 $this -> subject_id=$subject_id ;
	 $masg = ReturnMas("<font color='#00FF00'>Post updated</font>");
	 $masg .= "<br />".$this->UploadImage($File);
	 return $masg ;
}

function RemoveP($subject_id)
{
  $query = "delete from posts where subject_id=$subject_id";
  mysql_query($query);
  return ReturnMas("Post Removed");
}

function UploadImage($File)
	{
	  return UploadFile($File , "PostImages/".$this->subject_id.".jpg");	
	}

function GetLastPostID()
 {
	$query  ="select max(subject_id) from posts"; 
	$result =mysql_query($query);
	$row = mysql_fetch_row($result);
	return $row[0];
 }
 
 function GetOnePostID()
 {
	$query  ="select MIN(subject_id) from posts"; 
	$result =mysql_query($query);
	$row = mysql_fetch_row($result);
	return $row[0];
 }
 
 function FindBySubject_id($subject_id)
  {
	$query = "select * from posts where subject_id = $subject_id";
	$result= mysql_query($query);
	$row= mysql_fetch_row($result);
	$this->subject_id=$row[0];
	$this->subject_title=$row[1];
	$this->subject_detils=$row[2];
	$this->Ddate=$row[3];
	$this->Mdate=$row[4];
	$this->Ydate=$row[5];
	$this->subject_Imag="PostImages/".$row[0].".jpg";  
  }
  
  function SearchPost($field,$value,$Page,$cond="like")
   {
	 if($cond == "like")
	  $query = "select subject_id,subject_title,Ddate,Mdate,Ydate from posts where $field like '%$value%'";
	 else
	  $query = "select subject_id,subject_title,Ddate,Mdate,Ydate from posts where $field $cond '$value'"; 
	 return SearchGrid($query,true,"AddPost.php",true,$Page);  
   }
   
   function GetPost($subject_id)
   {
	  $this->FindBySubject_id($subject_id); 
	  
	  $html = " <p><span class='date'>$this->Ddate,$this->Mdate,$this->Ydate</span>Posted Number : $this->subject_id</p>
          <h2><span>$this->subject_title</span></h2>
          <div class='clr'></div>
          <img src=$this->subject_Imag width='600' height='400' alt='' />
          <p>$this->subject_detils</p>";
          
		    include_once("Utility.php");
			 if(CheckUserLogin() != false && $_COOKIE['user'] == "Gharib Admin")
			 {
			 $html.= "<a href='Admin/AddPost.php?pkval=$this->subject_id'>[ Edit </a> || 
		<a href='Admin/Del.php?table=posts&PK=subject_id&pkval=$this->subject_id&Page=../Index.php'> Remove ]</a>
		 <p class='spec'><a href='Index.php?subject_id=$subject_id&comments=true' class='rm'>Read more &raquo;</a></p> ";
			 }
			 $html.="<p class='spec'><a href='Index.php?subject_id=$subject_id&comments=true' class='rm'>Read more &raquo;</a></p> ";
		  
      
	   return $html;
   }
   
   function GetLinksLastsPosts($cont)
   {
	 $query = "select * from posts order by subject_id desc limit $cont";
	 $result = mysql_query($query);
	 $links = "";
	 while($row = mysql_fetch_row($result))
	 {
	   $links.= "<li><a href='Index.php?subject_id=$row[0]'>- $row[1]</a><br />
                   $row[3],$row[4],$row[5]</li>";	 
	 }
	 
	 return $links ;
   }
   
   function GetComments($subject_id)
   {
	 $query = "select * from comments where PostID =".$subject_id;  
	 $result= mysql_query($query);
	 $comment= "<table width=60%> <tr><td> <h2>Comments : <hr /></h2> </td></tr>";
	 while($row = mysql_fetch_row($result)) 
	 {
	   $comment.="<tr > <td>User : $row[1]>> $row[3] </td> <td valign='top'>";
	   if((CheckUserLogin()!= false) &&(CheckUserLogin()=="Gharib Admin") || (CheckUserLogin()==$row[1]))
	    $comment.="<a href='Admin\Del.php?table=comments&PK=CommentID&pkval=$row[0]&Page=../Index.php?PostID=$subject_id&comments=true'> Remove </a>";
		$comment.="<br /> <br /> </td> </tr>";
	 }
	 if(CheckUserLogin()!=false)
	 {
		 
	   $comment.="<tr> <td> <form action='Index.php' method=get>
	              <input type='hidden' name='action' value='addcomment'/>
				  <input type='hidden' name=subject_id value=$subject_id />
				<textarea name='comment' rows=3 cols=70></textarea> <br /> 
				   <input type='submit' value=' Add Comment'/> </form> </td>
				    <td></td> </tr>";	 
	 }
	 
	 return $comment.="</table>";
	 
   }

}
?>