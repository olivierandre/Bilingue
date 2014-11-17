<?php
	include("functions/model/bdd.php");
	include("functions/model/insertData.php");
	/*$frenchRandomWords = getRandomFrenchData();*/

	$rand = rand(0, 1);

	if($rand) {
		$mot = getOneWord(true);
	} else {
		$mot = getOneWord(false);
	}

	echo json_encode($mot)
?>