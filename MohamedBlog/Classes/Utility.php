<?php
function CheckUserLogin()
{
if(isset($_COOKIE['user']) && !empty($_COOKIE['user']))
   return $_COOKIE['user'] ;

else
   return false ;
}

function UploadFile($File , $PathFile)
{
  if($File['tmp_name'] != "none")
	   {
		move_uploaded_file($File['tmp_name'],$_SERVER['DOCUMENT_ROOT']."\\MohamedBlog\\".$PathFile );             
        return "<font color='#00FF00'>File uploaded successfully</font>";
	   }
		else
		 return "File too large or no file";
		    
}

?>