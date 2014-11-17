<?php

	/*
	* 	PRESENTATION
	*/

	function home() {
		showPage("html", "Bilingue", "Bilingue");
	}

	function createData() {
		showPage("presentation", "Création des données");
	}

	function addFormCreate() {
		showPage("inc", "Ajout d'input");
	}

	function play() {
		showPage("inc", "Jouer !!!");
	}

	/*
	*	PAGE DE VERIFICATION
	*/  
	function verifDonnees() {
		showPage("verif", null);
	}

	function verifValid() {
		showPage("verif", null);
	}


	/*
	*	Affiche les pages
	*/  
	function showPage ($dir, $title, $description = "Description de la page"){
		$title = ucfirst($title);
		global $page;
		global $pageLogRegister;
		include($dir."/".$page.".php");
	}