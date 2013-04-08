<?php
/*
 * Squelette : squelettes/inc-entete-sommaire.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:12:25 GMT (0.3ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes/inc-entete-sommaire.html.
//
function html_d95a4ba0c310866af02bc9c0a25a7e7f($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


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

	return analyse_resultat_skel('html_d95a4ba0c310866af02bc9c0a25a7e7f', $Cache, $page, 'squelettes/inc-entete-sommaire.html');
}

?>