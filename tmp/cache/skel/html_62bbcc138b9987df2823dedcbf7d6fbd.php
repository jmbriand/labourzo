<?php
/*
 * Squelette : prive/login.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:11:40 GMT (5.8ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette prive/login.html.
//
function html_62bbcc138b9987df2823dedcbf7d6fbd($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Filtre: '.'compacte_head' . '"); ?'.'>
' .
'<'.'?php header("' . (	'Content-Type: text/html; charset=' .
	interdire_scripts($GLOBALS['meta']['charset'])) . '"); ?'.'><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<meta http-equiv="Content-Type" content="text/html; charset=' .
interdire_scripts($GLOBALS['meta']['charset']) .
'" />
<meta name="robots" content="none" />
<meta name="generator" content="SPIP' .
(($t1 = strval(spip_version()))!=='' ?
		(' ' . $t1) :
		'') .
'" />
' .
(($t1 = strval(interdire_scripts(find_in_path('favicon.ico'))))!=='' ?
		('<link rel="shortcut icon" href="' . $t1 . '" />') :
		'') .
'
<link rel="stylesheet" href="' .
interdire_scripts(direction_css(find_in_path('spip_style.css'))) .
'" type="text/css" />
<link rel="stylesheet" href="' .
interdire_scripts(direction_css(find_in_path('minipres.css'))) .
'" type="text/css" />
' .
f_jQuery('') .
'
<script type=\'text/javascript\'><!--
jQuery(function(){ jQuery(\'input#var_login\').focus();
jQuery(\'a#spip_pass\').click(function(){window.open(this.href, \'spip_pass\', \'scrollbars=yes, resizable=yes, width=480, height=330\'); return false;});
});
// --></script>
</head>
<body class="page_login" >

<div id="minipres">

	<h1>' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
'</h1>
	
	
	' .
interdire_scripts(((entites_html((@$Pile[0]['url']),true) == '') ? vide($Pile['vars']['prive'] = ' '):'')) .
'
	' .
interdire_scripts((match(entites_html((@$Pile[0]['url']),true),(	'^' .
	interdire_scripts(eval('return '.'_DIR_RESTREINT_ABS'.';')))) ? vide($Pile['vars']['prive'] = ' '):'')) .
'
	' .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['prive'] : "")))!=='' ?
		($t1 . (	' <h3 class="spip">' .
	_T('public/spip/ecrire:login_acces_prive',array()) .
	'</h3>')) :
		'') .
'
	
	
	' .
executer_balise_dynamique('MENU_LANG_ECRIRE',
	array(htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])),
	array(''), $GLOBALS['spip_lang'],33) .
'
	
	' .
executer_balise_dynamique('FORMULAIRE_LOGIN',
	array(interdire_scripts((strlen($a = entites_html((@$Pile[0]['url']),true)) ? $a : interdire_scripts(generer_url_ecrire('accueil'))))),
	array(''), $GLOBALS['spip_lang'],21) .
'
	<p class="retour">
		' .
(($t1 = strval(tester_config(htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')),'1comite')))!=='' ?
		((	'&#91;<a href="' .
	interdire_scripts(generer_url_public('identifiants','focus=nom_inscription')) .
	'&amp;mode=') . $t1 . (	'" target="spip_pass" onclick="javascript:window.open(this.href, \'spip_pass\', \'scrollbars=yes, resizable=yes, width=480, height=400\'); return false;">' .
	_T('public/spip/ecrire:login_sinscrire',array()) .
	'</a>&#93;')) :
		'') .
'
		&#91;<a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/">' .
_T('public/spip/ecrire:login_retoursitepublic',array()) .
'</a>&#93;
	</p>
	<p class="retour">
		<a href="http://www.spip.net/" title="' .
_T('public/spip/ecrire:site_realise_avec_spip',array()) .
'"><img src="' .
interdire_scripts(find_in_path('spip.png')) .
'" alt="SPIP" width="48" height="16" /></a>
	</p>
	
</div><!--#minipres-->

</body>
</html>');

	return analyse_resultat_skel('html_62bbcc138b9987df2823dedcbf7d6fbd', $Cache, $page, 'prive/login.html');
}

?>