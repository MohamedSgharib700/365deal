<?php
include_once("Classes\Post.class.php");
if(isset($_COOKIE['user']) && !empty($_COOKIE['user']))
echo "<p align=center><h2><font color='#00FF00'> Welcome $_COOKIE[user] . Login successful √ √ </font> </h2>
  <a href=Logout.php> [ Log out ] </a> </p> ";
  
  $showP = new POST();
  if(isset($_GET['subject_id']))
  {
   echo $showP->GetPost($_GET['subject_id']);
  
   if(isset($_GET['comments']))
   echo $showP->GetComments($_GET['subject_id']);
  }
  
  else
  echo $showP->GetPost($showP->GetLastPostID());
  echo $showP->GetPost($showP->GetOnePostID());
  
   
   
  if(isset($_GET['action']))
   if($_GET['action']=="addcomment")
   {
	 include_once("Classes\Comment.class.php");
	 
	 $comnt = new COMMENT();
	 $comnt->AddC($_GET['comment'],$_GET['subject_id']); 
	 header("Location:Index.php?subject_id=$_GET[subject_id]&comments=true");  
	 
   }
  
?>
         