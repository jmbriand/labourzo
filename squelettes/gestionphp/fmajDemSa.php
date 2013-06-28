<?PHP
/*		$minUserLevel = 1;
		$cfgProgDir =  '../_phpSecure/';
		include($cfgProgDir . "secure.php");*/
		
   require ("design.php");
	require ("formulaire.php");
	require ("squelettes/local_fr.php");
    $connexion = initier();
/*    entete ('modification table structure');	
		$dem_id = $_REQUEST["dem_id"]; */
		$dem_idauteur = $auteur_session['id_auteur'];
		$taille_max = 1048576 ;
	include("squelettes/inc-gmkey.html"); 
?>


<script type="text/javascript">
		var geocoder;
		var map;
		var gmarker;
		var lat;
		var lng;
		
		function initialize() {
			geocoder = new google.maps.Geocoder();
			lat = $("#dem_lat").val();
			if(lat == 0) { lat = 48.1;} ;
			lng = $("#dem_long").val();
			if(lng == 0) { lng = -2.7;} ;
			var latlng = new google.maps.LatLng(lat, lng);
			var myOptions = {
				zoom: 7,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			
			map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			
			gmarker = new google.maps.Marker({
						map: map,
						draggable:true,
						position: latlng
					});
			
			document.getElementById("latbox").value = lat;
			document.getElementById("lngbox").value = lng;
			
			google.maps.event.addListener(gmarker, 'position_changed', function () {
	
				document.getElementById("latbox").value = this.getPosition().lat();
				document.getElementById("dem_lat").value = this.getPosition().lat();
				document.getElementById("lngbox").value = this.getPosition().lng();
				document.getElementById("dem_long").value = this.getPosition().lng();
	
			});
		}
		
		function codeAddress() {
			var address = document.getElementById("dem_ville").value;
			
			geocoder.geocode( { 'address': address}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					lat = results[0].geometry.location.lat();
					document.getElementById("latbox").value = lat;
					document.getElementById("dem_lat").value = lat;
					lng = results[0].geometry.location.lng();
					document.getElementById("lngbox").value = lng;
					document.getElementById("dem_long").value = lng;
				
					map.setCenter(results[0].geometry.location);
					
					gmarker.setPosition(results[0].geometry.location);
					
				} else {
					alert("Geocode was not successful for the following reason: " + status);
				}
			});
		}     
	

$(document).ready(function(){	 
	 $("#modif").submit(function() {	// VERIFIE SAISIE
		nom = $("#dem_nom").val();
		if(nom.length<2) {alert('Veuillez donner un nom S.V.P. !');return false ;} ;
		
		mel = $("#dem_email").val();
		if(mel.lastIndexOf("@")<0) {alert('Veuillez donner une adresse e-mail valide S.V.P. !');return false ;} ;
		
		commune = $("#dem_ville").val();
		if(commune.length<2) {alert('Veuillez préciser votre commune S.V.P. !');return false ;} ;
		
       if ($('input[name="gardenf"]:checked').length) {	// si gardenf coche
       		var $getypes = $(this).find('input[name="dem_domaines[1]"]:checked');
       		if (!$getypes.length) {
	            alert("Vous devez choisir au moins un type de garde d'enfants S.V.P. !");
	            return false; // The form will *not* submit
       		}
        }

		var $nbckb = $('input[name="dem_domaines[0]"]:checked').length + 
					$('input[name="dem_domaines[1]"]:checked').length + 
					$('input[name="dem_domaines[2]"]:checked').length + 
					$('input[name="dem_domaines[3]"]:checked').length + 
					$('input[name="dem_domaines[4]"]:checked').length + 
					$('input[name="dem_domaines[5]"]:checked').length + 
					$('input[name="dem_domaines[6]"]:checked').length + 
					$('input[name="dem_domaines[7]"]:checked').length + 
					$('input[name="dem_domaines[8]"]:checked').length + 
					$('input[name="dem_domaines[9]"]:checked').length + 
					$('input[name="dem_domaines[10]"]:checked').length;
       if ($nbckb < 1) {
            alert('Vous devez choisir au moins un domaine S.V.P. !');
            return false; // The form will *not* submit
        }

		profil = $("#dem_profpost").val();
		if(profil.length<2) {alert('Veuillez préciser votre profil S.V.P. !');return false ;} ;
		
		lat = $("#dem_lat").val();
		nbgeo = $('input[name="dem_domaines[1]"]:checked').length + 	// garde enfants
					$('input[name="dem_domaines[5]"]:checked').length ;	// santé
		if(nbgeo > 0 && lat == 0) {alert('Veuillez valider un positionnement géographique S.V.P.');return false ;} ;
		
	});
	
	toggle_visibility = function (id) {
		
		var e = $("#"+id);
		e.toggle();
		
	}
	
	visigetype = function () {
		
		toggle_visibility("getype");
		$('input[name="dem_domaines[1]"]').prop('checked', false);
		
	}
	
});	
		 
