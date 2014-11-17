<?php
	function dateFr($date) {
    $dateFr = date_create($date);
    $mois = date_format($dateFr, "m");

    switch($mois) {
        case "01" :
            $moisFinal = "Janvier";
            break;
        case "02" :
            $moisFinal = "Février";
            break;
        case "03" :
            $moisFinal = "Mars";
            break;
        case "04" :
            $moisFinal = "Avril";
            break;          
        case "05" :
            $moisFinal = "Mai";
            break;
        case "06" :
            $moisFinal = "Juin";
            break;
        case "07" :
            $moisFinal = "Juillet";
            break;
        case "08" :
            $moisFinal = "Aout";
            break;
        case "09" :
            $moisFinal = "Septembre";
            break;
        case "10" :
            $moisFinal = "Octobre";
            break;
        case "11" :
            $moisFinal = "Novembre";
            break;
        case "12" :
            $moisFinal = "Décembre";
    }
     
    return date_format($dateFr, " d ".addcslashes($moisFinal, "A..z")." Y ");
}

    function dateFrWithHour($date) {
    $dateFr = date_create($date);
    $mois = date_format($dateFr, "m");

    switch($mois) {
        case "01" :
            $moisFinal = "Janvier";
            break;
        case "02" :
            $moisFinal = "Février";
            break;
        case "03" :
            $moisFinal = "Mars";
            break;
        case "04" :
            $moisFinal = "Avril";
            break;          
        case "05" :
            $moisFinal = "Mai";
            break;
        case "06" :
            $moisFinal = "Juin";
            break;
        case "07" :
            $moisFinal = "Juillet";
            break;
        case "08" :
            $moisFinal = "Aout";
            break;
        case "09" :
            $moisFinal = "Septembre";
            break;
        case "10" :
            $moisFinal = "Octobre";
            break;
        case "11" :
            $moisFinal = "Novembre";
            break;
        case "12" :
            $moisFinal = "Décembre";
    }
     
    return date_format($dateFr, " d ".addcslashes($moisFinal, "A..z")." Y à H \h i \m s \s");
}


?>