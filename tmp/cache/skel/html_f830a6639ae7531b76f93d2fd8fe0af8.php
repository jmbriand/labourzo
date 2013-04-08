<?php
/*
 * Squelette : squelettes/inc-pied.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:11:32 GMT (5.9ms)
 * Boucles :   _article_ubapar, _article_contact
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_article_ubaparhtml_f830a6639ae7531b76f93d2fd8fe0af8(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in1 = array();
	$in1[]= 35;
	$in1[]= 36;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'articles';
	static $id = '_article_ubapar';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.texte",
		"articles.id_rubrique",
		"articles.lang");
	$orderby = array(((!sql_quote($in1) OR sql_quote($in1)==="''") ? 0 : ('FIELD(articles.id_article,' . sql_quote($in1) . ')')));
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), sql_in('articles.id_article',sql_quote($in1)), 
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
		<h4>&nbsp;</h4>
		' .
interdire_scripts(propre($Pile[$SP]['texte'], $connect)) .
'
	');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_article_contacthtml_f830a6639ae7531b76f93d2fd8fe0af8(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in2 = array();
	$in2[]= 37;
	$in2[]= 38;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'articles';
	static $id = '_article_contact';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.titre",
		"articles.texte",
		"articles.id_rubrique",
		"articles.lang");
	$orderby = array(((!sql_quote($in2) OR sql_quote($in2)==="''") ? 0 : ('FIELD(articles.id_article,' . sql_quote($in2) . ')')));
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), sql_in('articles.id_article',sql_quote($in2)), 
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
		<h4>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</h4>
		' .
interdire_scripts(propre($Pile[$SP]['texte'], $connect)) .
'
	');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes/inc-pied.html.
//
function html_f830a6639ae7531b76f93d2fd8fe0af8($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div id="pied">
	<ul>
	
	<li class="UBAPAR">
	' .
BOUCLE_article_ubaparhtml_f830a6639ae7531b76f93d2fd8fe0af8($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	</li>
	
	<li class="contact-mentions">
	<div>
	' .
BOUCLE_article_contacthtml_f830a6639ae7531b76f93d2fd8fe0af8($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	</div>
	
	<div>
		<h4>' .
_T('public/spip/ecrire:filrss',array()) .
'</h4>
		<p>Les fils RSS (non activés pour le moment)</p>
	</div>
	</li>
	
	<li class="rss-plan">
		<h4>' .
_T('public/spip/ecrire:mentions_titre',array()) .
'</h4>
		<p>' .
_T('public/spip/ecrire:mentions_contenu',array()) .
'</p>
	
	</li>
	
	<li class="acces-admin">
	' .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, ((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['id_auteur'] : "") ? ' ':'')))))!=='' ?
		($t1 . (	'<a href="' .
	executer_balise_dynamique('URL_LOGOUT',
	array('spip.php?page=sommaire'),
	array(''), $GLOBALS['spip_lang'],32) .
	'" rel="nofollow">' .
	_T('public/spip/ecrire:icone_deconnecter',array()) .
	'</a>')) :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, ((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['id_auteur'] : "") ? '':' ')))))!=='' ?
		($t1 . (	' <a href="' .
	interdire_scripts(parametre_url(generer_url_public('login'),'url',self())) .
	'" rel="nofollow" class=\'login_modal\'>' .
	_T('public/spip/ecrire:lien_connecter',array()) .
	'</a>
	<br><a href="' .
	interdire_scripts(parametre_url(generer_url_public('login'),'url','spip.php?rubrique30&lang=fr')) .
	'" rel="nofollow" class=\'login_modal\'>ADMIN</a>')) :
		'') .
'
	</li>
	
	</ul>
</div>

<!--[if IE]> <script type="text/javascript"> Cufon.now(); </script> <![endif]-->

' .
"<!-- SPIP-CRON --><div style=\"background-image: url('http://ubajm/spip.php?action=cron');\"></div>" .
'
');

	return analyse_resultat_skel('html_f830a6639ae7531b76f93d2fd8fe0af8', $Cache, $page, 'squelettes/inc-pied.html');
}

?>