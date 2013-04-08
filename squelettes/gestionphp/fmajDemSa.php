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
?>
<script src="squelettes/gestionphp/jquery.js"></script>
<script type="text/javascript" src="squelettes/gestionphp/jquery.bgiframe.min.js"></script>
<script type="text/javascript" src="squelettes/gestionphp/jquery.ajaxQueue.js"></script>
<?php include("squelettes/inc-gmkey.html"); ?> 

<script type="text/javascript">
// GOOGLE MAPS
    var map = null;
    var geocoder = null;

     function initialize() {     
      if (GBrowserIsCompatible()) {
        var lat = $("#dem_lat").val(); var lng = $("#dem_long").val();
        // INSTANCE PETITE CARTE
		  map1 = new GMap2(document.getElementById("previsu"));
        map1.setCenter(new GLatLng(lat, lng), 13);
        map1.addControl(new GSmallMapControl()); 
        var point0 = new GLatLng(lat, lng) ;
        var m0 = new GMarker(point0);
        map1.addOverlay(m0);        
        
        // INSTANCE GRANDE CARTE 
        map = new GMap2(document.getElementById("map_canvas"));        
        if (lat == 0) {map.setCenter(new GLatLng(48, -2.61), 7);}
        else {map.setCenter(new GLatLng(lat, lng), 13);}               
        map.addControl(new GMapTypeControl());
        map.addControl(new GSmallMapControl());
        GEvent.addListener(map,"click", function(overlay,latlng) {     // CLICK = NOUVEAU POINT
          if (latlng) {
          	var lat = latlng.lat() ; lat = Math.round(lat*10000000)/10000000;
          	var lng = latlng.lng() ; lng = Math.round(lng*10000000)/10000000;
          	document.formCarte.clickLat.value = lat ;
            document.formCarte.clickLng.value = lng ;
            var myHtml = 'Lat : ' + lat + '<br />Long : ' + lng;
            map.openInfoWindow(latlng, myHtml);       
          }
        });
               
        geocoder = new GClientGeocoder(); 
      }
    }
        
    function showAddress(address) {	// GEOCODAGE + AFFICHE COORDONNEES
      if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert("Je n'ai pas trouvé :\n" + address + "\n Essayez de corrigez l'adresse ...");
            } else {
              map.setCenter(point, 13);              
              var marker = new GMarker(point);
              map.addOverlay(marker);
              var lat = point.lat() ;
				  var lng = point.lng() ;              
              marker.openInfoWindowHtml(address+'<br />Latitude : '+lat+'<br />Longitude : '+lng);
				  document.formCarte.clickLat.value = lat ;
              document.formCarte.clickLng.value = lng ;
            }
          }
        );
      }
    }
   
	 		var url;	 		
	 function valider(url)		// MESSAGE D'ALERTE
	 {
			if (confirm("si vous avez modifi&eacute; cette fiche structure, cliquez sur le bouton [Annuller],\n puis  [Valider] pour enregistrer la fiche structure avant d'ajouter une activit&eacute;, \n sinon vos modifications seront perdues !"))
			{window.location=url;}
	 }	

$(document).ready(function(){	 
	 $("#modif").submit(function() {	// VERIFIE SAISIE
		nom = $("#dem_nom").val();
		if(nom.length<2) {alert('Veuillez donner un nom S.V.P. !');return false ;} ;
		
		mel = $("#dem_email").val();
		if(mel.lastIndexOf("@")<0) {alert('Veuillez donner une adresse e-mail valide S.V.P. !');return false ;} ;
		
		commune = $("#dem_ville").val();
		if(commune.length<2) {alert('Veuillez préciser votre commune S.V.P. !');return false ;} ;
		
		var $nbckb = $('input[name="dem_domaines[0]"]:checked').length + 
					$('input[name="dem_domaines[1]"]:checked').length + 
					$('input[name="dem_domaines[2]"]:checked').length + 
					$('input[name="dem_domaines[3]"]:checked').length + 
					$('input[name="dem_domaines[4]"]:checked').length;
       if ($nbckb < 1) {
            alert('Vous devez choisir au moins un domaine S.V.P. !');
            return false; // The form will *not* submit
        }

		lat = $("#dem_lat").val();
		nbgeo = $('input[name="dem_domaines[1]"]:checked').length + 
					$('input[name="dem_domaines[2]"]:checked').length ;
		if(nbgeo > 0 && lat == 0) {alert('Veuillez valider un positionnement géographique S.V.P.');return false ;} ;
		
	});
	
		 
	function carte() {	// MONTRE CARTE GOOGLE
		$("#carte").css("left","0px") ;
		var address = $("#dem_cp").val()+' '+$("#dem_ville").val();
		$("#address").val(address);
		$("#clickLat").val(0); $("#clickLng").val(0);
		showAddress(address) ;
	}
	function masquerCarte () {
		$("#carte").css({left:"-7000px"});
	}
	function localiser() {
		$("#dem_lat").val($("#clickLat").val());
		$("#dem_long").val($("#clickLng").val());
		map1.setCenter(new GLatLng($("#clickLat").val(), $("#clickLng").val()), 13);
		masquerCarte();
		alert ("Vous devrez valider cette fiche pour enregistrer la nouvelle position"); 		
	}
	$("#coder").click(carte); 
	$("#masquerCarte").click(masquerCarte);
	$("#localiser").click(localiser) ;  

}); 	 


