<?php
/*
 * Squelette : squelettes/inc-entete.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:11:32 GMT (0.3ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes/inc-entete.html.
//
function html_c7f8b77f4e8c404d187e02479acdd954($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div id="entete">
<a rel="start home" href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/?lang=' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" title="' .
_T('public/spip/ecrire:accueil_site',array()) .
'" class="accueil"><strong id="nom_site_spip">' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
'</strong></a>
</div>
');

	return analyse_resultat_skel('html_c7f8b77f4e8c404d187e02479acdd954', $Cache, $page, 'squelettes/inc-entete.html');
}

?>