<?php

	$question = strtolower($_POST['englishWord']);
	$answer = strtolower($_POST['frenchWord']);

	$result = verifWord($question, $answer);

	if($result == 0) {
		$player = $_POST['hiddenPlayer'];
		$score = $_POST['hiddenScore'];

		insertScore($player, $score);
	}

	echo $result;

?>