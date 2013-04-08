<?php
/*
 * Squelette : squelettes-dist/modeles/article_traductions.html
 * Date :      Mon, 08 Apr 2013 17:05:01 GMT
 * Compile :   Mon, 08 Apr 2013 17:15:13 GMT (3.6ms)
 * Boucles :   _traductions, _article
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_traductionshtml_96826d993a6a6419db729fbd0df4d274(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'articles';
	static $id = '_traductions';
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
			array('=', 'articles.id_article', sql_quote($Pile[$SP]['id_article']))), 
			array('AND', 
			array('>', 'articles.id_trad', 0), 
			array('=', 'articles.id_trad', sql_quote($Pile[$SP]['id_trad'])))), sql_in('articles.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$Numrows['_traductions']['total'] = @intval(sql_count($result, ''));
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {
		if (!(isset($GLOBALS['forcer_lang']) AND $GLOBALS['forcer_lang']))
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (($Numrows['_traductions']['total'] > '1')  ?
		(' ' . (	'
	<span lang="' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" xml:lang="' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" dir="' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'"' .
	(calcul_exposer($Pile[$SP]['id_article'], 'id_article', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_article', '')  ?
			(' class="' . 'on' . '"') :
			'') .
	'>&#91;' .
	(calcul_exposer($Pile[$SP]['id_article'], 'id_article', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_article', '') ? '' : (	'<a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
		'" rel="alternate" hreflang="' .
		htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
		'"' .
		(($t3 = strval(interdire_scripts(couper(attribut_html(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)),'80'))))!=='' ?
				(' title="' . $t3 . '"') :
				'') .
		'>')) .
	traduire_nom_langue(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])) .
	(calcul_exposer($Pile[$SP]['id_article'], 'id_article', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_article', '') ? '' : '</a>') .
	'&#93;</span>
	')) :
		'');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_articlehtml_96826d993a6a6419db729fbd0df4d274(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
' .
(($t1 = BOUCLE_traductionshtml_96826d993a6a6419db729fbd0df4d274($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<p class="traductions">
	' .
		_T('public/spip/ecrire:trad_article_traduction',array()) .
		'
	') . $t1 . '
</p>
') :
		'') .
'
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes-dist/modeles/article_traductions.html.
//
function html_96826d993a6a6419db729fbd0df4d274($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_articlehtml_96826d993a6a6419db729fbd0df4d274($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_96826d993a6a6419db729fbd0df4d274', $Cache, $page, 'squelettes-dist/modeles/article_traductions.html');
}

?>