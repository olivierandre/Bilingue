<?php
	include("presentation/header.php");
?>
<h1 id="info"></h1>
<div class="container" id="create">
	<div class="row">
		<div class="col-xs-6">
			<form role="form" method="POST" action="index.php?page=verifDonnees">
				<input type="hidden" id="compteur" value="<?= getMaxId() ?>" name="compteur">
				<div id='champs'>
				<?php
					$mots = getData();
					foreach($mots as $mot) :
				?>
					<div class="form-group france">
					    <label for="">Mot en français</label>
					    <input type="text" class="form-control" name='updateFrench_<?= $mot['id'] ?>' id="updateFrench_<?= $mot['id'] ?>" value="<?= $mot['frenchWord'] ?>">
					</div>
					<div class="form-group english">
						<label for="">English word</label>
						<input type="text" class="form-control" name='updateEnglish_<?= $mot['id'] ?>' id="updateEnglish_<?= $mot['id'] ?>" value="<?= $mot['englishWord'] ?>">
					</div>
				<?php endforeach ?>

				</div>
			  <button id="sub" type="submit" class="btn btn-primary">Valider</button>
			</form>
		</div>
	</div>

</div>
<div id="createButton">
	<a href="index.php?page=addFormCreate" id="plus"><span class="glyphicon glyphicon-plus"></span></a>
	<a href="index.php" id="retour">Retour accueil</a>
</div>

<?php
	include("presentation/footer.php");
?>

