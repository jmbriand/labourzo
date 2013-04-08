<?php
/*
 * Squelette : plugins/cfg/cfg.css.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:12:25 GMT (1.6ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette plugins/cfg/cfg.css.html.
//
function html_cd16ced6855460c6bb5ed8c8c500c3a5($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 604800"); ?>' .
'<'.'?php header("' . 'Content-Type: text/css; charset=utf-8' . '"); ?'.'>' .
'<'.'?php header("' . 'Vary: Accept-Encoding' . '"); ?'.'>/*  Affichage de la balise CFG_ARBO  */
.cfg_arbo{}
.cfg_arbo h5{padding:0.2em 0.2em; margin:0.2em 0; cursor:pointer;}
.cfg_arbo ul{border:1px solid #ccc; margin:0; padding:0.2em 0.5em; list-style-type:none;}

/* Affichage des crayons/config */
.crayon-icones em.crayon-config {
    background: url(' .
interdire_scripts(find_in_path('images/crayon20.png')) .
') no-repeat;
    height: 20px;
    width: 20px;
    cursor: pointer;
    display: none;
}
.crayon-changed em.crayon-config {
    display: none;
}
');

	return analyse_resultat_skel('html_cd16ced6855460c6bb5ed8c8c500c3a5', $Cache, $page, 'plugins/cfg/cfg.css.html');
}

?>