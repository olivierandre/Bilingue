<?php 
	session_start();
	include("functions/model/insertData.php");
	include("functions/model/bdd.php");
	include("functions/createSaltToken.php");
	include("functions/fonc_control.php");
	include("functions/constant.php");
	include("functions/dateFr.php");

	$page = "home";
	$pageLogRegister = false;

	if (!empty($_GET['page'])) {
		$page = $_GET['page'];
	}
	
	if (function_exists($page)) {
		call_user_func($page);	
	}

?>