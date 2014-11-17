app = {

	init: function() {
		_this = this;

		button.init();
		_this.compteur = parseInt($("#compteur").val());
	}
}

button = {
	init: function() {
		this.buttonFormCreateData();
		this.buttonAddInput();
		this.buttonFormPlay();
		this.buttonStartGame();
	},

	buttonFormCreateData: function() {
		$("#create").on("submit", 'form', function() {
			ajax.createData(this);
			return false;
		})
	},

	buttonFormPlay: function() {
		$("#playForm").on("submit", 'form', function() {
			score = $('#score').text();
			$("#hiddenScore").val(score)
			ajax.play(this);
			return false;
		})
	},

	buttonAddInput: function() {
		$("#plus").on("click", function(e) {
			url = $(this).attr("href")

			$('#sub').animate({
				opacity: 1
			});

			ajax.addInput(url);
			return false;
		})
	},

	buttonStartGame: function() {
		$('#start').on("click", function() {
			$(this).animate({
				opacity: 0
			}).text("Nouvelle partie ?")
			$('#player').attr("disabled", "disabled")
			$("#formulaire").animate({
				opacity: 1
			});
			ajax.getWord();
			$("#score").text(0)
			player = $('#player').val();

			if(player === "") {
				player = "Joueur anonyme";
			}
			$("#hiddenPlayer").val(player)
		})
	}
}

compteur = {
	init : function() {
		_this = this;
		_this.compteur = 0
	},

	getCompteur: function() {
		_this.compteur += 1
		return _this.compteur
	}
}


ajax = {
	getWord: function() {
		$.getJSON("json.php", function( json ) {
			$("#frenchWord").val(json);
			$("#hiddenFrenchWord").val(json);
		 })

	},

	play: function(e) {
		data = $(e);

		$.ajax({
			url: data.attr('action'),
			type: data.attr('method'),
			data: data.serialize(),
			success: function(html) {
				find = parseInt(html);

				if(find === 0) {
					$('#lost').animate({
						opacity: 1
					})
					$("#formulaire").animate({
						opacity: 0
					})
					$("#start").animate({
						opacity: 1	
					})
					$("#frenchWord").val("");
					$("#englishWord").val("");
					$('#player').removeAttr("disabled")

				} else {

					$("#frenchWord").fadeOut(function() {
						ajax.getWord();
					}).fadeIn();

					$("#englishWord").fadeOut(function() {
						$(this).val("");
					}).fadeIn();

					$("#score").fadeOut(function() {
						var score = parseInt($(this).text()) + 1;
						$(this).text(score)
					}).fadeIn();
				}
			}
		})

	},

	createData: function(e) {
		data = $(e);

		$.ajax({
			url: data.attr('action'),
			type: data.attr('method'),
			data: data.serialize(),
			success: function(html) {

				create = $(html).filter('#create').html();

				$('#create').fadeOut(function() {
					$('#create').empty().append(create);
				}).fadeIn();

			}
		})
	},

	addInput: function(url) {
		$.ajax({
			url: url,
			success: function(html) {
				obj = $(html)

				_this.compteur += 1
				compteur = _this.compteur

				$(obj[0]).find('label').attr('for', 'frenchWord_'+ compteur)
				$(obj[0]).find('input').attr('id', 'frenchWord_'+ compteur).attr('name', 'frenchWord_'+ compteur)

				$(obj[2]).find('label').attr('for', 'englishWord_'+ compteur)
				$(obj[2]).find('input').attr('id', 'englishWord_'+ compteur).attr('name', 'englishWord_'+ compteur)
				
				$('#champs').append(obj)
				
			}
		})
	}
}


$(function() {
	app.init();
})