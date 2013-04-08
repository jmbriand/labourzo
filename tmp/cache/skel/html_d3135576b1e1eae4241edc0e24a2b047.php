<?php
/*
 * Squelette : squelettes/sommaire.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:12:25 GMT (9.9ms)
 * Boucles :   _article, _rubriques_B, _rubriques
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_articlehtml_d3135576b1e1eae4241edc0e24a2b047(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in0 = array();
	$in0[]= 20;
	$in0[]= 21;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'articles';
	static $id = '_article';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.texte",
		"articles.chapo",
		"articles.descriptif",
		"articles.id_rubrique",
		"articles.lang");
	$orderby = array(((!sql_quote($in0) OR sql_quote($in0)==="''") ? 0 : ('FIELD(articles.id_article,' . sql_quote($in0) . ')')));
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), sql_in('articles.id_article',sql_quote($in0)), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])), sql_in('articles.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {
		if (!(isset($GLOBALS['forcer_lang']) AND $GLOBALS['forcer_lang']))
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
				<li class="presentation">' .
interdire_scripts(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect)) .
'</li>
			');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubriques_Bhtml_d3135576b1e1eae4241edc0e24a2b047(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in1 = array();
	$in1[]= 1;
	$in1[]= 25;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'rubriques';
	static $id = '_rubriques_B';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.id_rubrique",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.id_parent', 0), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])), sql_in('rubriques.id_secteur',sql_quote($in1),'NOT'), sql_in('rubriques.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
	static $join = array();
	static $limit = '2,5';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {
		if (!(isset($GLOBALS['forcer_lang']) AND $GLOBALS['forcer_lang']))
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
				<li class="section' .
$Pile[$SP]['id_rubrique'] .
'">
					<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'"' .
(calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '')  ?
		(' class="' . 'on' . '"') :
		'') .
'>' .
affiche_logos(calcule_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']),  ''), '', '') .
' <big>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</big> <small>' .
interdire_scripts(supprimer_tags(propre($Pile[$SP]['descriptif'], $connect))) .
'</small></a>
				</li>
			');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubriqueshtml_d3135576b1e1eae4241edc0e24a2b047(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in2 = array();
	$in2[]= 1;
	$in2[]= 25;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'rubriques';
	static $id = '_rubriques';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.id_rubrique",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.id_parent', 0), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])), sql_in('rubriques.id_secteur',sql_quote($in2),'NOT'), sql_in('rubriques.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
	static $join = array();
	static $limit = '0,2';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {
		if (!(isset($GLOBALS['forcer_lang']) AND $GLOBALS['forcer_lang']))
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
				<li class="section' .
$Pile[$SP]['id_rubrique'] .
'">
					<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'"' .
(calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '')  ?
		(' class="' . 'on' . '"') :
		'') .
'>' .
affiche_logos(calcule_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']),  ''), '', '') .
' <big>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</big> <small>' .
interdire_scripts(supprimer_tags(propre($Pile[$SP]['descriptif'], $connect))) .
'</small></a>
				</li>
			');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes/sommaire.html.
//
function html_d3135576b1e1eae4241edc0e24a2b047($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 3600"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
' .
(($t1 = strval(interdire_scripts(textebrut(couper(propre($GLOBALS['meta']['descriptif_site'], $connect),'150')))))!=='' ?
		('<meta name="description" content="' . $t1 . '" />') :
		'') .
'
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-head') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
</head>

<body class="page_sommaire">
<div id="page">



	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-entete-sommaire') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>



	
	<div class="hfeed" id="conteneur">
	<div id="contenu">
	
	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-menu-lang') . ',
	\'skel\' => ' . argumenter_squelette('squelettes/sommaire.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
	

		<div class="sommaire">
		
		
		' .
(($t1 = BOUCLE_rubriqueshtml_d3135576b1e1eae4241edc0e24a2b047($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
		<div class="themes">
			<ul>
			' . $t1 . (	'
			
			' .
		BOUCLE_articlehtml_d3135576b1e1eae4241edc0e24a2b047($Cache, $Pile, $doublons, $Numrows, $SP) .
		'
				
			' .
		BOUCLE_rubriques_Bhtml_d3135576b1e1eae4241edc0e24a2b047($Cache, $Pile, $doublons, $Numrows, $SP) .
		'
			</ul>
			<div class="nettoyeur"></div>	
		</div>
	
		')) :
		'') .
'


	
		
		<div class="entrees">
			<ul>
			<li><a href="spip.php?page=accesEmp&id_article=' .
((htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) == 'br') ? '14':'18') .
'"><img class="spip_logos" src="./squelettes/img/demande.png" alt="demandes">' .
_T('public/spip/ecrire:entree_offre',array()) .
'</a></li>		
			<li><a href="spip.php?page=accesDem&id_article=' .
((htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) == 'br') ? '11':'17') .
'"><img class="spip_logos" src="./squelettes/img/offre.png" alt="offres">' .
_T('public/spip/ecrire:entree_demande',array()) .
'</a></li>
			</ul>
		<div class="nettoyeur"></div>			
		</div>
	
		</div>
	
	
	
		
		<div id="sidebar">
		
			
			' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-derniers-articles') . ',
	\'skel\' => ' . argumenter_squelette('squelettes/sommaire.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

	
		</div><!--#extra-->
	
		<div class="nettoyeur"></div>	

	</div><!--#contenu-->
	</div><!--#conteneur-->
	

	
	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-pied') . ',
	\'skel\' => ' . argumenter_squelette('squelettes/sommaire.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
	
</div><!--#page-->
</body>
</html>');

	return analyse_resultat_skel('html_d3135576b1e1eae4241edc0e24a2b047', $Cache, $page, 'squelettes/sommaire.html');
}

?>