</script>

<style type="text/css"><!--
#carte {
	left : -7000px;
	top : 368px;
	width: 606px;
	padding:1px;
	position: absolute;
	background-color:#FFE4B3;
	border: solid 1px grey;
	display : block;
}
#previsu {
	width:390px; height:206px;
	padding:1px;
	background-color:#FFE4B3;
	border: solid 1px grey
}
--></style>
<!-- <body  onload="initialize()" onunload="GUnload()"> -->

 
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
//$connexion = connexion(SERVEUR, NOM, PASSE, BASE); 
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
					 	strpos($dem_domaines, 'C.V.L.') !== false ||
					 	strpos($dem_domaines, 'Ecoles') !== false ||
					 	strpos($dem_domaines, 'Action') !== false)
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
 $listedoms = array('C.V.L.', 'Baby sitting', 'Petite enfance', 'Ecoles', 'Action culturelle') ;
 $labelsdoms = array(_T('cvl'), _T('babysit'), _T('petite_enf_agree'), _T('ecoles'), _T('action_cultu')) ;
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
				 <br /><input type="button" value=<?php echo "\"" . _T('positionner') . "\"" ;?> id="coder" />
				<span class="notes"><?php echo _T('sur_une_carte') ;?></span>
			  </li>
		<li><div id="previsu">Prévisualisation</div></li>
		<li><?php echo _T('voiture') ;?>
			<ul>
				<li><?php formRadio ('dem_voit', 'Oui', $ligne, _T('oui')); ?></li>
          	<li><?php formRadio ('dem_voit', 'Non', $ligne, _T('non')); ?></li>
       	</ul>
 		</li>
		<li class='obligatoire'><?php echo _T('domaine') ;?>
			<ul><?php formCheckboxEnum ('dem_domaines', $listedoms, $ligne, $labelsdoms); ?></ul>
		  </li>
		<li><label for="dem_profpost"><?php echo _T('profil') ;?><span class="notes">(optionnel)</span></label>
				 <textarea rows="3" cols="40" name="dem_profpost" id="dem_profpost"><?php echo "$ligne->dem_profpost" ;?></textarea>
			  </li>
		<li><?php echo _T('diplomes') ;?>
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
     <?php if ($ligne->dem_id > '') { 
			      echo "<li>" . _T('cv_formats')  . "<ul>" ;
			      echo "<li><label for=\"fichierbr\">" . _T('en_breton') . "</label><br />
				   <input type=\"file\" name=\"cvbr\" id=\"fichierbr\"/></li>";
			      echo "<li><label for=\"fichierfr\">" . _T('en_francais') . "</label><br />
				   <input type=\"file\" name=\"cvfr\" id=\"fichierfr\"/></li>";
			      echo "</ul></li>" ;
		     } else echo "<li>" . _T('enregistre_dabord') . "</li>"; 
	  ?>
       
</ul>
 
	<?php boutonsValidation ('spip.php?page=sommaire', $ligne->dem_id, 'dem_') ; ?>
 
</form> 

<div id="carte" name="carte">
<div style="float: right" id="masquerCarte"><a href="#">Fermer [X]</a></div>
  <div class="titre">Trouver les coordonnées</div>
    <form id='formCarte' name='formCarte' action="#" onsubmit="showAddress(this.address.value); return false">
      <p><div>Vous pouver saisir une adresse, le nom d'une commune ...</div>     
        <input type="text" size="50" name="address" id="address" />
        <input type="hidden" size="10" id="clickLat" name="clickLat"/> 
        <input type="hidden" size="10" id="clickLng" name="clickLng" />
        <input type="submit" value="Géocoder" /> 
      </p>
      <div align="right">Ou cliquer sur un emplacement sur la carte et 
      <input type="button" name="localiser" value="Valider" id="localiser" /> cette position</div>
      <div id="map_canvas" style="width: 600px; height: 300px; margin:0px;"></div> 
    </form>
</div>
