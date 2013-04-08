<?php
/*
 * Squelette : squelettes/accesEmp.html
 * Date :      Mon, 08 Apr 2013 17:05:01 GMT
 * Compile :   Mon, 08 Apr 2013 17:15:13 GMT (0.014s)
 * Boucles :   _ariane, _traductions, _article, _principale
 */ 
//
// <BOUCLE hierarchie>
//
function BOUCLE_arianehtml_ab8bf64152c1c39fe2f0d9af87d8dcbe(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
function BOUCLE_traductionshtml_ab8bf64152c1c39fe2f0d9af87d8dcbe(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
	(calcul_exposer($Pile[$SP]['id_article'], 'id_article', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_article', '') ? '' : (	'<a href="spip.php?page=accesEmp&id_article=' .
		$Pile[$SP]['id_article'] .
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
function BOUCLE_articlehtml_ab8bf64152c1c39fe2f0d9af87d8dcbe(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
' .
(($t1 = BOUCLE_traductionshtml_ab8bf64152c1c39fe2f0d9af87d8dcbe($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
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
// <BOUCLE articles>
//
function BOUCLE_principalehtml_ab8bf64152c1c39fe2f0d9af87d8dcbe(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		"articles.url_site",
		"articles.nom_site",
		"articles.ps",
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

<body class="acces emploi">
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
BOUCLE_arianehtml_ab8bf64152c1c39fe2f0d9af87d8dcbe($Cache, $Pile, $doublons, $Numrows, $SP) .
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
BOUCLE_articlehtml_ab8bf64152c1c39fe2f0d9af87d8dcbe($Cache, $Pile, $doublons, $Numrows, $SP) .
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
		' .
((htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) == 'br') ? executer_balise_dynamique('LOGIN_PUBLIC',
	array(@$Pile[0]['url'],vider_url(urlencode_1738(generer_url_entite('13', 'article', '', '', true)))),
	array(''), $GLOBALS['spip_lang'],0):executer_balise_dynamique('LOGIN_PUBLIC',
	array(@$Pile[0]['url'],vider_url(urlencode_1738(generer_url_entite('19', 'article', '', '', true)))),
	array(''), $GLOBALS['spip_lang'],0)) .
'
		</div>


		' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	'<p class="hyperlien">' .
	_T('public/spip/ecrire:voir_en_ligne',array()) .
	' : <a href="') . $t1 . (	'" class="spip_out">' .
	interdire_scripts((strlen($a = typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) ? $a : couper(calculer_url($Pile[$SP]['url_site'],'','url', $connect),'80'))) .
	'</a></p>')) :
		'') .
'
        
		' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['ps'], $connect),'500','0')))))!=='' ?
		((	'<div class="ps surlignable"><h2 class="pas_surlignable">' .
	_T('public/spip/ecrire:info_ps',array()) .
	'</h2><div class="">') . $t1 . '</div></div>') :
		'') .
'



		
		' .
recuperer_fond('', array_merge($Pile[0],array('fond' => 'inc-documents' ,
	'id_article' => $Pile[$SP]['id_article'] )), array()) .
'


		' .
(quete_petitions($Pile[$SP]['id_article'],'articles','_principale','', $Cache)  ?
		(' ' . 
'<?php
	$contexte_inclus = array_merge('.var_export($Pile[0],1).',array(\'fond\' => ' . argumenter_squelette('inc-petition') . ',
	\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '));
	echo "<div class=\'ajaxbloc env-'
			. eval('return encoder_contexte_ajax(array_merge('.var_export($Pile[0],1).',array(\'fond\' => ' . argumenter_squelette('inc-petition') . ',
	\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')));')
			. '\'>\n";
	include _DIR_RESTREINT . "public.php";
	echo "</div><!-- ajaxbloc -->\n";
?'.'>') :
		'') .
'

        ' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		((	'<div class="notes surlignable"><h2 class="pas_surlignable">' .
	_T('public/spip/ecrire:info_notes',array()) .
	'</h2>') . $t1 . '</div>') :
		'') .
'

		
		<a href="#forum" name="forum" id="forum"></a>
		' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-forum') . ',
	\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
		' .
(($t1 = strval(url_reponse_forum(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum($Pile[$SP]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum($Pile[$SP]['id_article']) == ""))
		? "" : // sinon:
		(lang_parametres_forum("id_article=".$Pile[$SP]['id_article'],$Pile[$SP]['lang']).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<p class="repondre"><a href="' . $t1 . (	'" rel="noindex nofollow">' .
	_T('public/spip/ecrire:repondre_article',array()) .
	'</a></p>')) :
		'') .
' 



		</div> <!-- principal -->

	    
	    <div id="sidebar">
	
	        
	        ' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-derniers-articles') . ',
	\'skel\' => ' . argumenter_squelette('squelettes/accesEmp.html') . ',
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
	\'skel\' => ' . argumenter_squelette('squelettes/accesEmp.html') . ',
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
// Fonction principale du squelette squelettes/accesEmp.html.
//
function html_ab8bf64152c1c39fe2f0d9af87d8dcbe($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_principalehtml_ab8bf64152c1c39fe2f0d9af87d8dcbe($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_ab8bf64152c1c39fe2f0d9af87d8dcbe', $Cache, $page, 'squelettes/accesEmp.html');
}

?>