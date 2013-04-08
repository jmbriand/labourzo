<?php
/*
 * Squelette : squelettes/rubrique.html
 * Date :      Mon, 08 Apr 2013 17:05:01 GMT
 * Compile :   Mon, 08 Apr 2013 17:13:54 GMT (0.020s)
 * Boucles :   _ariane, _m2, _miniplan, _sous_rubriques, _articles, _rubsect, _documents_joints, _principale
 */ 
//
// <BOUCLE hierarchie>
//
function BOUCLE_arianehtml_19088f70c1803d77b432f3d58f2b2267(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	$hierarchie = '';
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
interdire_scripts(couper(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)),'80')) .
'</a>');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE boucle>
//
function BOUCLE_m2html_19088f70c1803d77b432f3d58f2b2267(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$save_numrows = ($Numrows['_miniplan']);
	$t0 = (($t1 = BOUCLE_miniplanhtml_19088f70c1803d77b432f3d58f2b2267($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
	                    <ul>
	                        ' . $t1 . '
	                    </ul>
	                    ') :
		'');
	$Numrows['_miniplan'] = ($save_numrows);
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_miniplanhtml_19088f70c1803d77b432f3d58f2b2267(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'rubriques';
	static $id = '_miniplan';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','int')), sql_in('rubriques.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
	                        <li>
	                            <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) .
'</a>
	                            ' .
BOUCLE_m2html_19088f70c1803d77b432f3d58f2b2267($Cache, $Pile, $doublons, $Numrows, $SP) .
'
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
function BOUCLE_sous_rubriqueshtml_19088f70c1803d77b432f3d58f2b2267(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'rubriques';
	static $id = '_sous_rubriques';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','int')), sql_in('rubriques.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
	                <li>
	                    <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) .
'</a>
	
	                    
	                    ' .
(($t1 = BOUCLE_miniplanhtml_19088f70c1803d77b432f3d58f2b2267($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
	                    <ul>
	                        ' . $t1 . '
	                    </ul>
	                    ') :
		'') .
'
	
	                </li>
	                ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_articleshtml_19088f70c1803d77b432f3d58f2b2267(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.date",
		"articles.id_article",
		"articles.titre",
		"articles.id_rubrique",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')), sql_in('articles.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);

	// PARTITION
	$nombre_boucle = @sql_count($result, '');
	$debut_boucle = intval(isset($Pile[0]['debut'.'_articles']) ? $Pile[0]['debut'.'_articles'] : _request('debut'.'_articles'));
	$fin_boucle = min($debut_boucle + 9, $nombre_boucle - 1);
	$Numrows['_articles']["grand_total"] = $nombre_boucle;
	$Numrows['_articles']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_articles']['compteur_boucle'] = 0;
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$Numrows['_articles']['compteur_boucle']++;
		if ($Numrows['_articles']['compteur_boucle'] > $debut_boucle) {
		if ($Numrows['_articles']['compteur_boucle']-1 > $fin_boucle) break;
		if (!(isset($GLOBALS['forcer_lang']) AND $GLOBALS['forcer_lang']))
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
	                <li>
	                    ' .
filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_article', 'ON', $Pile[$SP]['id_article'],'',  ''), vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))), ''),'150','100')) .
'
	                    <h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) .
'</a></h3>
	                    <small>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(recuperer_fond('modeles/lesauteurs',
			array('id_article' => $Pile[$SP]['id_article']), array('trim'=>true), '')))!=='' ?
		((	', ' .
	_T('public/spip/ecrire:par_auteur',array()) .
	' ') . $t1) :
		'') .
'</small>
	                </li>
	                ');
		}

	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubsecthtml_19088f70c1803d77b432f3d58f2b2267(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in1 = array();
	$in1[]= 3;
	$in1[]= 10;
	$in1[]= 2;
	$in1[]= 4;
	$in1[]= 6;
	$in1[]= 7;
	$in1[]= 5;
	$in1[]= 11;
	$in1[]= 12;
	$in1[]= 13;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'rubriques';
	static $id = '_rubsect';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.id_rubrique",
		"rubriques.lang");
	$orderby = array(((!sql_quote($in1) OR sql_quote($in1)==="''") ? 0 : ('FIELD(rubriques.id_rubrique,' . sql_quote($in1) . ')')));
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')), sql_in('rubriques.id_rubrique',sql_quote($in1)), sql_in('rubriques.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-listes-offres-demdes') . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
	        ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE documents>
//
function BOUCLE_documents_jointshtml_19088f70c1803d77b432f3d58f2b2267(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'documents';
	static $id = '_documents_joints';
	static $from = array('documents' => 'spip_documents LEFT JOIN spip_documents_liens AS l
			ON documents.id_document=l.id_document
			LEFT JOIN spip_articles AS aa
				ON (l.id_objet=aa.id_article AND l.objet=\'article\')
			LEFT JOIN spip_breves AS bb
				ON (l.id_objet=bb.id_breve AND l.objet=\'breve\')
			LEFT JOIN spip_rubriques AS rr
				ON (l.id_objet=rr.id_rubrique AND l.objet=\'rubrique\')
			LEFT JOIN spip_forum AS ff
				ON (l.id_objet=ff.id_forum AND l.objet=\'forum\')
		','L1' => 'spip_documents_liens','L2' => 'spip_types_documents');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("0+documents.titre AS num",
		"documents.date",
		"documents.id_document",
		"L2.mime_type",
		"documents.titre",
		"L2.titre AS type_document",
		"documents.taille",
		"documents.descriptif",
		"documents.id_document");
	static $orderby = array('num', 'documents.date');
	$where = 
			array('((aa.statut = \'publie\' AND aa.date<='.sql_quote(quete_date_postdates()).') OR bb.statut = \'publie\' OR rr.statut = \'publie\' OR ff.statut=\'publie\')', 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_rubrique'],'','int')), 
			array('=', 'L1.objet', sql_quote('rubrique')), 
			array('=', 'documents.mode', "'document'"), 
			array(sql_in('documents.id_document', $doublons[$doublons_index[]= ('documents')], 'NOT')), array('OR',
	array('IN','documents.id_document','('.sql_get_select('zzzd.id_document','spip_documents_liens as zzzd',array(array('OR',array('OR',array('OR',array('OR',array('AND','zzzd.objet=\'rubrique\'',sql_in('zzzd.id_objet', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT')),array('AND','zzzd.objet=\'article\'',array('NOT IN','zzzd.id_objet','('.sql_get_select('zzza.id_article','spip_articles as zzza',sql_in('zzza.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), ''),'','','','',$connect).')'))),array('AND','zzzd.objet=\'breve\'',array('NOT IN','zzzd.id_objet','('.sql_get_select('zzzb.id_breve','spip_breves as zzzb',sql_in('zzzb.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), ''),'','','','',$connect).')'))),array('AND','zzzd.objet=\'forum\'',array('IN','zzzd.id_objet','('.sql_get_select('zzzf.id_forum','spip_forum as zzzf',array(array('OR',array('OR',sql_in('zzzf.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'),array('NOT IN','zzzf.id_article','('.sql_get_select('zzza.id_article','spip_articles as zzza',sql_in('zzza.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), ''),'','','','',$connect).')')),array('NOT IN','zzzf.id_breve','('.sql_get_select('zzzb.id_breve','spip_breves as zzzb',sql_in('zzzb.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), ''),'','','','',$connect).')'))),'','','','',$connect).')'))),sql_in('zzzd.objet',"'rubrique','article','breve','forum'",'NOT',$connect))),'','','','',$connect).')'),
	array('NOT IN','documents.id_document','('.sql_get_select('zzzd.id_document','spip_documents_liens as zzzd','','','','','',$connect).')')
	));
	static $join = array('L1' => array('documents','id_document'), 'L2' => array('documents','extension'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_document']; // doublons

		$t0 .= (
'
                <li>
                    <strong><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))) .
'" title="' .
_T('public/spip/ecrire:bouton_telecharger',array()) .
'" type="' .
interdire_scripts($Pile[$SP]['mime_type']) .
'">' .
interdire_scripts((strlen($a = traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) ? $a : _T('public/spip/ecrire:info_document',array()))) .
'</a></strong>
                    <small>(' .
interdire_scripts($Pile[$SP]['type_document']) .
(($t1 = strval(interdire_scripts(taille_en_octets($Pile[$SP]['taille']))))!=='' ?
		(' &ndash; ' . $t1) :
		'') .
')</small>
                    ' .
interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect))) .
'
                </li>
                ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_principalehtml_19088f70c1803d77b432f3d58f2b2267(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'rubriques';
	static $id = '_principale';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.lang",
		"rubriques.titre",
		"rubriques.texte",
		"rubriques.descriptif",
		"rubriques.id_rubrique");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[0]['id_rubrique'],'','int')), sql_in('rubriques.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
(($t1 = strval(interdire_scripts(textebrut(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))))))!=='' ?
		($t1 . ' - ') :
		'') .
interdire_scripts(textebrut(traiter_doublons_documents($doublons, typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)))) .
'</title>
' .
(($t1 = strval(interdire_scripts(textebrut(filtre_introduction_dist('', $Pile[$SP]['texte'], intval('150'), $connect)))))!=='' ?
		('<meta name="description" content="' . $t1 . '" />') :
		'') .
'
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-head') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

<link rel="alternate" type="application/rss+xml" title="' .
_T('public/spip/ecrire:syndiquer_rubrique',array()) .
'" href="' .
interdire_scripts(parametre_url(generer_url_public('backend'),'id_rubrique',$Pile[$SP]['id_rubrique'])) .
'" />
</head>

<body class="page_rubrique" onload="load()" onunload="GUnload()">
<div id="page">

	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-entete') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

	
    <div id="conteneur">
    <div id="contenu">

	
		' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-menu-lang-rub') . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
         
        
        <div id="hierarchie"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/?lang=' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'">' .
_T('public/spip/ecrire:accueil_site',array()) .
'</a>' .
BOUCLE_arianehtml_19088f70c1803d77b432f3d58f2b2267($Cache, $Pile, $doublons, $Numrows, $SP) .
(($t1 = strval(interdire_scripts(couper(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)),'80'))))!=='' ?
		(' &gt; <strong class="on">' . $t1 . '</strong>') :
		'') .
'</div>

	<div id="principal">
	
        <div class="cartouche">
            ' .
filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']),  ''), '', ''),'200','200')) .
'
            <h1 class="">' .
interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) .
'</h1>
            ' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect)))))!=='' ?
		((	'<div class="chapo">') . $t1 . '</div>') :
		'') .
'
            ' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['texte'], $connect)))))!=='' ?
		((	'<div class="texte">') . $t1 . '</div>') :
		'') .
'
        </div>
        <div class="nettoyeur"></div>

     
 
        
        ' .
(($t1 = BOUCLE_rubsecthtml_19088f70c1803d77b432f3d58f2b2267($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
	        ' . $t1 . '
        ') :
		((	'


	        
	        ' .
	(($t2 = BOUCLE_articleshtml_19088f70c1803d77b432f3d58f2b2267($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			((	'
	        <div class="menu articles">
	            ' .
			filtre_pagination_dist(
	(isset($Numrows['_articles']['grand_total']) ?
		$Numrows['_articles']['grand_total'] : $Numrows['_articles']['total']
	), '_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),10, false, '','', array('lang' => $GLOBALS["spip_lang"] )) .
			'
	            <h2>' .
			_T('public/spip/ecrire:articles_rubrique',array()) .
			'</h2>
	            <ul>
	                ') . $t2 . (	'
	            </ul>
	            ' .
			(($t4 = strval(filtre_pagination_dist(
	(isset($Numrows['_articles']['grand_total']) ?
		$Numrows['_articles']['grand_total'] : $Numrows['_articles']['total']
	), '_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),10, true, '','', array('lang' => $GLOBALS["spip_lang"] ))))!=='' ?
					('<p class="pagination">' . $t4 . '</p>') :
					'') .
			'
	        </div>
	        ')) :
			((	'
	
	        
	        ' .
		(($t3 = BOUCLE_sous_rubriqueshtml_19088f70c1803d77b432f3d58f2b2267($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
				((	'
	        <div class="menu rubriques">
	            <h2>' .
				_T('public/spip/ecrire:sous_rubriques',array()) .
				'</h2>
	            <ul>
	                ') . $t3 . '
	            </ul>
	            </div>
	        ') :
				'') .
		'

	        '))) .
	'
        '))) .
'

        

        
        ' .
(($t1 = BOUCLE_documents_jointshtml_19088f70c1803d77b432f3d58f2b2267($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu" id="documents_joints">
            <h2>' .
		_T('public/spip/ecrire:titre_documents_joints',array()) .
		'</h2>
            <ul>
                ') . $t1 . '
            </ul>
        </div>
        ') :
		'') .
'

        ' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		((	'<div class="notes"><h2>' .
	_T('public/spip/ecrire:info_notes',array()) .
	'</h2>') . $t1 . '</div>') :
		'') .
'

	</div><!--#principal-->

    
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
	\'skel\' => ' . argumenter_squelette('squelettes/rubrique.html') . ',
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
// Fonction principale du squelette squelettes/rubrique.html.
//
function html_19088f70c1803d77b432f3d58f2b2267($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
BOUCLE_principalehtml_19088f70c1803d77b432f3d58f2b2267($Cache, $Pile, $doublons, $Numrows, $SP));

	return analyse_resultat_skel('html_19088f70c1803d77b432f3d58f2b2267', $Cache, $page, 'squelettes/rubrique.html');
}

?>