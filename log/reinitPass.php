<?php
	if(!empty($_POST)) {
		session_start();
		$username = strip_tags($_POST['username']);
		$isSend = FALSE;
		$_SESSION['errorConnexion'] = "Vos données renseignées sont inconnues";

		if(empty($username)) {
			header('Location: ../log/lost.php');
			die();
		} else {
			include("../methodes/bdd.php");
			include("../methodes/methodes_username.php");

			$isMailExist = findMail(strtolower($username));

		} 

		if(!empty($isMailExist)) {
			$tokenUser = getToken($username);

			if($tokenUser) {
				include("../methodes/envoiMailReinit.php");
				$isSend = envoiMailReinit($isMailExist, $tokenUser);
			}
		} 

		if($isSend) {
			$_SESSION['errorConnexion'] = "Un mail de réinitialisation vient de vous être transmis";
		}

		header("Location: ../log/lost.php");
		die();		
	}
?>