<?php
session_start();
if(isset($_REQUEST['ref']))
{
	$ref=$_REQUEST['ref'];
	if($ref=="cpanel")
	{

session_unset();
session_destroy();
header("Location:admin.php");
	}
}
else
{

session_unset();
session_destroy();
header("Location:index.php");
}

?>