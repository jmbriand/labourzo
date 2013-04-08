<?php
/*
 * Squelette : prive/informer_auteur.html
 * Date :      Mon, 08 Apr 2013 17:05:01 GMT
 * Compile :   Mon, 08 Apr 2013 17:12:57 GMT (1.6ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette prive/informer_auteur.html.
//
function html_69572f7b1b11fa45a79976555c467c27($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . 'Content-Type: text/plain' . '"); ?'.'>' .
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
interdire_scripts(informer_auteur(normaliser_date(@$Pile[0]['date']))));

	return analyse_resultat_skel('html_69572f7b1b11fa45a79976555c467c27', $Cache, $page, 'prive/informer_auteur.html');
}

?>