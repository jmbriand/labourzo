<?php
/*
 * Squelette : prive/modeles/img.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:11:32 GMT (0.012s)
 * Boucles :   _document
 */ 
//
// <BOUCLE documents>
//
function BOUCLE_documenthtml_cb2e6ffadeadceb4715a6a7d1b0819d5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in3 = array();
	if (!(is_array($a = ($Pile[0]['mode']))))
		$in3[]= $a;
	else $in3 = array_merge($in3, $a);if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'documents';
	static $id = '_document';
	static $from = array('documents' => 'spip_documents','L1' => 'spip_types_documents');
	static $type = array();
	static $groupby = array();
	static $select = array("documents.id_document",
		"documents.mode",
		"documents.largeur",
		"documents.hauteur",
		"documents.titre",
		"L1.mime_type",
		"L1.titre AS type_document",
		"documents.id_document");
	static $orderby = array();
	$where = 
			array(
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'documents.id_document', sql_quote($Pile[0]['id_document'],'','int')), (!$Pile[0]['mode'] ? '' : ((is_array($Pile[0]['mode'])) ? sql_in('documents.mode',sql_quote($in3)) : 
			array('=', 'documents.mode', sql_quote($Pile[0]['mode'])))), array('OR',
	array('IN','documents.id_document','('.sql_get_select('zzzd.id_document','spip_documents_liens as zzzd',array(array('OR',array('OR',array('OR',array('OR',array('AND','zzzd.objet=\'rubrique\'',sql_in('zzzd.id_objet', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT')),array('AND','zzzd.objet=\'article\'',array('NOT IN','zzzd.id_objet','('.sql_get_select('zzza.id_article','spip_articles as zzza',sql_in('zzza.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), ''),'','','','',$connect).')'))),array('AND','zzzd.objet=\'breve\'',array('NOT IN','zzzd.id_objet','('.sql_get_select('zzzb.id_breve','spip_breves as zzzb',sql_in('zzzb.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), ''),'','','','',$connect).')'))),array('AND','zzzd.objet=\'forum\'',array('IN','zzzd.id_objet','('.sql_get_select('zzzf.id_forum','spip_forum as zzzf',array(array('OR',array('OR',sql_in('zzzf.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'),array('NOT IN','zzzf.id_article','('.sql_get_select('zzza.id_article','spip_articles as zzza',sql_in('zzza.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), ''),'','','','',$connect).')')),array('NOT IN','zzzf.id_breve','('.sql_get_select('zzzb.id_breve','spip_breves as zzzb',sql_in('zzzb.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), ''),'','','','',$connect).')'))),'','','','',$connect).')'))),sql_in('zzzd.objet',"'rubrique','article','breve','forum'",'NOT',$connect))),'','','','',$connect).')'),
	array('NOT IN','documents.id_document','('.sql_get_select('zzzd.id_document','spip_documents_liens as zzzd','','','','','',$connect).')')
	));
	static $join = array('L1' => array('documents','extension'));
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
vide($Pile['vars']['image'] = interdire_scripts(((strlen($a = match($Pile[$SP]['mode'],'image|vignette')) ? $a : interdire_scripts(entites_html((@$Pile[0]['embed']),true))) ? ' ':''))) .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['image'] : "")))!=='' ?
		($t1 . (	'
<span class=\'spip_document_' .
	$Pile[$SP]['id_document'] .
	' spip_documents' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['align']),true))))!=='' ?
			(' spip_documents_' . $t2) :
			'') .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['class']),true))))!=='' ?
			(' ' . $t2) :
			'') .
	' spip_lien_ok\'' .
	(($t2 = strval(interdire_scripts(match(entites_html((@$Pile[0]['align']),true),'left|right'))))!=='' ?
			(' style=\'float:' . $t2 . (	';' .
		(($t3 = strval(interdire_scripts($Pile[$SP]['largeur'])))!=='' ?
				(' width:' . $t3 . 'px;') :
				'') .
		'\'')) :
			'') .
	'>
' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['lien']),true))))!=='' ?
			('<a href="' . $t2 . (	'"' .
		(($t3 = strval(interdire_scripts(entites_html((@$Pile[0]['lien_class']),true))))!=='' ?
				(' class="' . $t3 . '"') :
				'') .
		'>')) :
			'') .
	'<img src=\'' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))) .
	'\'' .
	(($t2 = strval(interdire_scripts($Pile[$SP]['largeur'])))!=='' ?
			(' width="' . $t2 . '"') :
			'') .
	(($t2 = strval(interdire_scripts($Pile[$SP]['hauteur'])))!=='' ?
			(' height="' . $t2 . '"') :
			'') .
	' alt="' .
	interdire_scripts(texte_backend(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) .
	'"' .
	(($t2 = strval(interdire_scripts(texte_backend(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	' />' .
	interdire_scripts((entites_html((@$Pile[0]['lien']),true) ? '</a>':'')) .
	'</span>
')) :
		'') .
(!(is_array($a = ($Pile["vars"])) ? $a['image'] : "")  ?
		(' ' . (	'
<span class=\'spip_document_' .
	$Pile[$SP]['id_document'] .
	' spip_documents' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['align']),true))))!=='' ?
			(' spip_documents_' . $t2) :
			'') .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['class']),true))))!=='' ?
			(' ' . $t2) :
			'') .
	' spip_lien_ok\'' .
	(($t2 = strval(interdire_scripts(match(entites_html((@$Pile[0]['align']),true),'left|right'))))!=='' ?
			(' style=\'float:' . $t2 . (	';' .
		(($t3 = strval(largeur(calcule_logo_document($Pile[$SP]['id_document'], '', $doublons, 0, '', '', '',''))))!=='' ?
				(' width:' . $t3 . 'px;') :
				'') .
		'\'')) :
			'') .
	'><a href="' .
	interdire_scripts((strlen($a = entites_html((@$Pile[0]['lien']),true)) ? $a : vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))))) .
	'"' .
	(($t2 = strval(interdire_scripts((entites_html((@$Pile[0]['lien']),true) ? '':(	'type="' .
		interdire_scripts($Pile[$SP]['mime_type']) .
		'"')))))!=='' ?
			(' ' . $t2) :
			'') .
	(($t2 = strval(interdire_scripts(texte_backend(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	'>' .
	inserer_attribut(calcule_logo_document($Pile[$SP]['id_document'], '', $doublons, 0, '', '', '',''),'alt',interdire_scripts((strlen(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) ? (	interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
			' {' .
			interdire_scripts($Pile[$SP]['type_document']) .
			'}'):interdire_scripts($Pile[$SP]['type_document'])))) .
	'</a></span>
')) :
		''));
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette prive/modeles/img.html.
//
function html_cb2e6ffadeadceb4715a6a7d1b0819d5($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_documenthtml_cb2e6ffadeadceb4715a6a7d1b0819d5($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_cb2e6ffadeadceb4715a6a7d1b0819d5', $Cache, $page, 'prive/modeles/img.html');
}

?>