</script>

<style type="text/css">
#map_canvas {
	width:100%; height:400px;
	padding:1px;
	background-color:#FFE4B3;
	border: solid 1px grey
}
</style>
 
<?PHP 
// CORRECTIONS VALEURS
$dem_id = $_REQUEST ['dem_id'] ;
/*$dem_idauteur = $_REQUEST ['dem_idauteur'] ;*/
$dem_nom = addslashes ( $_REQUEST ['dem_nom']);
$dem_prenom = addslashes ( $_REQUEST ['dem_prenom']);
$dem_datnais = datemysql($_REQUEST['dem_datnais']) ;
$dem_email = $_REQUEST ['dem_email'];
$dem_cp = $_REQUEST ['dem_cp'];
$dem_ville = addslashes ( $_REQUEST ['dem_ville'] );
$dem_voit = $_REQUEST ['dem_voit'];
if (isset($_REQUEST ['dem_domaines'])) $dem_domaines = implode (',', $_REQUEST ['dem_domaines']) ;
$dem_profpost = addslashes ( $_REQUEST ['dem_profpost'] );
if (isset($_REQUEST [dem_diplomes ])) $dem_diplomes = implode (',', $_REQUEST [dem_diplomes ]) ;
$dem_diplodivers = addslashes ( $_REQUEST ['dem_diplodivers'] );
$dem_dispo = addslashes ( $_REQUEST ['dem_dispo'] );
$dem_remq = addslashes ( $_REQUEST ['dem_remq'] );
$dem_lat = $_REQUEST ['dem_lat'];
$dem_long = $_REQUEST ['dem_long'];

$cvbr_nom = $_FILES['cvbr']['name'] ;    //Le nom original du fichier, comme sur le disque du visiteur, (exemple: mon_icone.png).
//$cv_type = $_FILES['cv']['type'] ;    //Le type du fichier. Par exemple, cela peut être "image/png"
$cvbr_size = $_FILES['cvbr']['size'] ;    //La taille du fichier en octets
$cvbr_tmp = $_FILES['cvbr']['tmp_name'] ;//L'adresse vers le fichier uploadé dans le répertoire temporaire
$cvbr_err = $_FILES['cvbr']['error'] ;   //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé

$cvfr_nom = $_FILES['cvfr']['name'] ;    //Le nom original du fichier, comme sur le disque du visiteur, (exemple: mon_icone.png).
//$cv_type = $_FILES['cv']['type'] ;    //Le type du fichier. Par exemple, cela peut être "image/png"
$cvfr_size = $_FILES['cvfr']['size'] ;    //La taille du fichier en octets
$cvfr_tmp = $_FILES['cvfr']['tmp_name'] ;//L'adresse vers le fichier uploadé dans le répertoire temporaire
$cvfr_err = $_FILES['cvfr']['error'] ;   //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé

$inserer = $_REQUEST['inserer'] ;
$modifier = $_REQUEST['modifier'] ;
$detruire = $_REQUEST['detruire'] ;
$detcv = $_REQUEST['detcv'] ;

//----Connection à la base, et création de l'ordre SQL 

if (isset($inserer)) 
	 $requete = "INSERT INTO ".TABLE_DEM."  
	 (dem_id, dem_idauteur, dem_nom, dem_prenom, dem_datnais, dem_email, dem_cp, dem_ville, dem_voit, 
	 dem_domaines, dem_profpost, dem_diplomes, dem_diplodivers, dem_dispo, dem_remq, dem_lat, dem_long ) 
	 VALUES ('$dem_id', '$dem_idauteur', '$dem_nom', '$dem_prenom', '$dem_datnais', '$dem_email', '$dem_cp', '$dem_ville', 
	 '$dem_voit', '$dem_domaines', '$dem_profpost', '$dem_diplomes', '$dem_diplodivers', '$dem_dispo', '$dem_remq', '$dem_lat', '$dem_long') 
	 "; 

