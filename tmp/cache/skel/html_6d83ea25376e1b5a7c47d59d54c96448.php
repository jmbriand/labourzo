<?php
/*
 * Squelette : squelettes/inc-rubriques.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:11:32 GMT (5.0ms)
 * Boucles :   _rubriques
 */ 
//
// <BOUCLE rubriques>
//
function BOUCLE_rubriqueshtml_6d83ea25376e1b5a7c47d59d54c96448(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in0 = array();
	$in0[]= 1;
	$in0[]= 25;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
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
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])), sql_in('rubriques.id_secteur',sql_quote($in0),'NOT'), sql_in('rubriques.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
		<li class="section' .
$Pile[$SP]['id_rubrique'] .
(calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '')  ?
		(' ' . 'on') :
		'') .
'">
			<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']),  ''), '', ''),'75')) .
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
// Fonction principale du squelette squelettes/inc-rubriques.html.
//
function html_6d83ea25376e1b5a7c47d59d54c96448($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'

' .
(($t1 = BOUCLE_rubriqueshtml_6d83ea25376e1b5a7c47d59d54c96448($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
<div class="menu rubriques">
	<ul>
	' . $t1 . '

	</ul>
</div>
') :
		'') .
'


<div class="entrees">
	<ul>
		<li>
			<a href="spip.php?page=accesEmp&id_article=' .
((htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) == 'br') ? '14':'18') .
'">
			<img class="spip_logos" src="./squelettes/img/demande.png" width="75" alt="demandes">' .
_T('public/spip/ecrire:entree_offre',array()) .
'
			</a>
		</li>		
		<li>
			<a href="spip.php?page=accesDem&id_article=' .
((htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) == 'br') ? '11':'17') .
'">
			<img class="spip_logos" src="./squelettes/img/offre.png" width="75" alt="offres">' .
_T('public/spip/ecrire:entree_demande',array()) .
'</a>
		</li>
	</ul>
	<div class="nettoyeur"></div>			
</div>
');

	return analyse_resultat_skel('html_6d83ea25376e1b5a7c47d59d54c96448', $Cache, $page, 'squelettes/inc-rubriques.html');
}

?>