<?php
/*
 * Squelette : ../plugins/contact100312/prive/style_prive_plugin_contact.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:11:58 GMT (4.3ms)
 * Boucles :   _img
 */ 
//
// <BOUCLE pour>
//
function BOUCLE_imghtml_3a9456665fdb9653b7fce95d5b99392e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = 'pour';
	static $table = 'pour';
	static $id = '_img';
	static $from = array('pour' => 'pour');
	static $type = array();
	static $groupby = array();
	static $select = array("pour.valeur");
	static $orderby = array();
	static $where = 
			array();
	static $join = array();
	static $limit = '';
	static $having = 
			array(
			array('tableau', '1:15'));
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'pour')) {

		$t0 .= (
'
.img' .
interdire_scripts($Pile[$SP]['valeur']) .
' {background-image: url(' .
(($t1 = strval(interdire_scripts(find_in_path((	'images/img' .
	interdire_scripts(concat($Pile[$SP]['valeur'],'.png')))))))!=='' ?
		($t1 . ');') :
		'') .
'}
');
	}

	@sql_free($result, 'pour');
	return $t0;
}



//
// Fonction principale du squelette ../plugins/contact100312/prive/style_prive_plugin_contact.html.
//
function html_3a9456665fdb9653b7fce95d5b99392e($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
'<?php header("X-Spip-Cache: 360000"); ?>'.'<?php header("Cache-Control: max-age=360000"); ?>'.'<?php header("X-Spip-Statique: oui"); ?>' .
'<'.'?php header("' . 'Content-Type: text/css; charset=iso-8859-15' . '"); ?'.'>' .
'<'.'?php header("' . 'Vary: Accept-Encoding' . '"); ?'.'>.formulaire_config_contact .agrondir {display:block;width:80%;margin:0 0 2px 5px;padding:10px 0 5px 0;-moz-border-radius:5px;-webkit-border-radius:5px;border:1px dashed #ddd;background-position: 97% 20%;background-repeat: no-repeat;}
' .
BOUCLE_imghtml_3a9456665fdb9653b7fce95d5b99392e($Cache, $Pile, $doublons, $Numrows, $SP) .
'
.formulaire_config_contact .enf {padding-left:5px;}
.formulaire_config_contact .selection {padding-left:10px;}
.formulaire_config_contact .bord {border:1px dashed #ccc;padding:5px;}
.formulaire_config_contact .bord:hover {background-color:#fcfff0;}
.formulaire_config_contact .top {border-top:0;}
.formulaire_config_contact .bottom {border-bottom:0;}

.formulaire_config_contact li.agrondir:hover {background-color:#fcfff0;}
.formulaire_config_contact .decaler {margin-bottom:5px;padding-left:10px;border-bottom:1px solid #eee;}
.formulaire_config_contact ul.decaler10 {margin-bottom:5px;border-bottom:1px solid #eee;}
.formulaire_config_contact li, .formulaire_config_contact {border:none;padding-left:10px;}
.formulaire_config_contact .baisser {padding-top:5px;}
.formulaire_config_contact .baisser10 {padding:5px 0 10px 0;}');

	return analyse_resultat_skel('html_3a9456665fdb9653b7fce95d5b99392e', $Cache, $page, '../plugins/contact100312/prive/style_prive_plugin_contact.html');
}

?>