if (isset($modifier))  
	 $requete = "UPDATE  ".TABLE_DEM." 
	 SET dem_id='$dem_id', dem_idauteur='$dem_idauteur', dem_nom='$dem_nom', dem_prenom='$dem_prenom', 
	 dem_datnais='$dem_datnais', dem_email='$dem_email', dem_cp='$dem_cp', dem_ville='$dem_ville', dem_voit='$dem_voit', 
	 dem_domaines='$dem_domaines', dem_profpost='$dem_profpost', dem_diplomes='$dem_diplomes', dem_diplodivers='$dem_diplodivers', dem_dispo='$dem_dispo', 
	 dem_remq='$dem_remq', dem_lat='$dem_lat', dem_long='$dem_long'
	 		WHERE dem_id= $dem_id "; 
	 		
if (isset($detruire)) 
	 $requete = "DELETE FROM ".TABLE_DEM."
	 WHERE dem_id= $dem_id"; 
	  
//------ Exécution de l'ordre 
if (isset($requete)) {
	$resultat = mysql_query	($requete, $connexion); 
	if ($resultat) {
				if (isset($inserer)) {
					$dem_id = mysql_insert_id() ;	// recupere la derniere cle primaire inseree
//					echo "dem_id = " . $dem_id ;
				};
				if ($cvbr_nom != '') {
//					echo "Fichier nom : " . $cv_nom ;
//					echo "<br>Fichier type : " . $cv_type ;
//					echo "<br>Fichier size : " . $cv_size ;
//					echo "<br>Fichier tmp_name : " . $cv_tmp ;
//					echo "<br>Fichier Erreur : " . $cv_err ;
					$nomfichbr = cvenrgt($cvbr_nom, $cvbr_size, $cvbr_tmp, $cvbr_err, $taille_max) ;
					if ($nomfichbr != '') {
//						echo "<br> Nom fichier = " . $nomfich ;
						addCV($dem_id, $dem_idauteur, $cvbr_nom, $nomfichbr, $cvbr_size, 'br', $connexion);
					};
				};
				if ($cvfr_nom != '') {
//					echo "Fichier nom : " . $cv_nom ;
//					echo "<br>Fichier type : " . $cv_type ;
//					echo "<br>Fichier size : " . $cv_size ;
//					echo "<br>Fichier tmp_name : " . $cv_tmp ;
//					echo "<br>Fichier Erreur : " . $cv_err ;
					$nomfichfr = cvenrgt($cvfr_nom, $cvfr_size, $cvfr_tmp, $cvfr_err, $taille_max) ;
					if ($nomfichfr != '') {
//						echo "<br> Nom fichier = " . $nomfich ;
						addCV($dem_id, $dem_idauteur, $cvfr_nom, $nomfichfr, $cvfr_size, 'fr', $connexion);
					};
				};
				if (isset($detruire)) {
//					echo "<br>Destructions CVs de dem_id : " . $dem_id ;
					destrocvs($dem_id, $connexion);
				};
				echo "<div class='menu' id='documents_joints'><h2>" . _T('operation_succes') . "</h2></div>";
				if (isset($inserer) || isset($modifier)) {
					 $rez = execRequete ("SELECT * FROM xx_upcurvit WHERE up_idauteur = '$dem_idauteur' ", $connexion); 
					 $ncv = mysql_num_rows($rez) ;
					 if ($ncv < 1 and ( 
					 	strpos($dem_domaines, 'anim') !== false ||
					 	strpos($dem_domaines, 'enseignmt') !== false ||
					 	strpos($dem_domaines, 'accompscol') !== false ||
					 	strpos($dem_domaines, 'commarti') !== false ||
					 	strpos($dem_domaines, 'commedia') !== false ||
					 	strpos($dem_domaines, 'linguis') !== false ||
					 	strpos($dem_domaines, 'admin') !== false ||
					 	strpos($dem_domaines, 'arts') !== false ||
					 	strpos($dem_domaines, 'divers') !== false)
					 	) {
						 	echo "<div class=alerte >" . _T('joindre_cv_svp') . "</div>";
					 };

				};
				echo 
				"<form action='' method='post'> \n "
				."<input type='submit' value='" . _T('continuer') . "'>\n"
				."</form>" ;
				return;
	}
	else 
   {echo "<B><font color=#ff0000>Erreur dans l'execution de la requ&ecirc;te.</font></B><BR>$dem_remq<BR>";
    echo "$requete <p></p>message de MySql : " . mysql_error($connexion); exit ;}
	; 
} else if (isset($detcv)) {
				supp_cv($detcv, $connexion);
				echo "<div class='menu' id='documents_joints'><h2>" . _T('operation_succes') . "</h2></div>";
				echo 
				"<form action='' method='post'> \n "
				."<input type='submit' value='" . _T('continuer') . "'>\n"
				."</form>" ;
				return;
};

 if (isset($dem_idauteur))  
{ 
 $resultat = execRequete ("SELECT * FROM ".TABLE_DEM." WHERE dem_idauteur = '$dem_idauteur' ", $connexion); 
 $ligne = mysql_fetch_object ($resultat); 
 $fiche = mysql_num_rows($resultat) ;
 if ($fiche > 1) 
 		{echo "<br><div class=alerte > -+-+-+- Erreur de compte : veuillez contacter l'administrateur du site -+-+-+-</div>";
 		exit() ;};

 $resu = execRequete ("SELECT * FROM xx_upcurvit WHERE up_idauteur = '$dem_idauteur' ", $connexion); 
 $nbcv = mysql_num_rows($resu) ;
 if ($nbcv < 1 and ( 
 	strpos($ligne->dem_domaines, 'C.V.L.') !== false ||
 	strpos($ligne->dem_domaines, 'Ecoles') !== false ||
 	strpos($ligne->dem_domaines, 'Action') !== false)
 	) {
 	echo "<div class=alerte >" . _T('joindre_cv_svp') . "</div>";
 };

 }
