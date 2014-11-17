<?php


	if(!empty($_POST)) {
		$taille = count($_POST);


		for($compteur = 1; $compteur <= $taille ; $compteur ++) {

			if(!empty($_POST['updateFrench_'.$compteur])) {
				$id = $compteur;
				$frenchWord = strtolower($_POST['updateFrench_'.$compteur]);
				$englishWord = strtolower($_POST['updateEnglish_'.$compteur]);
				updateData($id, $frenchWord, $englishWord);
			} else if(!empty($_POST['frenchWord_'.$compteur])) {
				$frenchWord = strtolower($_POST['frenchWord_'.$compteur]);
				$englishWord = strtolower($_POST['englishWord_'.$compteur]);
				insertData($frenchWord, $englishWord);
			}

		}

		header("Location: index.php?page=createData");
		die();

	}



?>