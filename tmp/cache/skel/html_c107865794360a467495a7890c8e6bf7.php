<?php
/*
 * Squelette : squelettes/404.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:11:32 GMT (3.8ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes/404.html.
//
function html_c107865794360a467495a7890c8e6bf7($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . 'HTTP/1.0 404 Not Found' . '"); ?'.'>' .
'<'.'?php header("' . 'Cache-Control: no-store, no-cache, must-revalidate' . '"); ?'.'>' .
'<'.'?php header("' . 'Pragma: no-cache' . '"); ?'.'><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
_T('public/spip/ecrire:pass_erreur',array()) .
' 404 - ' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-head') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
<meta name="robots" content="none" />
</head>
<body class="page_404">
	<div id="page">

	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-entete') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

	<div id="conteneur">
    <div id="contenu">
        
        <div id="hierarchie"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/?lang=' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'">' .
_T('public/spip/ecrire:accueil_site',array()) .
'</a> &gt; <strong class="on">' .
_T('public/spip/ecrire:pass_erreur',array()) .
' 404</strong></div>
	
	<div id="principal">

        <div class="cartouche">
        <h1>' .
_T('public/spip/ecrire:pass_erreur',array()) .
' 404</h1>
        <p>' .
_T('public/spip/ecrire:acces_non_autorise',array()) .
'</p>
        </div>
        ' .
(($t1 = strval(interdire_scripts(propre((@$Pile[0]['erreur'])))))!=='' ?
		('<div class="chapo">' . $t1 . '</div>') :
		'') .
'
	
	</div><!--  principal -->

	<div id="sidebar">

        
        ' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-rubriques') . ',
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
	\'skel\' => ' . argumenter_squelette('squelettes/404.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

	</div><!--#page-->
</body>
</html>
');

	return analyse_resultat_skel('html_c107865794360a467495a7890c8e6bf7', $Cache, $page, 'squelettes/404.html');
}

?>