/* $respays=execRequete ("SELECT  pcode, pnom FROM pays ORDER BY pnom", $connexion);  */
 $listedoms = array('anim', 'gardenf', 'enseignmt', 'accompscol', 'commarti', 'sante', 'commedia', 'linguis', 'admin', 'arts', 'divers') ;
 $labelsdoms = array(_T('anim'), _T('gardenf'), _T('enseignmt'), _T('accompscol'), _T('commarti'), _T('sante'), _T('commedia'), _T('linguis'), _T('admin'), _T('arts'), _T('divers')) ;
 $listediplm = array('B.A.F.A.', 'Stagiaire BAFA', 'B.A.F.D.', 'Stagiaire BAFD', 'BEATEP-BPJEPS', 'Surveillant de baignade', 'Premiers secours') ;
 $labelsdiplm = array(_T('bafa'), _T('stage_bafa'), _T('bafd'), _T('stage_bafd'), _T('beatep_bpjeps'), _T('surv_baignade'), _T('premiers_sec')) ;
?> 

<!-- formulaire de modification pr&eacute;garni &eacute;ventuellement--> 
<!-- <form action="squelettes/gestionphp/fmajDemTr.php" method="post" name="modif" id="modif">  -->
<form action="" method="post" name="modif" id="modif" enctype="multipart/form-data"> 

	  		<INPUT TYPE="hidden" id="dem_id" NAME="dem_id" VALUE="<?php echo"$ligne->dem_id" ;?>">
	  		<INPUT TYPE="hidden" id="dem_idauteur" NAME="dem_idauteur" VALUE="<?php echo"$dem_idauteur" ;?>">
	  		<INPUT TYPE="hidden" ID="dem_lat" NAME="dem_lat" VALUE="<?php echo"$ligne->dem_lat" ;?>">
	  		<INPUT TYPE="hidden" ID="dem_long" NAME="dem_long" VALUE="<?php echo"$ligne->dem_long" ;?>">	 			 
			<INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="<?php echo $taille_max ?>" />
			<INPUT TYPE="hidden" NAME='OK' VALUE='1'>
	<ul> 
		<?php echo "<li><SPAN class=notes>" . _T('fiche_modif_le') ;?>
		<?php $date = timestampeur($ligne->dem_datmodif); echo"$date </SPAN</li>";?>	 
		<li class='obligatoire'><?php formInputText ('dem_nom', 40, $ligne, _T('nom_dem'));?></li>
	 	<li><?php formInputText ('dem_prenom', 40, $ligne, _T('prenom_dem'));?> </li> 
		<li><?php formInputText ('dem_datnais', 20, $ligne, _T('datnaiss')); ?>  (jj-mm-aaaa)</li> 
		<li class='obligatoire'><?php formInputText ('dem_email', 40, $ligne, _T('mel')); ?></li> 
		<li><?php formInputText ('dem_cp', 7, $ligne, _T('code_postal')); ?></li>
		<li class='obligatoire'><?php formInputText ('dem_ville', 40, $ligne, _T('commune')); ?>
			&nbsp;<input type="button" onclick="codeAddress()" value=<?php echo "\"" . _T('positionner') . "\"" ;?>>
			<span class="notes"><?php echo _T('sur_une_carte') ;?></span>
			<div>
			Latitude:
			<input id="latbox" type="text" value="" size="15" readonly="">
			&nbsp; Longitude:
			<input id="lngbox" type="text" value="" size="15" readonly="">
			</div>
			  </li>
		<li><div id="map_canvas"></div></li>
		<li class='obligatoire'><label><?php echo _T('domaine') ;?></label>
			<ul><!-- <?php formCheckboxEnum ('dem_domaines', $listedoms, $ligne, $labelsdoms); ?> -->
			<?php
				$s = "";
				$valeur = $ligne->dem_domaines ;
				if (ereg("anim", $valeur) )
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[0]' id='dem_domaines[0]' value='anim' CHECKED>
								&nbsp;<label for='dem_domaines[0]'>" . _T('anim') . "</label></li>";
				else 
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[0]' id='dem_domaines[0]' value='anim'>
								&nbsp;<label for='dem_domaines[0]'>" . _T('anim') . "</label></li>";
				if (ereg("gardenf", $valeur) )
					$s .= "<li><input type='CHECKBOX'  name='gardenf' id='gardenf' value='ge' onclick=\"visigetype()\" CHECKED>
								&nbsp;<label for='gardenf'>" . _T('gardenf') . "</label></li>";
				else 
					$s .= "<li><input type='CHECKBOX'  name='gardenf' id='gardenf' value='ge' onclick=\"visigetype()\">
								&nbsp;<label for='gardenf'>" . _T('gardenf') . "</label></li>";
				if (ereg("gardenf", $valeur) )
					$s .= "<div id='getype'><li><ul>";
				else
					$s .= "<div id='getype' style='display:none;'><li><ul>";
					$s .= "<li><input type='radio'  name='dem_domaines[1]'  id='gardenf1' value='gardenf1' ";
					if (ereg("gardenf1", $valeur)) $s .= "checked";
					$s .= " />&nbsp;<label for='gardenf1'>" . _T('babysit') . "</label></li>";
					
					$s .= "<li><input type='radio'  name='dem_domaines[1]'  id='gardenf2' value='gardenf2' ";
					if (ereg("gardenf2", $valeur)) $s .= "checked";
					$s .= " />&nbsp;<label for='gardenf2'>" . _T('assmat') . "</label></li>";
					
					$s .= "<li><input type='radio'  name='dem_domaines[1]'  id='gardenf3' value='gardenf3' ";
					if (ereg("gardenf3", $valeur)) $s .= "checked";
					$s .= " />&nbsp;<label for='gardenf3'>" . _T('accueilcoll') . "</label></li>";
				$s .= "</ul></li></div>";
				
				if (ereg("enseignmt", $valeur) )
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[2]' id='dem_domaines[2]' value='enseignmt' CHECKED>
								&nbsp;<label for='dem_domaines[2]'>" . _T('enseignmt') . "</label></li>";
				else 
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[2]' id='dem_domaines[2]' value='enseignmt'>
								&nbsp;<label for='dem_domaines[2]'>" . _T('enseignmt') . "</label></li>";
								
				if (ereg("accompscol", $valeur) )
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[3]' id='dem_domaines[3]' value='accompscol' CHECKED>
								&nbsp;<label for='dem_domaines[3]'>" . _T('accompscol') . "</label></li>";
				else 
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[3]' id='dem_domaines[3]' value='accompscol'>
								&nbsp;<label for='dem_domaines[3]'>" . _T('accompscol') . "</label></li>";
								
				if (ereg("commarti", $valeur) )
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[4]' id='dem_domaines[4]' value='commarti' CHECKED>
								&nbsp;<label for='dem_domaines[4]'>" . _T('commarti') . "</label></li>";
				else 
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[4]' id='dem_domaines[4]' value='commarti'>
								&nbsp;<label for='dem_domaines[4]'>" . _T('commarti') . "</label></li>";

				if (ereg("sante", $valeur) )
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[5]' id='dem_domaines[5]' value='sante' CHECKED>
								&nbsp;<label for='dem_domaines[5]'>" . _T('sante') . "</label></li>";
				else 
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[5]' id='dem_domaines[5]' value='sante'>
								&nbsp;<label for='dem_domaines[5]'>" . _T('sante') . "</label></li>";

				if (ereg("commedia", $valeur) )
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[6]' id='dem_domaines[6]' value='commedia' CHECKED>
								&nbsp;<label for='dem_domaines[6]'>" . _T('commedia') . "</label></li>";
				else 
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[6]' id='dem_domaines[6]' value='commedia'>
								&nbsp;<label for='dem_domaines[6]'>" . _T('commedia') . "</label></li>";

				if (ereg("linguis", $valeur) )
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[7]' id='dem_domaines[7]' value='linguis' CHECKED>
								&nbsp;<label for='dem_domaines[7]'>" . _T('linguis') . "</label></li>";
				else 
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[7]' id='dem_domaines[7]' value='linguis'>
								&nbsp;<label for='dem_domaines[7]'>" . _T('linguis') . "</label></li>";

				if (ereg("admin", $valeur) )
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[8]' id='dem_domaines[8]' value='admin' CHECKED>
								&nbsp;<label for='dem_domaines[8]'>" . _T('admin') . "</label></li>";
				else 
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[8]' id='dem_domaines[8]' value='admin'>
								&nbsp;<label for='dem_domaines[8]'>" . _T('admin') . "</label></li>";

				if (ereg("arts", $valeur) )
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[9]' id='dem_domaines[9]' value='arts' CHECKED>
								&nbsp;<label for='dem_domaines[9]'>" . _T('arts') . "</label></li>";
				else 
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[9]' id='dem_domaines[9]' value='arts'>
								&nbsp;<label for='dem_domaines[9]'>" . _T('arts') . "</label></li>";

				if (ereg("divers", $valeur) )
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[10]' id='dem_domaines[10]' value='divers' CHECKED>
								&nbsp;<label for='dem_domaines[10]'>" . _T('divers') . "</label></li>";
				else 
					$s .= "<li><input type='CHECKBOX'  name='dem_domaines[10]' id='dem_domaines[10]' value='divers'>
								&nbsp;<label for='dem_domaines[10]'>" . _T('divers') . "</label></li>";
								
				echo $s ;
			?>
			</ul>
		  </li>
		<li class='obligatoire'><label for="dem_profpost"><?php echo _T('profil') . "<small>" . _T('profil_info') . "</small>" ;?></label>
				 <textarea rows="3" cols="40" name="dem_profpost" id="dem_profpost"><?php echo "$ligne->dem_profpost" ;?></textarea>
			  </li>
		<li><label><?php echo _T('diplomes') ;?></label>
			<ul><?php formCheckboxEnum ('dem_diplomes', $listediplm, $ligne, $labelsdiplm); ?></ul>
			</li>
		<li><?php formInputText ('dem_diplodivers', 40, $ligne, _T('diplodivers')); ?></li> 
  <li><label for="dem_dispo"><?php echo _T('disponibilite') ;?></label>
        <textarea rows="3" cols="40" name="dem_dispo" id="dem_dispo"><?php echo "$ligne->dem_dispo" ;?></textarea>
      </li> 
      <li><label for="dem_remq"><?php echo _T('remarques') ;?></label>
			  		<!-- <span class="notes"><?php echo _T('non_affiche') ;?></span> -->
			  		<textarea rows="3" cols="40" name="dem_remq" id="dem_remq"><?php echo "$ligne->dem_remq" ;?></textarea>
      </li> 
     <?php if ($ligne->dem_id > '' && $ligne->dem_domaines != "sante" && $ligne->dem_domaines != "gardenf1") { 
			      echo "<li><label>" . _T('cv_formats')  . "</label><ul>" ;
			      echo "<li><label for=\"fichierbr\">" . _T('en_breton') . "</label><br />
				   <input type=\"file\" name=\"cvbr\" id=\"fichierbr\"/></li>";
			      echo "<li><label for=\"fichierfr\">" . _T('en_francais') . "</label><br />
				   <input type=\"file\" name=\"cvfr\" id=\"fichierfr\"/></li>";
			      echo "</ul></li>" ;
		     } else if ($ligne->dem_domaines != "sante" && $ligne->dem_domaines != "gardenf1")
		     		echo "<li>" . _T('enregistre_dabord') . "</li>"; 
	  ?>
       
</ul>
 
	<?php boutonsValidation ('spip.php?page=sommaire', $ligne->dem_id, 'dem_') ; ?>
 
</form> 
