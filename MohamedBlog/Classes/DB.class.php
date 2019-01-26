<?php
include_once("Utility.php");
mysql_connect("localhost","root","");
	mysql_select_db("blog");
	
function ReturnMas($mass)
{
  if(mysql_errno()==0)
	   return $mass."<font color='#00FF00'> Successfully </font>";
   else
       return "Unable to execute this command because:". mysql_error();
}

function SearchGrid($query,$UpdateOk=false,$EditPage="",$RemoveOk=false,$ReturnPage="")
{
	$tbl="<script>
	       var prev = 1;
		   function HighLighRow(rcolor){
			 if(rcolor%2==0)
			   TblSearch.rows[prev].bgColor='#FFCC66';
			 else
			   TblSearch.rows[prev].bgColor='#FF9933';
			   
			 TblSearch.rows[rcolor].bgColor='#33FF99';
			 prev = rcolor;    
		   }
	       </script>";
	
  $result = mysql_query($query);
  $tbl.="<table id=TblSearch border=0 align=center > <tr bgcolor=black> ";
  $rowNum = mysql_num_fields($result);
  for($col = 0; $col<$rowNum; $col++)
  $tbl.="\n <th> <font color=white>". mysql_field_name($result,$col)."</font> </th>";
  //U.R
  if($UpdateOk)
   $tbl.="\n <th> <font color=white>Edit</font> </th>";
  if($RemoveOk)
   $tbl.="\n <th> <font color=white>Remove</font> </th>";
   //
  $tbl.="\n </tr>";
  
  $rcolor= 1;
  while($rows = mysql_fetch_row($result))
   {
	$tbl.="<tr onmousemove=\"HighLighRow($rcolor)\" bgcolor=";
	 if ($rcolor %2 == 0)
	   $tbl.= "#FFCC66>"; 
	 else
	   $tbl.="#FF9933>";
	 $rcolor ++;
	for($col=0; $col<$rowNum; $col++)
	{
	 $tbl.="\n <td><font color=white> $rows[$col] </font></td>";
	  $flags =mysql_field_flags($result,$col);
	  if(strpos($flags,"primary_key"))
	    $PkCol = $col ; 
	}
	 if($UpdateOk)
	  {
		 $tbl.="\n <td> <a href=$EditPage?pkval=$rows[$PkCol]>
		        <img src='../images\_Edit.png' />
			   </a> </td>";
	  }
	 if($RemoveOk)
	  {
		$table = mysql_field_table($result,0);
		$PkName= mysql_field_name($result,$PkCol);
		 
		$tbl.="\n <td> <a href=Del.php?table=$table&PK=$PkName&pkval=$rows[$PkCol]&Page=$ReturnPage>
		        <img src='../images\_Remove.png' />
			   </a> </td>";
	  }
	$tbl.="</tr>";
   }
    if(mysql_errno()==0)
       return $tbl.= "</table>";
	else
	   return "Error >>". mysql_error();
 
}

?>