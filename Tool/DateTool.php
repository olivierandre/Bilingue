<?php

    namespace Tool;

    use \DateTime;
    use \DateInterval;

    class DateTool {

        public static function mySqlDateToFr($date) {
            $dateFr = date("d-m-Y H:i:s", strtotime($date));
            return $dateFr;
        }

        public static function minutesLeft($date, $delai) {
            $fin = new DateTime($date);
            $fin->add(new DateInterval($delai));

            $time = new DateTime();

            $interval = $time->diff($fin);

            // On transforme en minutes ...
            $minutes = $interval->h * 60;
            $minutes += $interval->i;
            $stringMinute = " minute";

            if($minutes > 1) {
                $stringMinute = " minutes";
            }

            return $minutes.$stringMinute;
        }

        public static function dateFr($date) {
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
                    $moisFinal = "Août";
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

        public static function dateFrWithHour($date) {
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

        public static function getDateUsSansHeure($date) {
            $dateUs = date_create($date);
            echo $dateUs;
            return date_format($dateUs, "Y-m-d");

        }
}
?>