<?php
/*
 * Squelette : squelettes/inc-menu-lang.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:12:25 GMT (0.6ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes/inc-menu-lang.html.
//
function html_6cb54e44f788ff2d2c51b61c3f291244($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<ul id="menu_langue">
	<li ' .
((htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) == 'fr') ? 'class="off"':'') .
' ><a class="fr" href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/?lang=fr"><em>français</em></a></li>
	<li ' .
((htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) == 'br') ? 'class="off"':'') .
' ><a class="br" href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/?lang=br"><em>brezhoneg</em></a></li>
</ul>');

	return analyse_resultat_skel('html_6cb54e44f788ff2d2c51b61c3f291244', $Cache, $page, 'squelettes/inc-menu-lang.html');
}

?>