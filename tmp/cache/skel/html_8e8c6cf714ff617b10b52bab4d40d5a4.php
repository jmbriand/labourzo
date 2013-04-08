<?php
/*
 * Squelette : squelettes/inc-head.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:11:32 GMT (3.1ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes/inc-head.html.
//
function html_8e8c6cf714ff617b10b52bab4d40d5a4($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'

<meta http-equiv="Content-Type" content="text/html; charset=' .
interdire_scripts($GLOBALS['meta']['charset']) .
'" />


<meta name="generator" content="SPIP' .
(($t1 = strval(spip_version()))!=='' ?
		(' ' . $t1) :
		'') .
'" />


<!-- ' .
(($t1 = strval(interdire_scripts(generer_url_public('backend'))))!=='' ?
		((	'<link rel="alternate" type="application/rss+xml" title="' .
	_T('public/spip/ecrire:syndiquer_site',array()) .
	'" href="') . $t1 . '" />') :
		'') .
' -->


' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('spip_style.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="all" />') :
		'') .
'


' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('spip_formulaires.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'


' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('habillage.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'


' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('impression.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="print" />') :
		'') .
'



<!--[if lte IE 6]>
' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('habillage-ie6.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="all" />') :
		'') .
'
<![endif]-->


<!--[if lte IE 7]>
' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('habillage-ie7.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="all" />') :
		'') .
'
<![endif]-->





' .
(($t1 = strval(interdire_scripts(find_in_path('cufon-yui.js'))))!=='' ?
		('<script type="text/javascript" src="' . $t1 . '"></script>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts(find_in_path('cufon.Zag_Regular_400-Zag_Bold_700.font.js'))))!=='' ?
		('<script type="text/javascript" src="' . $t1 . '"></script>') :
		'') .
'
	
    <script type="text/javascript">
       Cufon.replace(\'.sommaire big\');
       Cufon.replace(\'h1\');
       Cufon.replace(\'#sidebar li a big\');
       Cufon.replace(\'#pied ul li h4\');
       
    </script>


' .
'
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push([\'_setAccount\', \'UA-32007776-2\']);
  _gaq.push([\'_trackPageview\']);

  (function() {
    var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
    ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


' .
pipeline('insert_head','<!-- insert_head -->'). '<?php header("X-Spip-Filtre: '.'compacte_head' . '"); ?'.'>
');

	return analyse_resultat_skel('html_8e8c6cf714ff617b10b52bab4d40d5a4', $Cache, $page, 'squelettes/inc-head.html');
}

?>