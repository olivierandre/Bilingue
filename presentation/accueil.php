<?php include('Tool/DateTool.php'); ?>
<div class="container">
	<div class="row">
		<div class='col-xs-3' id="button">
			<a id="createData" href="index.php?page=createData">Création des données</a>
			<a id="play" href="index.php?page=play">Jouer !!!</a>
		</div>

		<div class="col-xs-6" id="afficheScore">
			
			<table>
				<thead>
					<tr>
						<th>Classement</th>
						<th>Nom joueur</th>
						<th>Score</th>
						<th>Effectué le</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$allScore = getScore();
					$compteur = 0;

					foreach($allScore as $score) :
						$compteur += 1;
						if($compteur%2) {
							$class = "pair";
						} else {
							$class = "impair";
						}
				?>
					<tr class="<?= $class ?>">
						<td><?= $compteur?></td>
						<td><?= $score['player'] ?></td>
						<td><?= $score['score'] ?></td>
						<td><?= \Tool\DateTool::dateFr($score['date_created']) ?></td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>

	</div>
</div>