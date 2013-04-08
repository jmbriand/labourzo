<?php
/*
 * Squelette : squelettes/inc-derniers-articles.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:12:25 GMT (9.9ms)
 * Boucles :   _offres, _demandes
 */ 
//
// <BOUCLE xx_employr>
//
function BOUCLE_offreshtml_0587f44c25d4b58bb5f6d4380765fb11(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_employr';
	static $id = '_offres';
	static $from = array('xx_employr' => 'xx_employr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_employr.emp_datmodif",
		"xx_employr.emp_domaines",
		"xx_employr.emp_id",
		"xx_employr.emp_nom",
		"xx_employr.emp_poste");
	static $orderby = array('xx_employr.emp_datmodif DESC');
	static $where = 
			array();
	static $join = array();
	static $limit = '0,5';
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
					<li class="hentry">
					<h3 class="entry-title">
					<a href="spip.php?page=voirFiche&id_article=
						' .
interdire_scripts((($Pile[$SP]['emp_domaines'] == 'CVL') ? ((htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) == 'br') ? '8':'7'):(	interdire_scripts((($Pile[$SP]['emp_domaines'] == 'Petite enf.') ? ((htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) == 'br') ? '32':'31'):(	interdire_scripts((($Pile[$SP]['emp_domaines'] == 'Ecoles') ? ((htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) == 'br') ? '22':'16'):(	interdire_scripts((($Pile[$SP]['emp_domaines'] == 'Action culturelle') ? ((htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) == 'br') ? '24':'23'):'7')) .
			'
								'))) .
		'
							'))) .
	'
						'))) .
'
					&emp_id=' .
interdire_scripts($Pile[$SP]['emp_id']) .
'">
					<small><em>' .
interdire_scripts($Pile[$SP]['emp_nom']) .
'</em> <abbr class="published">' .
interdire_scripts(affdate_jourcourt($Pile[$SP]['emp_datmodif'])) .
'</abbr><hr /></small>
					<strong>' .
interdire_scripts($Pile[$SP]['emp_poste']) .
'</strong></a>
					</h3>
					</li>
					');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_demandr>
//
function BOUCLE_demandeshtml_0587f44c25d4b58bb5f6d4380765fb11(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_demandr';
	static $id = '_demandes';
	static $from = array('xx_demandr' => 'xx_demandr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_demandr.dem_datmodif",
		"xx_demandr.dem_id",
		"xx_demandr.dem_prenom",
		"xx_demandr.dem_nom",
		"xx_demandr.dem_domaines");
	static $orderby = array('xx_demandr.dem_datmodif DESC');
	static $where = 
			array();
	static $join = array();
	static $limit = '0,5';
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
						<li class="hentry">
						<h3 class="entry-title">
						<a href="spip.php?page=voirFiche&id_article=' .
((htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) == 'br') ? '34':'33') .
'&dem_id=' .
interdire_scripts($Pile[$SP]['dem_id']) .
'">
						<small><strong>' .
interdire_scripts($Pile[$SP]['dem_prenom']) .
' ' .
interdire_scripts($Pile[$SP]['dem_nom']) .
'</strong> <abbr class="published">' .
interdire_scripts(affdate_jourcourt($Pile[$SP]['dem_datmodif'])) .
'</abbr><hr /></small> 
						<em>' .
((htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) == 'br') ? interdire_scripts(replace(replace(replace(replace(replace(replace($Pile[$SP]['dem_domaines'],',',', '),'C.V.L.','Buhezi&ntilde;'),'Baby sitting','Diwall bugale'),'Petite enfance','Bugale vihan'),'Ecoles','Skolioù'),'Action culturelle','Ober sevenadurel')):(	interdire_scripts(replace(replace(replace($Pile[$SP]['dem_domaines'],',',', '),'C.V.L.','Animation'),'Ecoles','&Eacute;coles')) .
	'
						')) .
'</em></a></h3>
						</li>
					');
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes/inc-derniers-articles.html.
//
function html_0587f44c25d4b58bb5f6d4380765fb11($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?><div class="derniers_articles">
			' .
(($t1 = BOUCLE_offreshtml_0587f44c25d4b58bb5f6d4380765fb11($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
			<h2>' .
		_T('public/spip/ecrire:dernieres_offres',array()) .
		'</h2>
			<ul id="dernieres_offres">
					') . $t1 . '
			</ul>
			') :
		'') .
'

			' .
(($t1 = BOUCLE_demandeshtml_0587f44c25d4b58bb5f6d4380765fb11($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
			<h2>' .
		_T('public/spip/ecrire:dernieres_demandes',array()) .
		'</h2>
			<ul id="dernieres_demandes">
					') . $t1 . '
			</ul>
			') :
		'') .
'
			
		</div>');

	return analyse_resultat_skel('html_0587f44c25d4b58bb5f6d4380765fb11', $Cache, $page, 'squelettes/inc-derniers-articles.html');
}

?>