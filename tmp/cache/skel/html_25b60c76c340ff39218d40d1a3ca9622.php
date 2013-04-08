<?php
/*
 * Squelette : squelettes-dist/formulaires/administration.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:12:25 GMT (4.6ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes-dist/formulaires/administration.html.
//
function html_25b60c76c340ff39218d40d1a3ca9622($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
' <div' .
(($t1 = strval(interdire_scripts(entites_html(sinon(@$Pile[0]['divclass'],'spip-admin-bloc'),true))))!=='' ?
		(' class="' . $t1 . '"') :
		'') .
' dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['analyser']),true))))!=='' ?
		('
	<a href="' . $t1 . (	'" class="spip-admin-boutons"
		id="analyser">' .
	_T('public/spip/ecrire:analyse_xml',array()) .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['xhtml_error']),true))))!=='' ?
			(' (' . $t2 . ')') :
			'') .
	'</a>')) :
		'') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['id_article']),true))))!=='' ?
		((	'
	<a href="' .
	interdire_scripts(entites_html((@$Pile[0]['voir_article']),true)) .
	'" class="spip-admin-boutons"
		id="voir_article">' .
	_T('public/spip/ecrire:admin_modifier_article',array()) .
	'
			(') . $t1 . ')</a>') :
		'') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['id_breve']),true))))!=='' ?
		((	'
	<a href="' .
	interdire_scripts(entites_html((@$Pile[0]['voir_breve']),true)) .
	'" class="spip-admin-boutons"
		id="voir_breve">' .
	_T('public/spip/ecrire:admin_modifier_breve',array()) .
	'
			(') . $t1 . ')</a>') :
		'') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['id_rubrique']),true))))!=='' ?
		((	'
	<a href="' .
	interdire_scripts(entites_html((@$Pile[0]['voir_rubrique']),true)) .
	'" class="spip-admin-boutons"
		id="voir_rubrique">' .
	_T('public/spip/ecrire:admin_modifier_rubrique',array()) .
	'
			(') . $t1 . ')</a>') :
		'') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['id_mot']),true))))!=='' ?
		((	'
	<a href="' .
	interdire_scripts(entites_html((@$Pile[0]['voir_mot']),true)) .
	'" class="spip-admin-boutons"
		id="voir_mot">' .
	_T('public/spip/ecrire:admin_modifier_mot',array()) .
	'
			(') . $t1 . ')</a>') :
		'') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['id_syndic']),true))))!=='' ?
		((	'
	<a href="' .
	interdire_scripts(entites_html((@$Pile[0]['voir_site']),true)) .
	'" class="spip-admin-boutons"
		id="voir_site">' .
	_T('public/spip/ecrire:icone_modifier_site',array()) .
	'
			(') . $t1 . ')</a>') :
		'') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['id_auteur']),true))))!=='' ?
		((	'
	<a href="' .
	interdire_scripts(entites_html((@$Pile[0]['voir_auteur']),true)) .
	'" class="spip-admin-boutons"
		id="voir_auteur">' .
	_T('public/spip/ecrire:admin_modifier_auteur',array()) .
	'
			(') . $t1 . ')</a>') :
		'') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['ecrire']),true))))!=='' ?
		('
	<a href="' . $t1 . (	'" class="spip-admin-boutons"
		id="ecrire">' .
	_T('public/spip/ecrire:espace_prive',array()) .
	'</a>')) :
		'') .
'
	<a href="' .
parametre_url(self(),'var_mode',interdire_scripts(entites_html((@$Pile[0]['calcul']),true))) .
'" class="spip-admin-boutons"
		id="var_mode">' .
_T('public/spip/ecrire:admin_recalculer',array()) .
interdire_scripts(entites_html((@$Pile[0]['use_cache']),true)) .
'</a>' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['statistiques']),true))))!=='' ?
		('
	<a href="' . $t1 . (	'" class="spip-admin-boutons"
		id="statistiques">' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['visites']),true))))!=='' ?
			((	_T('public/spip/ecrire:info_visites',array()) .
		'&nbsp;') . $t2) :
			'') .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['popularite']),true))))!=='' ?
			((	';&nbsp;' .
		_T('public/spip/ecrire:info_popularite_5',array()) .
		'&nbsp;') . $t2) :
			'') .
	'</a>')) :
		'') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['preview']),true))))!=='' ?
		('
	<a href="' . $t1 . (	'" class="spip-admin-boutons"
		id="preview">' .
	_T('public/spip/ecrire:previsualisation',array()) .
	'</a>')) :
		'') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['debug']),true))))!=='' ?
		('
	<a href="' . $t1 . (	'" class="spip-admin-boutons"
		id="debug">' .
	_T('public/spip/ecrire:admin_debug',array()) .
	'</a>')) :
		'') .
'
</div>');

	return analyse_resultat_skel('html_25b60c76c340ff39218d40d1a3ca9622', $Cache, $page, 'squelettes-dist/formulaires/administration.html');
}

?>