<?php
/*
 * Squelette : ../plugins/acces_restreint_3_0/prive/style_prive_plugin_accesrestreint.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:11:58 GMT (2.5ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../plugins/acces_restreint_3_0/prive/style_prive_plugin_accesrestreint.html.
//
function html_d204048884c8a42fcae8325f67673305($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>
' .
'<?php header("X-Spip-Cache: 360000"); ?>'.'<?php header("Cache-Control: max-age=360000"); ?>'.'<?php header("X-Spip-Statique: oui"); ?>' .
'<'.'?php header("' . 'Content-Type: text/css; charset=iso-8859-15' . '"); ?'.'>' .
'<'.'?php header("' . 'Vary: Accept-Encoding' . '"); ?'.'>' .
vide($Pile['vars']['claire'] = (	'#' .
	interdire_scripts(entites_html(sinon(@$Pile[0]['couleur_claire'],'edf3fe'),true)))) .
vide($Pile['vars']['foncee'] = (	'#' .
	interdire_scripts(entites_html(sinon(@$Pile[0]['couleur_foncee'],'3874b0'),true)))) .
vide($Pile['vars']['left'] = interdire_scripts(choixsiegal(entites_html((@$Pile[0]['ltr']),true),'left','left','right'))) .
vide($Pile['vars']['right'] = interdire_scripts(choixsiegal(entites_html((@$Pile[0]['ltr']),true),'left','right','left'))) .
'li.item .actions {display:block;float:' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
';}
li.item p.actions {float:none;text-align:' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
';margin:0;}

li.item.zone .quoi {display:block;padding-left:20px;background:url(' .
interdire_scripts(eval('return '.'_DIR_PLUGIN_ACCESRESTREINT'.';')) .
'img_pack/restreint-16.png) center left no-repeat;}

.formulaire_spip ul.hierarchie {margin:0;padding:0;}
.formulaire_spip ul.hierarchie li {margin:0;margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':10px;padding:0;}
.formulaire_spip ul.hierarchie li.checked {background:' .
(($t1 = strval(filtrer('couleur_eclaircir',(is_array($a = ($Pile["vars"])) ? $a['claire'] : ""))))!=='' ?
		('#' . $t1) :
		'') .
';}
.formulaire_spip ul.hierarchie li.checked > .choix label {font-weight:bold;}

.liste_items li.item.ok {background-image:url(' .
interdire_scripts(find_in_path('img_pack/acces-ok-24.png')) .
');background-repeat:no-repeat;background-position:top right;}
.liste_items li.item.interdit {background-image:url(' .
interdire_scripts(find_in_path('img_pack/acces-interdit-24.png')) .
');background-repeat:no-repeat;background-position:top right;}');

	return analyse_resultat_skel('html_d204048884c8a42fcae8325f67673305', $Cache, $page, '../plugins/acces_restreint_3_0/prive/style_prive_plugin_accesrestreint.html');
}

?>