<link href="component.css" rel="stylesheet" type="text/css">
<?php



require_once("dbcontroller.php");
$db_handle= new DBController();

if(!empty($_POST["username"])){

	$result=mysql_query("select count(*) from details where username='".$_POST["username"]."'");
    $row=mysql_fetch_row($result);
	$user_count=$row[0];
	if($user_count>0)
	{echo "<span class='notavail' style='color:red;font-weight:bold;'>Username Not Available.</span> ";
	}
	else{ echo "<span class='avail' style='color:green;font-weight:bold;'>Username Available.</span>";
	}
}
else{
	echo "<span class='req' style='color:red;font-weight:bold;'>Choose a Username</span>";
}



?>