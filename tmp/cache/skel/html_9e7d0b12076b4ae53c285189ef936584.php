<?php
/*
 * Squelette : squelettes/voirFiche.html
 * Date :      Mon, 08 Apr 2013 17:05:01 GMT
 * Compile :   Mon, 08 Apr 2013 17:15:36 GMT (0.050s)
 * Boucles :   _ariane, _traductionsA, _offre, _traductionsB, _dem, _article, _precOA, _suivOA, _animOf, _precOPE, _suivOPE, _petitenf, _precOE, _suivOE, _ecolof, _precOC, _suivOC, _actculof, _offresA, _precDA, _suivDA, _animDe, _precDE, _suivDE, _ecoleDe, _precDC, _suivDC, _actculDe, _cvsano, _cvs, _emp, _demandeur, _principale
 */ 
//
// <BOUCLE hierarchie>
//
function BOUCLE_arianehtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	$hierarchie = ",$id_rubrique";
	while ($id_rubrique = sql_getfetsel("id_parent","spip_rubriques","id_rubrique=" . $id_rubrique,"","","", "", $connect)) { 
		$hierarchie = ",$id_rubrique$hierarchie";
	}
	if (!$hierarchie) return "";
	$hierarchie = substr($hierarchie,1);
	$in0 = array();
	$in0[]= 1;
	$in0[]= 25;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'rubriques';
	static $id = '_ariane';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.lang");
	$orderby = array("FIELD(rubriques.id_rubrique, $hierarchie)");
	$where = 
			array(sql_in('rubriques.id_secteur',sql_quote($in0),'NOT'), sql_in('rubriques.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'), 
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
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
' &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect),'80')) .
'</a>');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_traductionsAhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'articles';
	static $id = '_traductionsA';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.lang",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.titre",
		"articles.id_rubrique");
	static $orderby = array('articles.lang');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('OR', 
			array('AND', 
			array('=', 'articles.id_trad', 0), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP-1]['id_article']))), 
			array('AND', 
			array('>', 'articles.id_trad', 0), 
			array('=', 'articles.id_trad', sql_quote($Pile[$SP-1]['id_trad'])))), sql_in('articles.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$Numrows['_traductionsA']['total'] = @intval(sql_count($result, ''));
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {
		if (!(isset($GLOBALS['forcer_lang']) AND $GLOBALS['forcer_lang']))
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (($Numrows['_traductionsA']['total'] > '1')  ?
		(' ' . (	'
							<li lang="' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" xml:lang="' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" dir="' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'"' .
	(calcul_exposer($Pile[$SP]['id_article'], 'id_article', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_article', '')  ?
			(' class="' . 'off' . '"') :
			'') .
	'>' .
	(calcul_exposer($Pile[$SP]['id_article'], 'id_article', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_article', '') ? '' : (	'<a href="spip.php?page=voirFiche&id_article=' .
		$Pile[$SP]['id_article'] .
		'&emp_id=' .
		interdire_scripts($Pile[$SP-1]['emp_id']) .
		'" rel="alternate"  class="' .
		htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
		'" hreflang="' .
		htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
		'"' .
		(($t3 = strval(interdire_scripts(couper(attribut_html(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)),'80'))))!=='' ?
				(' title="' . $t3 . '"') :
				'') .
		'><em>')) .
	traduire_nom_langue(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])) .
	(calcul_exposer($Pile[$SP]['id_article'], 'id_article', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_article', '') ? '' : '</em></a>') .
	'</li>
							')) :
		'');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_employr>
//
function BOUCLE_offrehtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_employr';
	static $id = '_offre';
	static $from = array('xx_employr' => 'xx_employr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_employr.emp_id");
	static $orderby = array();
	$where = 
			array(
			array('=', 'xx_employr.emp_id', sql_quote(@$Pile[0]['emp_id'],'','int')), 
			array('>', 'xx_employr.emp_id', "0"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
						' .
(($t1 = BOUCLE_traductionsAhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
							' . $t1 . '
						') :
		'') .
'
					');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_traductionsBhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'articles';
	static $id = '_traductionsB';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.lang",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.titre",
		"articles.id_rubrique");
	static $orderby = array('articles.lang');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('OR', 
			array('AND', 
			array('=', 'articles.id_trad', 0), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP-1]['id_article']))), 
			array('AND', 
			array('>', 'articles.id_trad', 0), 
			array('=', 'articles.id_trad', sql_quote($Pile[$SP-1]['id_trad'])))), sql_in('articles.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$Numrows['_traductionsB']['total'] = @intval(sql_count($result, ''));
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {
		if (!(isset($GLOBALS['forcer_lang']) AND $GLOBALS['forcer_lang']))
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (($Numrows['_traductionsB']['total'] > '1')  ?
		(' ' . (	'
							<li lang="' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" xml:lang="' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" dir="' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'"' .
	(calcul_exposer($Pile[$SP]['id_article'], 'id_article', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_article', '')  ?
			(' class="' . 'off' . '"') :
			'') .
	'>' .
	(calcul_exposer($Pile[$SP]['id_article'], 'id_article', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_article', '') ? '' : (	'<a href="spip.php?page=voirFiche&id_article=' .
		$Pile[$SP]['id_article'] .
		'&dem_id=' .
		interdire_scripts($Pile[$SP-1]['dem_id']) .
		'" rel="alternate" class="' .
		htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
		'" hreflang="' .
		htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
		'"' .
		(($t3 = strval(interdire_scripts(couper(attribut_html(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)),'80'))))!=='' ?
				(' title="' . $t3 . '"') :
				'') .
		'><em>')) .
	traduire_nom_langue(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])) .
	(calcul_exposer($Pile[$SP]['id_article'], 'id_article', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_article', '') ? '' : '</em></a>') .
	'</li>
							')) :
		'');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_demandr>
//
function BOUCLE_demhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_demandr';
	static $id = '_dem';
	static $from = array('xx_demandr' => 'xx_demandr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_demandr.dem_id");
	static $orderby = array();
	$where = 
			array(
			array('=', 'xx_demandr.dem_id', sql_quote(@$Pile[0]['dem_id'],'','int')), 
			array('>', 'xx_demandr.dem_id', "0"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
						' .
(($t1 = BOUCLE_traductionsBhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
							' . $t1 . '
						') :
		'') .
'
					');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_articlehtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
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
	static $select = array("articles.id_trad",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP]['id_article'],'','int')), sql_in('articles.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
				<ul id="menu_langue">
            
					' .
BOUCLE_offrehtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
            
					' .
BOUCLE_demhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
					</ul>
				');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_employr>
//
function BOUCLE_precOAhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_employr';
	static $id = '_precOA';
	static $from = array('xx_employr' => 'xx_employr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_employr.emp_datmodif",
		"xx_employr.emp_id");
	static $orderby = array('xx_employr.emp_datmodif');
	$where = 
			array(
			array('LIKE', 'xx_employr.emp_domaines', "'%CVL%'"), 
			array('>', 'xx_employr.emp_datmodif', sql_quote(interdire_scripts($Pile[$SP-1]['emp_datmodif']))), 
			array('!=', 'xx_employr.emp_id', sql_quote($Pile[$SP-1]['emp_id'])));
	static $join = array();
	static $limit = '0,1';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
					<div><a href=\'spip.php?page=voirFiche&id_article=' .
$Pile[$SP-1]['id_article'] .
'&emp_id=' .
interdire_scripts($Pile[$SP]['emp_id']) .
'\'>' .
_T('public/spip/ecrire:fiche_precedente',array()) .
'</a></div>
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_employr>
//
function BOUCLE_suivOAhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_employr';
	static $id = '_suivOA';
	static $from = array('xx_employr' => 'xx_employr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_employr.emp_datmodif",
		"xx_employr.emp_id");
	static $orderby = array('xx_employr.emp_datmodif DESC');
	$where = 
			array(
			array('LIKE', 'xx_employr.emp_domaines', "'%CVL%'"), 
			array('<=', 'xx_employr.emp_datmodif', sql_quote(interdire_scripts($Pile[$SP-1]['emp_datmodif']))));
	static $join = array();
	static $limit = '1,1';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
					<div align=\'right\'><a href=\'spip.php?page=voirFiche&id_article=' .
$Pile[$SP-1]['id_article'] .
'&emp_id=' .
interdire_scripts($Pile[$SP]['emp_id']) .
'\'>' .
_T('public/spip/ecrire:fiche_suivante',array()) .
'</a></div>
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_animOfhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in1 = array();
	$in1[]= 7;
	$in1[]= 8;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'articles';
	static $id = '_animOf';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.id_rubrique",
		"articles.lang");
	$orderby = array(((!sql_quote($in1) OR sql_quote($in1)==="''") ? 0 : ('FIELD(articles.id_article,' . sql_quote($in1) . ')')));
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP-1]['id_article'],'','int')), sql_in('articles.id_article',sql_quote($in1)), sql_in('articles.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
				     <!-- le lien vers la fiche précédente, de date de modif plus ancienne -->
				' .
BOUCLE_precOAhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
				
				<!-- le lien vers la fiche suivante, de date de modif plus récente -->
				' .
BOUCLE_suivOAhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_employr>
//
function BOUCLE_precOPEhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_employr';
	static $id = '_precOPE';
	static $from = array('xx_employr' => 'xx_employr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_employr.emp_datmodif",
		"xx_employr.emp_id");
	static $orderby = array('xx_employr.emp_datmodif');
	$where = 
			array(
			array('LIKE', 'xx_employr.emp_domaines', "'%Petite%'"), 
			array('>', 'xx_employr.emp_datmodif', sql_quote(interdire_scripts($Pile[$SP-1]['emp_datmodif']))), 
			array('!=', 'xx_employr.emp_id', sql_quote($Pile[$SP-1]['emp_id'])));
	static $join = array();
	static $limit = '0,1';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
					<div><a href=\'spip.php?page=voirFiche&id_article=' .
$Pile[$SP-1]['id_article'] .
'&emp_id=' .
interdire_scripts($Pile[$SP]['emp_id']) .
'\'>' .
_T('public/spip/ecrire:fiche_precedente',array()) .
'</a></div>
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_employr>
//
function BOUCLE_suivOPEhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_employr';
	static $id = '_suivOPE';
	static $from = array('xx_employr' => 'xx_employr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_employr.emp_datmodif",
		"xx_employr.emp_id");
	static $orderby = array('xx_employr.emp_datmodif DESC');
	$where = 
			array(
			array('LIKE', 'xx_employr.emp_domaines', "'%Petite%'"), 
			array('<=', 'xx_employr.emp_datmodif', sql_quote(interdire_scripts($Pile[$SP-1]['emp_datmodif']))));
	static $join = array();
	static $limit = '1,1';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
					<div align=\'right\'><a href=\'spip.php?page=voirFiche&id_article=' .
$Pile[$SP-1]['id_article'] .
'&emp_id=' .
interdire_scripts($Pile[$SP]['emp_id']) .
'\'>' .
_T('public/spip/ecrire:fiche_suivante',array()) .
'</a></div>
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_petitenfhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in2 = array();
	$in2[]= 31;
	$in2[]= 32;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'articles';
	static $id = '_petitenf';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.id_rubrique",
		"articles.lang");
	$orderby = array(((!sql_quote($in2) OR sql_quote($in2)==="''") ? 0 : ('FIELD(articles.id_article,' . sql_quote($in2) . ')')));
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP-1]['id_article'],'','int')), sql_in('articles.id_article',sql_quote($in2)), sql_in('articles.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
				     <!-- le lien vers la fiche précédente, de date de modif plus ancienne -->
				' .
BOUCLE_precOPEhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
				
				<!-- le lien vers la fiche suivante, de date de modif plus récente -->
				' .
BOUCLE_suivOPEhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_employr>
//
function BOUCLE_precOEhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_employr';
	static $id = '_precOE';
	static $from = array('xx_employr' => 'xx_employr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_employr.emp_datmodif",
		"xx_employr.emp_id");
	static $orderby = array('xx_employr.emp_datmodif');
	$where = 
			array(
			array('LIKE', 'xx_employr.emp_domaines', "'%Ecoles%'"), 
			array('>', 'xx_employr.emp_datmodif', sql_quote(interdire_scripts($Pile[$SP-1]['emp_datmodif']))), 
			array('!=', 'xx_employr.emp_id', sql_quote($Pile[$SP-1]['emp_id'])));
	static $join = array();
	static $limit = '0,1';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
					<div><a href=\'spip.php?page=voirFiche&id_article=' .
$Pile[$SP-1]['id_article'] .
'&emp_id=' .
interdire_scripts($Pile[$SP]['emp_id']) .
'\'>' .
_T('public/spip/ecrire:fiche_precedente',array()) .
'</a></div>
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_employr>
//
function BOUCLE_suivOEhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_employr';
	static $id = '_suivOE';
	static $from = array('xx_employr' => 'xx_employr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_employr.emp_datmodif",
		"xx_employr.emp_id");
	static $orderby = array('xx_employr.emp_datmodif DESC');
	$where = 
			array(
			array('LIKE', 'xx_employr.emp_domaines', "'%Ecoles%'"), 
			array('<=', 'xx_employr.emp_datmodif', sql_quote(interdire_scripts($Pile[$SP-1]['emp_datmodif']))));
	static $join = array();
	static $limit = '1,1';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
					<div align=\'right\'><a href=\'spip.php?page=voirFiche&id_article=' .
$Pile[$SP-1]['id_article'] .
'&emp_id=' .
interdire_scripts($Pile[$SP]['emp_id']) .
'\'>' .
_T('public/spip/ecrire:fiche_suivante',array()) .
'</a></div>
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_ecolofhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in3 = array();
	$in3[]= 16;
	$in3[]= 22;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'articles';
	static $id = '_ecolof';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.id_rubrique",
		"articles.lang");
	$orderby = array(((!sql_quote($in3) OR sql_quote($in3)==="''") ? 0 : ('FIELD(articles.id_article,' . sql_quote($in3) . ')')));
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP-1]['id_article'],'','int')), sql_in('articles.id_article',sql_quote($in3)), sql_in('articles.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
				     <!-- le lien vers la fiche précédente, de date de modif plus ancienne -->
				' .
BOUCLE_precOEhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
				
				<!-- le lien vers la fiche suivante, de date de modif plus récente -->
				' .
BOUCLE_suivOEhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_employr>
//
function BOUCLE_precOChtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_employr';
	static $id = '_precOC';
	static $from = array('xx_employr' => 'xx_employr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_employr.emp_datmodif",
		"xx_employr.emp_id");
	static $orderby = array('xx_employr.emp_datmodif');
	$where = 
			array(
			array('LIKE', 'xx_employr.emp_domaines', "'%culturelle%'"), 
			array('>', 'xx_employr.emp_datmodif', sql_quote(interdire_scripts($Pile[$SP-1]['emp_datmodif']))), 
			array('!=', 'xx_employr.emp_id', sql_quote($Pile[$SP-1]['emp_id'])));
	static $join = array();
	static $limit = '0,1';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
					<div><a href=\'spip.php?page=voirFiche&id_article=' .
$Pile[$SP-1]['id_article'] .
'&emp_id=' .
interdire_scripts($Pile[$SP]['emp_id']) .
'\'>' .
_T('public/spip/ecrire:fiche_precedente',array()) .
'</a></div>
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_employr>
//
function BOUCLE_suivOChtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_employr';
	static $id = '_suivOC';
	static $from = array('xx_employr' => 'xx_employr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_employr.emp_datmodif",
		"xx_employr.emp_id");
	static $orderby = array('xx_employr.emp_datmodif DESC');
	$where = 
			array(
			array('LIKE', 'xx_employr.emp_domaines', "'%culturelle%'"), 
			array('<=', 'xx_employr.emp_datmodif', sql_quote(interdire_scripts($Pile[$SP-1]['emp_datmodif']))));
	static $join = array();
	static $limit = '1,1';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
					<div align=\'right\'><a href=\'spip.php?page=voirFiche&id_article=' .
$Pile[$SP-1]['id_article'] .
'&emp_id=' .
interdire_scripts($Pile[$SP]['emp_id']) .
'\'>' .
_T('public/spip/ecrire:fiche_suivante',array()) .
'</a></div>
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_actculofhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in4 = array();
	$in4[]= 23;
	$in4[]= 24;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'articles';
	static $id = '_actculof';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.id_rubrique",
		"articles.lang");
	$orderby = array(((!sql_quote($in4) OR sql_quote($in4)==="''") ? 0 : ('FIELD(articles.id_article,' . sql_quote($in4) . ')')));
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP-1]['id_article'],'','int')), sql_in('articles.id_article',sql_quote($in4)), sql_in('articles.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
				     <!-- le lien vers la fiche précédente, de date de modif plus ancienne -->
				' .
BOUCLE_precOChtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
				
				<!-- le lien vers la fiche suivante, de date de modif plus récente -->
				' .
BOUCLE_suivOChtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_employr>
//
function BOUCLE_offresAhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_employr';
	static $id = '_offresA';
	static $from = array('xx_employr' => 'xx_employr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_employr.emp_datmodif",
		"xx_employr.emp_id",
		"xx_employr.emp_poste",
		"xx_employr.emp_durdates",
		"xx_employr.emp_lieu",
		"xx_employr.emp_nom",
		"xx_employr.emp_mission",
		"xx_employr.emp_profil",
		"xx_employr.emp_type",
		"xx_employr.emp_remu",
		"xx_employr.emp_remq",
		"xx_employr.emp_contact");
	static $orderby = array();
	$where = 
			array(
			array('=', 'xx_employr.emp_id', sql_quote(@$Pile[0]['emp_id'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
	     
	     
			' .
BOUCLE_animOfhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			
			' .
BOUCLE_petitenfhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			
			' .
BOUCLE_ecolofhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			
			' .
BOUCLE_actculofhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			
         <ul class="top">
             ' .
(($t1 = strval(interdire_scripts($Pile[$SP]['emp_poste'])))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:poste',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
             ' .
(($t1 = strval(interdire_scripts($Pile[$SP]['emp_durdates'])))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:duree_dates',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
             ' .
(($t1 = strval(interdire_scripts($Pile[$SP]['emp_lieu'])))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:lieu',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
             ' .
(($t1 = strval(interdire_scripts($Pile[$SP]['emp_nom'])))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:nom_emp',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
   
         </ul>
         <ul>
             ' .
(($t1 = strval(interdire_scripts($Pile[$SP]['emp_mission'])))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:mission',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
             ' .
(($t1 = strval(interdire_scripts($Pile[$SP]['emp_profil'])))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:profil',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
             ' .
(($t1 = strval(((htmlentities($Pile[$SP-1]['lang'] ? $Pile[$SP-1]['lang'] : $GLOBALS['spip_lang']) == 'br') ? interdire_scripts(replace(replace(replace(replace($Pile[$SP]['emp_type'],'CDI','Kevrat didermen'),'CDD','Kevrat termenet'),'Benev.','A youl vat'),'Indemnite','Digoll')):(	interdire_scripts(replace(replace($Pile[$SP]['emp_type'],'Benev.','B&eacute;n&eacute;v.'),'Indemnite','Indemnit&eacute;')) .
	'
						'))))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:type',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
             ' .
(($t1 = strval(interdire_scripts($Pile[$SP]['emp_remu'])))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:remuneration',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
             ' .
(($t1 = strval(interdire_scripts($Pile[$SP]['emp_remq'])))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:remarques',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
             ' .
(($t1 = strval(interdire_scripts($Pile[$SP]['emp_contact'])))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:contact',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
             ' .
(($t1 = strval(interdire_scripts($Pile[$SP]['emp_datmodif'])))!=='' ?
		((	'<li class="info_date"><small>' .
	_T('public/spip/ecrire:fiche_modif_le',array()) .
	'</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
         </ul>
       ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_demandr>
//
function BOUCLE_precDAhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_demandr';
	static $id = '_precDA';
	static $from = array('xx_demandr' => 'xx_demandr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_demandr.dem_datmodif",
		"xx_demandr.dem_id");
	static $orderby = array('xx_demandr.dem_datmodif');
	$where = 
			array(
			array('LIKE', 'xx_demandr.dem_domaines', "'%C.V.L.%'"), 
			array('>', 'xx_demandr.dem_datmodif', sql_quote(interdire_scripts($Pile[$SP-1]['dem_datmodif']))), 
			array('!=', 'xx_demandr.dem_id', sql_quote($Pile[$SP-1]['dem_id'])));
	static $join = array();
	static $limit = '0,1';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
					<div><a href=\'spip.php?page=voirFiche&id_article=' .
$Pile[$SP-1]['id_article'] .
'&dem_id=' .
interdire_scripts($Pile[$SP]['dem_id']) .
'\'>' .
_T('public/spip/ecrire:fiche_precedente',array()) .
'</a></div>
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_demandr>
//
function BOUCLE_suivDAhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_demandr';
	static $id = '_suivDA';
	static $from = array('xx_demandr' => 'xx_demandr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_demandr.dem_datmodif",
		"xx_demandr.dem_id");
	static $orderby = array('xx_demandr.dem_datmodif DESC');
	$where = 
			array(
			array('LIKE', 'xx_demandr.dem_domaines', "'%C.V.L.%'"), 
			array('<=', 'xx_demandr.dem_datmodif', sql_quote(interdire_scripts($Pile[$SP-1]['dem_datmodif']))));
	static $join = array();
	static $limit = '1,1';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
					<div align=\'right\'><a href=\'spip.php?page=voirFiche&id_article=' .
$Pile[$SP-1]['id_article'] .
'&dem_id=' .
interdire_scripts($Pile[$SP]['dem_id']) .
'\'>' .
_T('public/spip/ecrire:fiche_suivante',array()) .
'</a></div>
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_animDehtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in5 = array();
	$in5[]= 25;
	$in5[]= 26;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'articles';
	static $id = '_animDe';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.id_rubrique",
		"articles.lang");
	$orderby = array(((!sql_quote($in5) OR sql_quote($in5)==="''") ? 0 : ('FIELD(articles.id_article,' . sql_quote($in5) . ')')));
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP-1]['id_article'],'','int')), sql_in('articles.id_article',sql_quote($in5)), sql_in('articles.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
				     <!-- le lien vers la fiche précédente, de date de modif plus ancienne -->
				' .
BOUCLE_precDAhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
				
				<!-- le lien vers la fiche suivante, de date de modif plus récente -->
				' .
BOUCLE_suivDAhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_demandr>
//
function BOUCLE_precDEhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_demandr';
	static $id = '_precDE';
	static $from = array('xx_demandr' => 'xx_demandr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_demandr.dem_datmodif",
		"xx_demandr.dem_id");
	static $orderby = array('xx_demandr.dem_datmodif');
	$where = 
			array(
			array('LIKE', 'xx_demandr.dem_domaines', "'%Ecoles%'"), 
			array('>', 'xx_demandr.dem_datmodif', sql_quote(interdire_scripts($Pile[$SP-1]['dem_datmodif']))), 
			array('!=', 'xx_demandr.dem_id', sql_quote($Pile[$SP-1]['dem_id'])));
	static $join = array();
	static $limit = '0,1';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
					<div><a href=\'spip.php?page=voirFiche&id_article=' .
$Pile[$SP-1]['id_article'] .
'&dem_id=' .
interdire_scripts($Pile[$SP]['dem_id']) .
'\'>' .
_T('public/spip/ecrire:fiche_precedente',array()) .
'</a></div>
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_demandr>
//
function BOUCLE_suivDEhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_demandr';
	static $id = '_suivDE';
	static $from = array('xx_demandr' => 'xx_demandr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_demandr.dem_datmodif",
		"xx_demandr.dem_id");
	static $orderby = array('xx_demandr.dem_datmodif DESC');
	$where = 
			array(
			array('LIKE', 'xx_demandr.dem_domaines', "'%Ecoles%'"), 
			array('<=', 'xx_demandr.dem_datmodif', sql_quote(interdire_scripts($Pile[$SP-1]['dem_datmodif']))));
	static $join = array();
	static $limit = '1,1';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
					<div align=\'right\'><a href=\'spip.php?page=voirFiche&id_article=' .
$Pile[$SP-1]['id_article'] .
'&dem_id=' .
interdire_scripts($Pile[$SP]['dem_id']) .
'\'>' .
_T('public/spip/ecrire:fiche_suivante',array()) .
'</a></div>
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_ecoleDehtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in6 = array();
	$in6[]= 27;
	$in6[]= 28;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'articles';
	static $id = '_ecoleDe';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.id_rubrique",
		"articles.lang");
	$orderby = array(((!sql_quote($in6) OR sql_quote($in6)==="''") ? 0 : ('FIELD(articles.id_article,' . sql_quote($in6) . ')')));
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP-1]['id_article'],'','int')), sql_in('articles.id_article',sql_quote($in6)), sql_in('articles.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
				     <!-- le lien vers la fiche précédente, de date de modif plus ancienne -->
				' .
BOUCLE_precDEhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
				
				<!-- le lien vers la fiche suivante, de date de modif plus récente -->
				' .
BOUCLE_suivDEhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_demandr>
//
function BOUCLE_precDChtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_demandr';
	static $id = '_precDC';
	static $from = array('xx_demandr' => 'xx_demandr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_demandr.dem_datmodif",
		"xx_demandr.dem_id");
	static $orderby = array('xx_demandr.dem_datmodif');
	$where = 
			array(
			array('LIKE', 'xx_demandr.dem_domaines', "'%culturelle%'"), 
			array('>', 'xx_demandr.dem_datmodif', sql_quote(interdire_scripts($Pile[$SP-1]['dem_datmodif']))), 
			array('!=', 'xx_demandr.dem_id', sql_quote($Pile[$SP-1]['dem_id'])));
	static $join = array();
	static $limit = '0,1';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
					<div><a href=\'spip.php?page=voirFiche&id_article=' .
$Pile[$SP-1]['id_article'] .
'&dem_id=' .
interdire_scripts($Pile[$SP]['dem_id']) .
'\'>' .
_T('public/spip/ecrire:fiche_precedente',array()) .
'</a></div>
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_demandr>
//
function BOUCLE_suivDChtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_demandr';
	static $id = '_suivDC';
	static $from = array('xx_demandr' => 'xx_demandr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_demandr.dem_datmodif",
		"xx_demandr.dem_id");
	static $orderby = array('xx_demandr.dem_datmodif DESC');
	$where = 
			array(
			array('LIKE', 'xx_demandr.dem_domaines', "'%culturelle%'"), 
			array('<=', 'xx_demandr.dem_datmodif', sql_quote(interdire_scripts($Pile[$SP-1]['dem_datmodif']))));
	static $join = array();
	static $limit = '1,1';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
					<div align=\'right\'><a href=\'spip.php?page=voirFiche&id_article=' .
$Pile[$SP-1]['id_article'] .
'&dem_id=' .
interdire_scripts($Pile[$SP]['dem_id']) .
'\'>' .
_T('public/spip/ecrire:fiche_suivante',array()) .
'</a></div>
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_actculDehtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in7 = array();
	$in7[]= 29;
	$in7[]= 30;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'articles';
	static $id = '_actculDe';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.id_rubrique",
		"articles.lang");
	$orderby = array(((!sql_quote($in7) OR sql_quote($in7)==="''") ? 0 : ('FIELD(articles.id_article,' . sql_quote($in7) . ')')));
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP-1]['id_article'],'','int')), sql_in('articles.id_article',sql_quote($in7)), sql_in('articles.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
				     <!-- le lien vers la fiche précédente, de date de modif plus ancienne -->
				' .
BOUCLE_precDChtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
				
				<!-- le lien vers la fiche suivante, de date de modif plus récente -->
				' .
BOUCLE_suivDChtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_upcurvit>
//
function BOUCLE_cvsanohtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_upcurvit';
	static $id = '_cvsano';
	static $from = array('xx_upcurvit' => 'xx_upcurvit');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_upcurvit.up_date",
		"xx_upcurvit.up_lang",
		"xx_upcurvit.up_nom");
	static $orderby = array('xx_upcurvit.up_date');
	$where = 
			array(
			array('=', 'xx_upcurvit.up_demid', sql_quote(interdire_scripts($Pile[$SP]['dem_id']),'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
		             <li class="' .
interdire_scripts($Pile[$SP]['up_lang']) .
'"><a href="#"><em>' .
interdire_scripts($Pile[$SP]['up_nom']) .
'</em></a></li>
		       ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_upcurvit>
//
function BOUCLE_cvshtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_upcurvit';
	static $id = '_cvs';
	static $from = array('xx_upcurvit' => 'xx_upcurvit');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_upcurvit.up_date",
		"xx_upcurvit.up_lang",
		"xx_upcurvit.up_chemin",
		"xx_upcurvit.up_nom");
	static $orderby = array('xx_upcurvit.up_date');
	$where = 
			array(
			array('=', 'xx_upcurvit.up_demid', sql_quote(interdire_scripts($Pile[$SP-1]['dem_id']),'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
		             <li class="' .
interdire_scripts($Pile[$SP]['up_lang']) .
'"><a href="IMG/cvdemandr/' .
interdire_scripts($Pile[$SP]['up_chemin']) .
'"><em>' .
interdire_scripts($Pile[$SP]['up_nom']) .
'</em></a></li>
		       ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE zones_auteurs>
//
function BOUCLE_emphtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'zones_auteurs';
	static $id = '_emp';
	static $from = array('zones_auteurs' => 'spip_zones_auteurs');
	static $type = array();
	static $groupby = array();
	static $select = array("1");
	static $orderby = array();
	$where = 
			array(
			array('=', 'zones_auteurs.id_auteur', sql_quote(interdire_scripts(invalideur_session($Cache, (is_array($a = ($GLOBALS["visiteur_session"])) ? $a['id_auteur'] : ""))),'','int')), 
			array('=', 'zones_auteurs.id_zone', "2"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
	       <div align="right"><a href="spip.php?page=contactVisit&id_auteur=' .
interdire_scripts($Pile[$SP-1]['dem_idauteur']) .
'&lang=' .
htmlentities($Pile[$SP-2]['lang'] ? $Pile[$SP-2]['lang'] : $GLOBALS['spip_lang']) .
'"><em>' .
_T('public/spip/ecrire:envoyer_message',array()) .
'</em></a></div>
	       	' .
(($t1 = BOUCLE_cvshtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
         <h2>' .
		_T('public/spip/ecrire:curriculum',array()) .
		'</h2>
		         <ul id="cv">
		       ') . $t1 . '
		         </ul>
	       	') :
		'') .
'
	       ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_demandr>
//
function BOUCLE_demandeurhtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_demandr';
	static $id = '_demandeur';
	static $from = array('xx_demandr' => 'xx_demandr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_demandr.dem_datmodif",
		"xx_demandr.dem_id",
		"xx_demandr.dem_idauteur",
		"xx_demandr.dem_prenom",
		"xx_demandr.dem_nom",
		"xx_demandr.dem_datnais",
		"xx_demandr.dem_cp",
		"xx_demandr.dem_ville",
		"xx_demandr.dem_domaines",
		"xx_demandr.dem_profpost",
		"xx_demandr.dem_diplomes",
		"xx_demandr.dem_diplodivers",
		"xx_demandr.dem_dispo",
		"xx_demandr.dem_remq");
	static $orderby = array();
	$where = 
			array(
			array('=', 'xx_demandr.dem_id', sql_quote(@$Pile[0]['dem_id'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'

	     
			' .
BOUCLE_animDehtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'

			' .
BOUCLE_ecoleDehtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'

			' .
BOUCLE_actculDehtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			
         <ul class="top">
             <li><strong>' .
interdire_scripts($Pile[$SP]['dem_prenom']) .
' <span class="nom_famille">' .
interdire_scripts($Pile[$SP]['dem_nom']) .
'</span></strong></li>
         </ul>
         <ul>
             ' .
(($t1 = strval(interdire_scripts(replace(affdate($Pile[$SP]['dem_datnais']),'0000',''))))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:datnaiss',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
             ' .
(($t1 = strval(interdire_scripts($Pile[$SP]['dem_cp'])))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:commune',array()) .
	'&nbsp;</small><strong>') . $t1 . (	' ' .
	interdire_scripts($Pile[$SP]['dem_ville']) .
	'</strong></li>')) :
		'') .
'
             ' .
(($t1 = strval(((htmlentities($Pile[$SP-1]['lang'] ? $Pile[$SP-1]['lang'] : $GLOBALS['spip_lang']) == 'br') ? interdire_scripts(replace(replace(replace(replace(replace(replace($Pile[$SP]['dem_domaines'],',',', '),'C.V.L.','Buhezi&ntilde;'),'Baby sitting','Diwall bugale'),'Petite enfance','Bugale vihan'),'Ecoles','Skolioù'),'Action culturelle','Ober sevenadurel')):(	interdire_scripts(replace(replace(replace($Pile[$SP]['dem_domaines'],',',', '),'C.V.L.','Animation'),'Ecoles','&Eacute;coles')) .
	'
						'))))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:domaine',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
             ' .
(($t1 = strval(interdire_scripts($Pile[$SP]['dem_profpost'])))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:profil',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
             ' .
(($t1 = strval(((htmlentities($Pile[$SP-1]['lang'] ? $Pile[$SP-1]['lang'] : $GLOBALS['spip_lang']) == 'br') ? interdire_scripts(replace(replace(replace(replace(replace(replace(replace($Pile[$SP]['dem_diplomes'],',',', '),'B.A.F.A.','DABU'),'Stagiaire BAFA','Stajiad DABU'),'B.A.F.D.','DARE'),'Stagiaire BAFD','Stajiad DARE'),'Surveillant de baignade','Evezhier kouronkañ'),'Premiers secours','Sikourioù kentañ')):(	interdire_scripts(replace($Pile[$SP]['dem_diplomes'],',',', ')) .
	'
						'))))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:diplomes',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
             ' .
(($t1 = strval(interdire_scripts($Pile[$SP]['dem_diplodivers'])))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:diplodivers',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
             ' .
(($t1 = strval(interdire_scripts($Pile[$SP]['dem_dispo'])))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:disponibilite',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
             ' .
(($t1 = strval(interdire_scripts($Pile[$SP]['dem_remq'])))!=='' ?
		((	'<li><small>' .
	_T('public/spip/ecrire:remarques',array()) .
	'&nbsp;</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
             ' .
(($t1 = strval(interdire_scripts(affdate_jourcourt($Pile[$SP]['dem_datmodif']))))!=='' ?
		((	'<li class="info_date"><small>' .
	_T('public/spip/ecrire:fiche_modif_le',array()) .
	'</small><strong>') . $t1 . '</strong></li>') :
		'') .
'
         </ul>
         
	     ' .
(($t1 = BOUCLE_emphtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
	       ' . $t1 . '
	     ') :
		((	'
	       	' .
	(($t2 = BOUCLE_cvsanohtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			((	'
         <h2>' .
			_T('public/spip/ecrire:curriculum',array()) .
			'</h2>
         <p>' .
			_T('public/spip/ecrire:telechargmt_auth',array()) .
			'</p>
		         <ul id="cv">
		       ') . $t2 . '
		         </ul>
	       	') :
			'') .
	'
	     '))) .
'
	     
       ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_principalehtml_9e7d0b12076b4ae53c285189ef936584(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'articles';
	static $id = '_principale';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.lang",
		"articles.titre",
		"articles.texte",
		"articles.chapo",
		"articles.descriptif",
		"articles.surtitre",
		"articles.soustitre",
		"articles.id_rubrique",
		"articles.id_rubrique");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[0]['id_article'],'','int')), sql_in('articles.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
(($t1 = strval(interdire_scripts(textebrut(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)))))!=='' ?
		($t1 . ' - ') :
		'') .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
' .
(($t1 = strval(interdire_scripts(attribut_html(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], intval('150'), $connect)))))!=='' ?
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

<body class="page_fiche">
<div id="page">

	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-entete') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

	
    <div class="hfeed" id="conteneur">
    <div class="hentry" id="contenu">
   
        
        <div id="hierarchie"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/?lang=' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'">' .
_T('public/spip/ecrire:accueil_site',array()) .
'</a>' .
BOUCLE_arianehtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
(($t1 = strval(interdire_scripts(couper(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect),'80'))))!=='' ?
		(' &gt; <strong class="on">' . $t1 . '</strong>') :
		'') .
'</div>

		<div id="principal">

        <div class="cartouche">
            <div class="surlignable">
				' .
filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_article', 'ON', $Pile[$SP]['id_article'],'',  ''), '', ''),'200','200')) .
'
				' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['surtitre'], "TYPO", $connect))))!=='' ?
		((	'<p class="surtitre">') . $t1 . '</p>') :
		'') .
'
				<h1 class="entry-title">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</h1>
				' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['soustitre'], "TYPO", $connect))))!=='' ?
		((	'<p class="soustitre">') . $t1 . '</p>') :
		'') .
'
            </div>

            
				' .
BOUCLE_articlehtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP) .
'
        </div>
		
        <div class="surlignable">
			' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect),'500','0')))))!=='' ?
		((	'<div class="chapo">') . $t1 . '</div>') :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['texte'], $connect),'500','0')))))!=='' ?
		((	'<div class="texte entry-content">') . $t1 . '</div>') :
		'') .
'
		</div>
		
        
     ' .
(($t1 = BOUCLE_offresAhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
     <div class="voire_fiche demandeur">
         <h2></h2>
       ' . $t1 . '
     </div>
     ') :
		'') .
'

        
     ' .
(($t1 = BOUCLE_demandeurhtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
     <div class="voire_fiche demandeur">
         <h2></h2>
       ' . $t1 . '
     </div>
     ') :
		'') .
'


	</div> <!-- principal -->
	


    
    <div id="sidebar">
    
        
        ' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-rubriques') . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

       
    </div><!--#sidebar-->
    <div class="nettoyeur"></div>



	</div><!--#contenu-->
	</div><!--#conteneur-->


	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-pied') . ',
	\'skel\' => ' . argumenter_squelette('squelettes/voirFiche.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

</div><!--#page-->
</body>
</html>
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes/voirFiche.html.
//
function html_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
BOUCLE_principalehtml_9e7d0b12076b4ae53c285189ef936584($Cache, $Pile, $doublons, $Numrows, $SP));

	return analyse_resultat_skel('html_9e7d0b12076b4ae53c285189ef936584', $Cache, $page, 'squelettes/voirFiche.html');
}

?>