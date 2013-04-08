<?php
/*
 * Squelette : ../plugins/spip-bonux/style_prive_plugins.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:11:58 GMT (3.8ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../plugins/spip-bonux/style_prive_plugins.html.
//
function html_13cb81124b4ea5556ad4d4676f5d2464($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


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
'h2.titrem { display: block; padding-top: 6px; padding-bottom: 4px; background-repeat: no-repeat;padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':16px;background-color: ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';font-size:14px;}


/* listes */
.liste_items {list-style:none;margin:1em 0;padding:0;border-top:1px solid #ddd;clear:both;}
.liste_items .item {border-bottom:1px solid #ddd;padding:0.4em 0; font-size: 11px;overflow:hidden;clear:both;}
.liste_items .item.odd {background-color:#eee;}
.liste_items .item:hover,
.liste_items .item.odd:hover {background-color:' .
(($t1 = strval(filtrer('couleur_eclaircir',filtrer('couleur_eclaircir',(is_array($a = ($Pile["vars"])) ? $a['claire'] : "")))))!=='' ?
		('#' . $t1) :
		'') .
';}
.liste_items li.court:hover {background-color:#eee;}
.liste_items .item.on {background-color:' .
(($t1 = strval(filtrer('couleur_eclaircir',filtrer('couleur_eclaircir',(is_array($a = ($Pile["vars"])) ? $a['claire'] : "")))))!=='' ?
		('#' . $t1) :
		'') .
';font-weight:normal;}
.liste_items .item.on:hover {background-color:' .
(($t1 = strval(filtrer('couleur_eclaircir',(is_array($a = ($Pile["vars"])) ? $a['claire'] : ""))))!=='' ?
		('#' . $t1) :
		'') .
';}
.liste_items .item h3 {margin:0;}


.liste_items .item .actions {float:none;margin:0;clear:both;text-align:' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
';}

.tri, .pagination {background:#eee;border-top:1px solid #ddd;border-bottom:1px solid #ddd; margin: 0;padding:2px 0; font-size: 11px; font-weight: bold; text-align: ' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
'; white-space: nowrap;margin-top:1em; }
.tri {text-align:' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
';}
.tri .on, .pagination .on { background:#ccc;padding:2px 3px;color:#fff; }
.tri img, .pagination img {vertical-align:bottom;}

.pagination + .tri, .tri + .pagination {border-top:0;margin-top:0;}
.pagination + .liste_items, .tri + .liste_items {border-top:0;margin-top:0;}
.liste_items + .tri, .liste_items + .pagination {margin-top:-1em;margin-bottom:1em;}

#navigation .pagination,#extra .pagination {font-size:9px;}
#navigation .tri,#extra .tri {font-size:9px;}

.clicable {cursor:hand;cursor:pointer;}

/* menus */
/* listes */
ul.menu {list-style:none;margin:1em 0;padding:0;border-top:1px solid #ddd;clear:both;}
ul.menu li {border-bottom:1px solid #ddd;padding:0; font-size: 10px;overflow:hidden;clear:both;}
ul.menu li ul {margin:0;padding:0;margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':11px;}
ul.menu li a,ul.menu li strong.on {display:block;padding:0.4em 0;}
ul.menu li a:hover {background-color:' .
(($t1 = strval(filtrer('couleur_eclaircir',filtrer('couleur_eclaircir',(is_array($a = ($Pile["vars"])) ? $a['claire'] : "")))))!=='' ?
		('#' . $t1) :
		'') .
';}
ul.menu li .on {background-color:' .
(($t1 = strval(filtrer('couleur_eclaircir',filtrer('couleur_eclaircir',(is_array($a = ($Pile["vars"])) ? $a['claire'] : "")))))!=='' ?
		('#' . $t1) :
		'') .
';}

/* les boutons action */
form.bouton_action_post, form.bouton_action_post div {display:inline;}
form.bouton_action_post button.submit, .formulaire_spip .boutons input.link,.formulaire_spip .boutons button.link {margin:0;font-weight:normal;}

.formulaire_spip .boutons button {cursor:pointer;}
form.bouton_action_post button.submit, .formulaire_spip .boutons input.link,.formulaire_spip .boutons button.link {background:none;border:0;cursor:pointer;padding:0 0 1px;}
form.bouton_action_post button.submit:hover, .formulaire_spip .boutons input.link:hover,.formulaire_spip .boutons button.link:hover {border-bottom:1px solid;padding:0;}

/* tips */
.qTipContent {display:none;}


' .
recuperer_fond('', array_merge($Pile[0],array('fond' => tous_les_fonds('prive/','/style_prive_plugin_') ,
	'couleur_claire' => @$Pile[0]['couleur_claire'] ,
	'couleur_foncee' => @$Pile[0]['couleur_foncee'] ,
	'ltr' => @$Pile[0]['ltr'] ,
	'lang' => $GLOBALS["spip_lang"] )), array()) .
'
');

	return analyse_resultat_skel('html_13cb81124b4ea5556ad4d4676f5d2464', $Cache, $page, '../plugins/spip-bonux/style_prive_plugins.html');
}

?>