<?php
	session_start();
	$title = "Réinitialisation mot de passe";
	include("../inc/header.php");
	include("../methodes/bdd.php");
	include("../methodes/methodes_username.php");

	if(!empty($_GET['email']) && !empty($_GET['token']) && verifMailToken($_GET['email'], $_GET['token'])) {
		$email = $_GET['email'];
		$token = $_GET['token'];
	} else {
		$_SESSION['errorConnexion'] = "Le lien transmis par mail est inconnu ...";
		header("Location: ../log/lost.php");
		die();	
	}
	
?>
	<div id="header">
			<a href="../html/index.php">Retour accueil</a>
	</div>

	<div id="formulaireLog">
		<h1>Réinitialisation du mot de passe</h1>
		<form method="POST" action="../methodes/newPass.php">
			<label for="email">Mail</label>
			<input type="text" id="email" name="email" value="<?= $email ?>" readonly>

			<label for="password">Password</label>
			<input id="password" placeholder="Obligatoire" name="password" type="password">

			<label for="passwordAgain">Password again</label>
			<input id="passwordAgain" placeholder="Obligatoire" name="passwordAgain" type="password">

			<input type="hidden" name="token" value="<?= $token ?>">

			<input type="submit" value="Valider votre nouveau mot de passe !">

			<?php 
				if(!empty($_SESSION['errorConnexion'])) : 
					$error = $_SESSION['errorConnexion'];
					$_SESSION['errorConnexion'] = "";
			?>

			<p class="errorForm"><?= $error ?></p>
			<?php endif;?>
		</form>
	</div>