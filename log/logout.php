<?php
	unset($_COOKIE['staque']);
	setcookie('staque', "", 0, "/");

	session_destroy();
	unset($_SESSION);
	setcookie("PHPSESSID", "", 0, "/");

	header(PAGE_ACCUEIL);
	die();
?>