<?php
	include("presentation/header.php");
?>
	<div class="container">
		<div class="row">
			<div class="col-xs-6 player">
			
				<label for="player">Nom du joueur</label>
				<input type="text" class="form-control" id="player">
				<p class="warning">Coucou</p>
				<button type="button" id="start" class="btn btn-success">Start game</button>

			</div>
		</div>
	</div>

	<div class="container" id="playForm">
		<div class="row">
			<div class="col-xs-6" id="formulaire">
				<form role="form" method="POST" action="index.php?page=verifValid">	
					<div class="form-group france">
						<label for="french">Mot à traduire</label>
						<input type="text" class="form-control" disabled id="frenchWord">
						<input type="hidden" class="form-control" name='frenchWord' id="hiddenFrenchWord" >
						<input type="hidden" name="hiddenPlayer" id="hiddenPlayer">
						<input type="hidden" name="hiddenScore" id="hiddenScore">
					</div>
					<div class="form-group english">
						<label for="english">Réponse</label>
						<input type="text" class="form-control" name='englishWord' id="englishWord" value="">
					</div>
					<button id="sub" type="submit" class="btn btn-primary">Valider</button>
					
				</form>
			</div>

			<div class="col-xs-2">
				<p id="score">0</p>
				<p id="lost">PERDU :-(</p>
			</div>
		</div>
	</div>

	
	<div id="createButton">
		<a href="index.php" id="retour">Retour accueil</a>
	</div>


<?php
	include("presentation/footer.php");
?>