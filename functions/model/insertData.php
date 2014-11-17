<?php

	function insertData($frenchWord, $englishWord) {
		$database = connectDBH();

		$sql = "INSERT INTO mots (frenchWord, englishWord)
				VALUES(:frenchWord, :englishWord)";

		$stmt = $database->prepare($sql);
		$stmt->bindValue(':frenchWord', $frenchWord);
		$stmt->bindValue(':englishWord', $englishWord);

		return $stmt->execute();
	}

	function getData() {
		$database = connectDBH();

		$sql = "SELECT * FROM mots";

		$stmt = $database->prepare($sql);
		$stmt->execute();
		$mots = $stmt->fetchAll();

		return $mots;
	}

	function getRandomData() {
		$database = connectDBH();

		$sql = "SELECT * FROM mots ORDER BY RAND()";

		$stmt = $database->prepare($sql);
		$stmt->execute();
		$mots = $stmt->fetchAll();

		return $mots;
	}

	function getRandomFrenchData() {
		$database = connectDBH();

		$sql = "SELECT frenchWord FROM mots 
				ORDER BY RAND()";

		$stmt = $database->prepare($sql);
		$stmt->execute();
		$mots = $stmt->fetchAll();

		return $mots;
	}

	function getOneWord($bool) {
		$database = connectDBH();

		if($bool) {
			$word = "frenchWord";
		} else {
			$word = "englishWord";
		}

		$sql = "SELECT $word FROM mots 
				ORDER BY RAND() LIMIT 1";

		$stmt = $database->prepare($sql);
		$stmt->execute();
		$mot = $stmt->fetchColumn();

		return $mot;
	}

	function updateData($id, $frenchWord, $englishWord) {
		$database = connectDBH();

		$sql = "UPDATE mots
				SET frenchWord = :frenchWord,
				englishWord = :englishWord
				WHERE id = :id";

		$stmt = $database->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->bindValue(':frenchWord', $frenchWord);
		$stmt->bindValue(':englishWord', $englishWord);
		$stmt->execute();

	}

	function getMaxId() {
		$database = connectDBH();

		$sql = "SELECT MAX(id) FROM mots";

		$stmt = $database->prepare($sql);
		$stmt->execute();
		$max = $stmt->fetchColumn();

		return $max;
	}

	function verifWord($question, $answer) {
		$database = connectDBH();

/*		$sql = "SELECT COUNT(*) FROM mots
				WHERE englishWord = :englishWord
				AND frenchWord = :frenchWord";
*/
		$sql = "SELECT COUNT(*) FROM mots
				WHERE (englishWord = :question OR frenchWord = :question)
                AND (englishWord = :answer OR frenchWord = :answer)";

		$stmt = $database->prepare($sql);
		/*$stmt->bindValue(':frenchWord', $frenchWord);
		$stmt->bindValue(':englishWord', $englishWord);*/
		$stmt->bindValue(':question', $question);
		$stmt->bindValue(':answer', $answer);
		$stmt->execute();
		$count = $stmt->fetchColumn();

		return $count;
	}

	function insertScore($player, $score) {
		$database = connectDBH();

		$sql = "INSERT INTO score(player, score)
				VALUES(:player, :score)";

		$stmt = $database->prepare($sql);
		$stmt->bindValue(':player', $player);
		$stmt->bindValue(':score', $score);
		$result = $stmt->execute();

		return $result;
	}

	function getScore() {
		$database = connectDBH();

		$sql = "SELECT * FROM score
				ORDER BY score DESC, player";

		$stmt = $database->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();

		return $result;
	}

?>