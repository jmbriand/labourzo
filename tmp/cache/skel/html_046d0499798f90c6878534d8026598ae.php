<?php
/*
 * Squelette : squelettes/article-27.html
 * Date :      Mon, 08 Apr 2013 17:05:01 GMT
 * Compile :   Mon, 08 Apr 2013 17:15:23 GMT (0.015s)
 * Boucles :   _ariane, _mescvs, _mots, _principale
 */ 
//
// <BOUCLE hierarchie>
//
function BOUCLE_arianehtml_046d0499798f90c6878534d8026598ae(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
// <BOUCLE xx_upcurvit>
//
function BOUCLE_mescvshtml_046d0499798f90c6878534d8026598ae(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_upcurvit';
	static $id = '_mescvs';
	static $from = array('xx_upcurvit' => 'xx_upcurvit');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_upcurvit.up_date",
		"xx_upcurvit.up_chemin",
		"xx_upcurvit.up_nom",
		"xx_upcurvit.up_lang",
		"xx_upcurvit.up_id");
	static $orderby = array('xx_upcurvit.up_date');
	$where = 
			array(
			array('=', 'xx_upcurvit.up_idauteur', sql_quote(interdire_scripts(invalideur_session($Cache, (is_array($a = ($GLOBALS["visiteur_session"])) ? $a['id_auteur'] : ""))),'','int')));
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
interdire_scripts((entites_html(sinon(@$Pile[0]['OK'],''),true) ? '':(	'<li><a href="IMG/cvdemandr/' .
	interdire_scripts($Pile[$SP]['up_chemin']) .
	'">' .
	interdire_scripts($Pile[$SP]['up_nom']) .
	'&nbsp; (' .
	interdire_scripts($Pile[$SP]['up_lang']) .
	')</a>
                <form action=\'' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP-1]['id_article'], 'article', '', '', true))) .
	'\' method=\'post\' class="ajax">
				  	 <INPUT TYPE="hidden" id="detcv" NAME="detcv" VALUE="' .
	interdire_scripts($Pile[$SP]['up_id']) .
	'">
				  	 <INPUT TYPE="hidden" NAME=\'OK\' VALUE=\'1\'>
                <input type=\'submit\' value=\'' .
	_T('public/spip/ecrire:detruire',array()) .
	'\' onClick="javascript:return confirm(\'' .
	_T('public/spip/ecrire:confirm_suppr',array()) .
	'\')">
                </form>
                </li>
        '))) .
'
                ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE mots>
//
function BOUCLE_motshtml_046d0499798f90c6878534d8026598ae(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_mots';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre",
		"mots.id_mot");
	static $orderby = array('mots.titre');
	$where = 
			array(
			array('=', 'L1.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')));
	static $join = array('L1' => array('mots','id_mot'));
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
                <li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_mot'], 'mot', '', '', true))) .
'" rel="tag">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</a></li>
                ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_principalehtml_046d0499798f90c6878534d8026598ae(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		"articles.id_rubrique",
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

	
<body class="page_article"  onload="initialize()" onunload="GUnload()">
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
BOUCLE_arianehtml_046d0499798f90c6878534d8026598ae($Cache, $Pile, $doublons, $Numrows, $SP) .
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

	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/' . 'article_traductions', array('lang' => $GLOBALS["spip_lang"] ,'id_article'=>$Pile[$SP]['id_article'],'id'=>$Pile[$SP]['id_article'],'recurs'=>(++$recurs)), array('trim'=>true, 'modele'=>true), ''))
 .
'</div>
		
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

<?PHP require ("squelettes/local_fr.php"); echo _T(\'espace\') ;  ?>
<?PHP include("squelettes/gestionphp/fmajDemSa.php"); ?> 

        
        ' .
(($t1 = BOUCLE_mescvshtml_046d0499798f90c6878534d8026598ae($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu" id="documents_joints">
            <h2>' .
		interdire_scripts((entites_html(sinon(@$Pile[0]['OK'],''),true) ? '':_T('public/spip/ecrire:mes_cvs',array()))) .
		'</h2>
            <ul>
                ') . $t1 . '
            </ul>
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

        
        ' .
(($t1 = BOUCLE_motshtml_046d0499798f90c6878534d8026598ae($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu">
            <h2>' .
		_T('public/spip/ecrire:mots_clefs',array()) .
		'</h2>
            <ul>
                ') . $t1 . '
            </ul>
        </div>
        ') :
		'') .
'
        
    </div><!--#sidebar-->
    <div class="nettoyeur"></div>
		
	</div><!--#contenu-->
	</div><!--#conteneur-->


	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-pied') . ',
	\'skel\' => ' . argumenter_squelette('squelettes/article-27.html') . ',
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
// Fonction principale du squelette squelettes/article-27.html.
//
function html_046d0499798f90c6878534d8026598ae($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
BOUCLE_principalehtml_046d0499798f90c6878534d8026598ae($Cache, $Pile, $doublons, $Numrows, $SP));

	return analyse_resultat_skel('html_046d0499798f90c6878534d8026598ae', $Cache, $page, 'squelettes/article-27.html');
}

?>