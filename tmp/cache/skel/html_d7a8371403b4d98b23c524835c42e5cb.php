<?php
/*
 * Squelette : ../prive/style_vieilles_def.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:11:58 GMT (3.8ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../prive/style_vieilles_def.html.
//
function html_d7a8371403b4d98b23c524835c42e5cb($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
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
'/* * */
.toile_claire {
	background-color: ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';
}

.toile_foncee {	background-color: ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';}
.toile_blanche {	background-color: #fff;}
.toile_noire {	background-color: #000;}
.toile_gris_sombre {	background-color: #333;}
.toile_gris_fort {	background-color: #999999;}
.toile_gris_moyen {	background-color: #ccc;}
.toile_gris_leger {	background-color: #eee;}

.bordure_claire {	border: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';}
.bordure_foncee {	border: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';}
.bordure_claire_basse {	border-bottom: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';}
.bordure_claire_left {	border-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';}
.bordure_claire_right {	border-' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
': 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';}
.bordure_grise_basse {	border-bottom: 1px solid #999999;}
.bordure_grise_left {	border-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': 1px solid #999999;}
.bordure_grise_right {	border-' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
': 1px solid #999999;}
.bordure_foncee_pointillee {	border: 2px;	border-style: dotted;	border-color: ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';}

.ligne_claire {	color: ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';}
.ligne_blanche {	color: white;}
.ligne_foncee {	color: ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';}
.ligne_noire {	color: #000;}


/* * Formulaires */

.forml { margin-top: 0px; width: 100%; display: block; padding: 3px; background-color: #f0f0f0; border: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
'; background-position: center bottom; float: none; behavior: url(' .
interdire_scripts(url_absolue(find_in_path('win_width.htc'))) .
'); font-size: 12px; }
.formo { margin-top: 0px; width: 100%; display: block; padding: 3px; background-color: #fff; border: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
'; background-position: center bottom; float: none; behavior: url(' .
interdire_scripts(url_absolue(find_in_path('win_width.htc'))) .
'); font-size: 12px; }
.fondl { margin-top: 0px; padding: 3px; background-color: #e4e4e4; border: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
'; background-position: center bottom; float: none; font-size: 11px; }
.fondo { 
	margin-top: 0px; 
	background:' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';
	border: 1px outset ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';
	float: none; 
	color: #fff; 
	font-size: 11px;
	font-weight: bold; 
}

input[type="submit"] {
	font-weight: bold;
	margin-top: 3px;
}
.fondf { margin-top: 0px; background-color: #fff; border-style: solid ; border-width: 1px; border-color: #e86519; color: #e86519; }
');

	return analyse_resultat_skel('html_d7a8371403b4d98b23c524835c42e5cb', $Cache, $page, '../prive/style_vieilles_def.html');
}

?>