<?php
/*
 * Squelette : squelettes/inc-listes-offres-demdes.html
 * Date :      Mon, 08 Apr 2013 17:05:01 GMT
 * Compile :   Mon, 08 Apr 2013 17:13:54 GMT (0.016s)
 * Boucles :   _offresA, _demandesA, _anim, _baby, _offresD, _petitenf, _offresB, _demandesB, _ecoles, _offresC, _demandesC, _actcult
 */ 
//
// <BOUCLE xx_employr>
//
function BOUCLE_offresAhtml_2a4ed425c9642cf06725b4dae8ba2d16(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_employr';
	static $id = '_offresA';
	static $from = array('xx_employr' => 'xx_employr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_employr.emp_datmodif",
		"xx_employr.emp_id",
		"xx_employr.emp_nom",
		"xx_employr.emp_poste",
		"xx_employr.emp_durdates");
	static $orderby = array('xx_employr.emp_datmodif DESC');
	static $where = 
			array(
			array('LIKE', 'xx_employr.emp_domaines', "'%CVL%'"));
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
          <li>
	          <a href="spip.php?page=voirFiche&id_article=' .
((htmlentities($Pile[$SP-1]['lang'] ? $Pile[$SP-1]['lang'] : $GLOBALS['spip_lang']) == 'br') ? '8':'7') .
'&emp_id=' .
interdire_scripts($Pile[$SP]['emp_id']) .
'" title="Consulter cette offre">
	          <small>' .
interdire_scripts($Pile[$SP]['emp_nom']) .
'</small> <big>' .
interdire_scripts($Pile[$SP]['emp_poste']) .
' </big> <q>' .
interdire_scripts($Pile[$SP]['emp_durdates']) .
'</q>
	          </a>
          </li>
          ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_demandr>
//
function BOUCLE_demandesAhtml_2a4ed425c9642cf06725b4dae8ba2d16(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_demandr';
	static $id = '_demandesA';
	static $from = array('xx_demandr' => 'xx_demandr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_demandr.dem_datmodif",
		"xx_demandr.dem_id",
		"xx_demandr.dem_prenom",
		"xx_demandr.dem_nom",
		"xx_demandr.dem_diplomes");
	static $orderby = array('xx_demandr.dem_datmodif DESC');
	static $where = 
			array(
			array('LIKE', 'xx_demandr.dem_domaines', "'%C.V.L.%'"));
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
          <li>
	          <a href="spip.php?page=voirFiche&id_article=' .
((htmlentities($Pile[$SP-1]['lang'] ? $Pile[$SP-1]['lang'] : $GLOBALS['spip_lang']) == 'br') ? '25':'26') .
'&dem_id=' .
interdire_scripts($Pile[$SP]['dem_id']) .
'" title="Consulter cette demande">
	          <big>' .
interdire_scripts($Pile[$SP]['dem_prenom']) .
'&nbsp;' .
interdire_scripts($Pile[$SP]['dem_nom']) .
'</big> <small>' .
((htmlentities($Pile[$SP-1]['lang'] ? $Pile[$SP-1]['lang'] : $GLOBALS['spip_lang']) == 'br') ? interdire_scripts(replace(replace(replace(replace(replace(replace(replace($Pile[$SP]['dem_diplomes'],',',', '),'B.A.F.A.','DABU'),'Stagiaire BAFA','Stajiad DABU'),'B.A.F.D.','DARE'),'Stagiaire BAFD','Stajiad DARE'),'Surveillant de baignade','Evezhier kouronkañ'),'Premiers secours','Sikourioù kentañ')):(	interdire_scripts(replace($Pile[$SP]['dem_diplomes'],',',', ')) .
	'
						')) .
'</small>
	          </a>
          </li>
          ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_animhtml_2a4ed425c9642cf06725b4dae8ba2d16(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in2 = array();
	$in2[]= 6;
	$in2[]= 7;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'rubriques';
	static $id = '_anim';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.lang",
		"rubriques.id_rubrique");
	$orderby = array(((!sql_quote($in2) OR sql_quote($in2)==="''") ? 0 : ('FIELD(rubriques.id_rubrique,' . sql_quote($in2) . ')')));
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[0]['id_rubrique'],'','int')), sql_in('rubriques.id_rubrique',sql_quote($in2)), sql_in('rubriques.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
<div class="liste offre">
 ' .
(($t1 = BOUCLE_offresAhtml_2a4ed425c9642cf06725b4dae8ba2d16($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <h2>' .
		_T('public/spip/ecrire:offres_en_cours',array()) .
		'</h2>
      <ul>
          ') . $t1 . '
      </ul>
  ') :
		((	'
     <h2>' .
	_T('public/spip/ecrire:aucune_offre',array()) .
	'</h2>
  '))) .
'
</div>
  
<div class="liste demande">
  ' .
(($t1 = BOUCLE_demandesAhtml_2a4ed425c9642cf06725b4dae8ba2d16($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <h2>' .
		_T('public/spip/ecrire:demandes_en_cours',array()) .
		'</h2>
      <ul>
          ') . $t1 . '
      </ul>
  ') :
		((	'
     <h2>' .
	_T('public/spip/ecrire:aucune_demande',array()) .
	'</h2>
  '))) .
'
</div>
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_babyhtml_2a4ed425c9642cf06725b4dae8ba2d16(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in3 = array();
	$in3[]= 2;
	$in3[]= 4;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'rubriques';
	static $id = '_baby';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.lang",
		"rubriques.id_rubrique");
	$orderby = array(((!sql_quote($in3) OR sql_quote($in3)==="''") ? 0 : ('FIELD(rubriques.id_rubrique,' . sql_quote($in3) . ')')));
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[0]['id_rubrique'],'','int')), sql_in('rubriques.id_rubrique',sql_quote($in3)), sql_in('rubriques.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-gmkey') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>' .
'
 <script type="text/javascript">
//<![CDATA[

    function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map_canvas"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(48, -2.6), 7);

        GDownloadUrl("squelettes/gestionphp/phpsqlajax_genxml2.php", function(data) {
          var xml = GXml.parse(data);
          var markers = xml.documentElement.getElementsByTagName("marker");
          for (var i = 0; i < markers.length; i++) {
            var idaut = markers[i].getAttribute("idaut");
            var prenom = markers[i].getAttribute("prenom");
            var nom = markers[i].getAttribute("nom");
            var cp = markers[i].getAttribute("cp");
            var commune = markers[i].getAttribute("commune");
            var point = new GLatLng(parseFloat(markers[i].getAttribute("lat")),
                                    parseFloat(markers[i].getAttribute("lng")));
            var marker = createMarker(point, prenom, nom, cp, commune, idaut);
            map.addOverlay(marker);
          }
        });
      } else {
alert("Sorry, the Google Maps API is not compatible with this browser.");
}
    }

    function createMarker(point, prenom, nom, cp, commune, idaut) {
      var marker = new GMarker(point);
      var html = "<b>" + prenom + "  " + nom + "</b> <br/>" + cp + "  " + commune + "<br/>" + 
				      "<a href=\'spip.php?page=contactVisit&id_auteur=" + idaut + "&lang=' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'\'>Envoyer un mail</a>";
      GEvent.addListener(marker, \'click\', function() {
        marker.openInfoWindowHtml(html);
      });
      return marker;
    }
//]]>
  </script>
  
     <h2>' .
_T('public/spip/ecrire:demandes_en_cours',array()) .
'</h2>
	<div id="map_canvas" style="width: 530px; height: 400px"></div>

');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_employr>
//
function BOUCLE_offresDhtml_2a4ed425c9642cf06725b4dae8ba2d16(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_employr';
	static $id = '_offresD';
	static $from = array('xx_employr' => 'xx_employr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_employr.emp_datmodif",
		"xx_employr.emp_id",
		"xx_employr.emp_nom",
		"xx_employr.emp_poste",
		"xx_employr.emp_durdates");
	static $orderby = array('xx_employr.emp_datmodif DESC');
	static $where = 
			array(
			array('LIKE', 'xx_employr.emp_domaines', "'%Petite%'"));
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
          <li><a href="spip.php?page=voirFiche&id_article=' .
((htmlentities($Pile[$SP-1]['lang'] ? $Pile[$SP-1]['lang'] : $GLOBALS['spip_lang']) == 'br') ? '32':'31') .
'&emp_id=' .
interdire_scripts($Pile[$SP]['emp_id']) .
'">
	          <small>' .
interdire_scripts($Pile[$SP]['emp_nom']) .
'</small> 
	          <big>' .
interdire_scripts($Pile[$SP]['emp_poste']) .
'</big> <q>' .
interdire_scripts($Pile[$SP]['emp_durdates']) .
'</q>
	          </a>
          </li>
          ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_petitenfhtml_2a4ed425c9642cf06725b4dae8ba2d16(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in4 = array();
	$in4[]= 3;
	$in4[]= 10;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'rubriques';
	static $id = '_petitenf';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.lang",
		"rubriques.id_rubrique");
	$orderby = array(((!sql_quote($in4) OR sql_quote($in4)==="''") ? 0 : ('FIELD(rubriques.id_rubrique,' . sql_quote($in4) . ')')));
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[0]['id_rubrique'],'','int')), sql_in('rubriques.id_rubrique',sql_quote($in4)), sql_in('rubriques.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-gmkey') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>' .
'
 <script type="text/javascript">
//<![CDATA[

    function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map_canvas"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(48, -2.6), 7);

        GDownloadUrl("squelettes/gestionphp/phpsqlajax_genxml2PE.php", function(data) {
          var xml = GXml.parse(data);
          var markers = xml.documentElement.getElementsByTagName("marker");
          for (var i = 0; i < markers.length; i++) {
            var idaut = markers[i].getAttribute("idaut");
            var prenom = markers[i].getAttribute("prenom");
            var nom = markers[i].getAttribute("nom");
            var cp = markers[i].getAttribute("cp");
            var commune = markers[i].getAttribute("commune");
            var point = new GLatLng(parseFloat(markers[i].getAttribute("lat")),
                                    parseFloat(markers[i].getAttribute("lng")));
            var marker = createMarker(point, prenom, nom, cp, commune, idaut);
            map.addOverlay(marker);
          }
        });
      } else {
alert("Sorry, the Google Maps API is not compatible with this browser.");
}
    }

    function createMarker(point, prenom, nom, cp, commune, idaut) {
      var marker = new GMarker(point);
      var html = "<b>" + prenom + "  " + nom + "</b> <br/>" + cp + "  " + commune + "<br/>" + 
				      "<a href=\'spip.php?page=contactVisit&id_auteur=" + idaut + "&lang=' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'\'>Envoyer un mail</a>";
      GEvent.addListener(marker, \'click\', function() {
        marker.openInfoWindowHtml(html);
      });
      return marker;
    }
//]]>
  </script>

<div class="liste demande">
      <h2>' .
_T('public/spip/ecrire:demandes_en_cours',array()) .
'</h2>
	<div id="map_canvas" style="width: 530px; height: 250px"></div>
</div>
  <div class="nettoyeur"></div>
  
<div class="liste offre petite_enfance">
  ' .
(($t1 = BOUCLE_offresDhtml_2a4ed425c9642cf06725b4dae8ba2d16($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <h2>' .
		_T('public/spip/ecrire:offres_en_cours',array()) .
		'</h2>
      <ul>
          ') . $t1 . '
      </ul>

  ') :
		((	'
     <h2>' .
	_T('public/spip/ecrire:aucune_offre',array()) .
	'</h2>
  '))) .
'
  </div>


');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_employr>
//
function BOUCLE_offresBhtml_2a4ed425c9642cf06725b4dae8ba2d16(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_employr';
	static $id = '_offresB';
	static $from = array('xx_employr' => 'xx_employr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_employr.emp_datmodif",
		"xx_employr.emp_id",
		"xx_employr.emp_nom",
		"xx_employr.emp_poste",
		"xx_employr.emp_durdates");
	static $orderby = array('xx_employr.emp_datmodif DESC');
	static $where = 
			array(
			array('LIKE', 'xx_employr.emp_domaines', "'%Ecoles%'"));
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
          <li>
	          <a href="spip.php?page=voirFiche&id_article=' .
((htmlentities($Pile[$SP-1]['lang'] ? $Pile[$SP-1]['lang'] : $GLOBALS['spip_lang']) == 'br') ? '22':'16') .
'&emp_id=' .
interdire_scripts($Pile[$SP]['emp_id']) .
'">
	          <small>' .
interdire_scripts($Pile[$SP]['emp_nom']) .
'</small> <big>' .
interdire_scripts($Pile[$SP]['emp_poste']) .
'</big> <q>' .
interdire_scripts($Pile[$SP]['emp_durdates']) .
'</q>
	          </a>
          </li>
          ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_demandr>
//
function BOUCLE_demandesBhtml_2a4ed425c9642cf06725b4dae8ba2d16(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_demandr';
	static $id = '_demandesB';
	static $from = array('xx_demandr' => 'xx_demandr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_demandr.dem_datmodif",
		"xx_demandr.dem_id",
		"xx_demandr.dem_prenom",
		"xx_demandr.dem_nom");
	static $orderby = array('xx_demandr.dem_datmodif DESC');
	static $where = 
			array(
			array('LIKE', 'xx_demandr.dem_domaines', "'%Ecoles%'"));
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
          <li>
			<a href="spip.php?page=voirFiche&id_article=' .
((htmlentities($Pile[$SP-1]['lang'] ? $Pile[$SP-1]['lang'] : $GLOBALS['spip_lang']) == 'br') ? '27':'28') .
'&dem_id=' .
interdire_scripts($Pile[$SP]['dem_id']) .
'">
			<big>' .
interdire_scripts($Pile[$SP]['dem_prenom']) .
'&nbsp;' .
interdire_scripts($Pile[$SP]['dem_nom']) .
'</big>
			</a>
          </li>
          ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_ecoleshtml_2a4ed425c9642cf06725b4dae8ba2d16(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in5 = array();
	$in5[]= 5;
	$in5[]= 11;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'rubriques';
	static $id = '_ecoles';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.lang",
		"rubriques.id_rubrique");
	$orderby = array(((!sql_quote($in5) OR sql_quote($in5)==="''") ? 0 : ('FIELD(rubriques.id_rubrique,' . sql_quote($in5) . ')')));
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[0]['id_rubrique'],'','int')), sql_in('rubriques.id_rubrique',sql_quote($in5)), sql_in('rubriques.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
<div class="liste offre">
  ' .
(($t1 = BOUCLE_offresBhtml_2a4ed425c9642cf06725b4dae8ba2d16($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <h2>' .
		_T('public/spip/ecrire:offres_en_cours',array()) .
		'</h2>
      <ul>
          ') . $t1 . '
      </ul>
  ') :
		((	'
     <h2>' .
	_T('public/spip/ecrire:aucune_offre',array()) .
	'</h2>
  '))) .
'
</div>


<div class="liste demande">
 ' .
(($t1 = BOUCLE_demandesBhtml_2a4ed425c9642cf06725b4dae8ba2d16($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <h2>' .
		_T('public/spip/ecrire:demandes_en_cours',array()) .
		'</h2>
      <ul>
          ') . $t1 . '
      </ul>
  ') :
		((	'
     <h2>' .
	_T('public/spip/ecrire:aucune_demande',array()) .
	'</h2>
  '))) .
'
</div>
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_employr>
//
function BOUCLE_offresChtml_2a4ed425c9642cf06725b4dae8ba2d16(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_employr';
	static $id = '_offresC';
	static $from = array('xx_employr' => 'xx_employr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_employr.emp_datmodif",
		"xx_employr.emp_id",
		"xx_employr.emp_nom",
		"xx_employr.emp_poste",
		"xx_employr.emp_durdates");
	static $orderby = array('xx_employr.emp_datmodif DESC');
	static $where = 
			array(
			array('LIKE', 'xx_employr.emp_domaines', "'%culturelle%'"));
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
          <li><a href="spip.php?page=voirFiche&id_article=' .
((htmlentities($Pile[$SP-1]['lang'] ? $Pile[$SP-1]['lang'] : $GLOBALS['spip_lang']) == 'br') ? '24':'23') .
'&emp_id=' .
interdire_scripts($Pile[$SP]['emp_id']) .
'">
	          <small>' .
interdire_scripts($Pile[$SP]['emp_nom']) .
'</small> 
	          <big>' .
interdire_scripts($Pile[$SP]['emp_poste']) .
'</big> <q>' .
interdire_scripts($Pile[$SP]['emp_durdates']) .
'</q>
	          </a>
          </li>
          ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE xx_demandr>
//
function BOUCLE_demandesChtml_2a4ed425c9642cf06725b4dae8ba2d16(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'xx_demandr';
	static $id = '_demandesC';
	static $from = array('xx_demandr' => 'xx_demandr');
	static $type = array();
	static $groupby = array();
	static $select = array("xx_demandr.dem_datmodif",
		"xx_demandr.dem_id",
		"xx_demandr.dem_prenom",
		"xx_demandr.dem_nom");
	static $orderby = array('xx_demandr.dem_datmodif DESC');
	static $where = 
			array(
			array('LIKE', 'xx_demandr.dem_domaines', "'%culturelle%'"));
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
          <li>
          	<a href="spip.php?page=voirFiche&id_article=' .
((htmlentities($Pile[$SP-1]['lang'] ? $Pile[$SP-1]['lang'] : $GLOBALS['spip_lang']) == 'br') ? '29':'30') .
'&dem_id=' .
interdire_scripts($Pile[$SP]['dem_id']) .
'">
			<big>' .
interdire_scripts($Pile[$SP]['dem_prenom']) .
'&nbsp;' .
interdire_scripts($Pile[$SP]['dem_nom']) .
'</big>
			</a>
          </li>
          ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_actculthtml_2a4ed425c9642cf06725b4dae8ba2d16(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in6 = array();
	$in6[]= 12;
	$in6[]= 13;if (!defined('_DIR_PLUGIN_ACCESRESTREINT')){
			$link_empty = generer_url_ecrire('admin_vider'); $link_plugin = generer_url_ecrire('admin_plugin');
			$message_fr = 'La restriction d\'acc&egrave;s a ete desactiv&eacute;e. <a href="'.$link_plugin.'">Corriger le probl&egrave;me</a> ou <a href="'.$link_empty.'">vider le cache</a> pour supprimer les restrictions.';
			$message_en = 'Acces Restriction is now unusable. <a href="'.$link_plugin.'">Correct this trouble</a> or <a href="'.generer_url_ecrire('admin_vider').'">empty the cache</a> to finish restriction removal.';
			die($message_fr.'<br />'.$message_en);
			}
	static $table = 'rubriques';
	static $id = '_actcult';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.lang",
		"rubriques.id_rubrique");
	$orderby = array(((!sql_quote($in6) OR sql_quote($in6)==="''") ? 0 : ('FIELD(rubriques.id_rubrique,' . sql_quote($in6) . ')')));
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[0]['id_rubrique'],'','int')), sql_in('rubriques.id_rubrique',sql_quote($in6)), sql_in('rubriques.id_rubrique', accesrestreint_liste_rubriques_exclues(!test_espace_prive()), 'NOT'));
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
<div class="liste offre">
  ' .
(($t1 = BOUCLE_offresChtml_2a4ed425c9642cf06725b4dae8ba2d16($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <h2>' .
		_T('public/spip/ecrire:offres_en_cours',array()) .
		'</h2>
      <ul>
          ') . $t1 . '
      </ul>

  ') :
		((	'
     <h2>' .
	_T('public/spip/ecrire:aucune_offre',array()) .
	'</h2>
  '))) .
'
  </div>


  <div class="liste demande">
  ' .
(($t1 = BOUCLE_demandesChtml_2a4ed425c9642cf06725b4dae8ba2d16($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <h2>' .
		_T('public/spip/ecrire:demandes_en_cours',array()) .
		'</h2>
      <ul>
          ') . $t1 . '
      </ul>
  ') :
		((	'
     <h2>' .
	_T('public/spip/ecrire:aucune_demande',array()) .
	'</h2>
  '))) .
'
  </div>
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes/inc-listes-offres-demdes.html.
//
function html_2a4ed425c9642cf06725b4dae8ba2d16($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>
' .
BOUCLE_animhtml_2a4ed425c9642cf06725b4dae8ba2d16($Cache, $Pile, $doublons, $Numrows, $SP) .
'

  
' .
BOUCLE_babyhtml_2a4ed425c9642cf06725b4dae8ba2d16($Cache, $Pile, $doublons, $Numrows, $SP) .
'

  
' .
BOUCLE_petitenfhtml_2a4ed425c9642cf06725b4dae8ba2d16($Cache, $Pile, $doublons, $Numrows, $SP) .
'

  
' .
BOUCLE_ecoleshtml_2a4ed425c9642cf06725b4dae8ba2d16($Cache, $Pile, $doublons, $Numrows, $SP) .
'



  
' .
BOUCLE_actculthtml_2a4ed425c9642cf06725b4dae8ba2d16($Cache, $Pile, $doublons, $Numrows, $SP));

	return analyse_resultat_skel('html_2a4ed425c9642cf06725b4dae8ba2d16', $Cache, $page, 'squelettes/inc-listes-offres-demdes.html');
}

?>