<?php
//CONNEXION A UNE BASE
function connexion ($bserveur, $bnom, $bpass, $bbase)
{
$connexion = mysql_pconnect ($bserveur, $bnom, $bpass);
if (!$connexion)
     { echo "Désolé, connexion à " . $bserveur . " impossible\n" ; exit ; }

if ( !mysql_select_db ($bbase, $connexion))
     { echo "Désolé, connexion à la base " . $bbase . " impossible\n" ; exit ; }
mysql_set_charset('utf8', $connexion);
return $connexion ;
}

// EXECUTION REQUETE
function execRequete ($requete, $connexion)
{
$resultat = mysql_query ($requete, $connexion);
if ($resultat) return $resultat;
else 
   {echo "<br /><B><font color=\"#cc0000\">Erreur dans l'execution de la requête !</font></B><BR />";
    echo "<i>message de MySql :</i> " . mysql_error($connexion); 
		echo "<p><i>Requète :</i> $requete </p>";
		exit ;}
}

// Recherche de la ligne suivante
 function LigneSuivante ($resultat)
 {
   return  mysql_fetch_object ($resultat);
 } 
?>
