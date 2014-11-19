app = {

	init: function() {
		_this = this;
		_this.compteur = parseInt($("#compteur").val());

		button.init();
		focus.init();
		

	}
}

focus = {
	init: function() {
		this.focusPlayerName();
	},

	focusPlayerName: function() {
		$('.player input[type=text]').on('focus', function() {
			warning.stopafficheNameAbsent();
			$(this).removeClass('absentName');
		})
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
			
			player = $('.player input[type=text]');

			if(player.val().length) {
				$(this).animate({
					opacity: 0
				}, function() {
					$(this).text("Nouvelle partie ?")
				})
				
				player.attr("disabled", "disabled")
				$("#hiddenPlayer").val(player)
				$('#lost').animate({
					opacity: 0
				})

				ajax.getWord();
				$("#score").text(0)

				$("#formulaire").animate({
					opacity: 1
				});
			} else {
				player.addClass('absentName');
				
				warning.afficheNameAbsent('warning', "Le nom est obligatoire pour jouer !!!")
			}
		})
	}
}

warning = {
	init: function() {
		_this = this;
		_this.obj = null;
	},

	afficheNameAbsent: function(classe, msg) {
		_this.obj = $('.' + classe);

		_this.obj.text(msg).animate({
			opacity: 1
		/*}, function() {
			setTimeout(function() {
				obj.animate({
					opacity: 0
				})
			}, 3000)*/
		});
	},

	stopafficheNameAbsent: function() {
		if(typeof(_this.obj) !== 'undefined') {
			_this.obj.animate({
				opacity: 0
			})
		}
	}
}

lost = {
	lost: function() {
		this.pop = $("<div>", {
			css: {
				position: "fixed",
				right: 0,
				bottom: 0,
				backgroundColor: "rgba(0,0,0,0.6)",
				padding: 50,
				opacity: 1,
				zIndex: 999,
				width: '50%',
				height: '50%',
				left: '25%',
				top: '25%'
			}
		})

		this.pop.append("<div class='perdu'><p>Perdu !!!!</p></div>")
		$("body").append(this.pop)
		return this.pop
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
					lost = lost.lost()

					setTimeout(function() {
						lost.animate({
							opacity: 0
						}).remove()
					}, 2000)
					/*$('#lost').animate({
						opacity: 1
					})*/
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