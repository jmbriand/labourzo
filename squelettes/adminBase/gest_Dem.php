<?PHP
   require ("squelettes/gestionphp/design.php");
	require ("squelettes/gestionphp/formulaire.php");
	require ("squelettes/local_fr.php");
    $connexion = initier();
//		$dem_idauteur = $auteur_session['id_auteur'];
		$taille_max = 1048576 ;
?>
<script src="squelettes/gestionphp/jquery.js"></script>
<script type="text/javascript" src="squelettes/gestionphp/jquery.bgiframe.min.js"></script>
<script type="text/javascript" src="squelettes/gestionphp/jquery.ajaxQueue.js"></script>

<script type="text/javascript">

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

$modifier = $_REQUEST['modifier'] ;
$precedent = $_REQUEST['precedent'] ;
$suivant = $_REQUEST['suivant'] ;
$detruire = $_REQUEST['detruire'] ;
//$detcv = $_REQUEST['detcv'] ;


//----Connection à la base, et création de l'ordre SQL 

if (isset($modifier))  
	 $requete = "UPDATE  ".TABLE_DEM." 
					 SET dem_nom='$dem_nom', dem_prenom='$dem_prenom', dem_datnais='$dem_datnais', dem_email='$dem_email', 
					 dem_cp='$dem_cp', dem_ville='$dem_ville', dem_voit='$dem_voit', dem_domaines='$dem_domaines', 
					 dem_profpost='$dem_profpost', dem_diplomes='$dem_diplomes', dem_diplodivers='$dem_diplodivers', 
					 dem_dispo='$dem_dispo', dem_remq='$dem_remq'
					 		WHERE dem_id= $dem_id "; 
					 		
	 		
if (isset($detruire)) 
	 $requete = "DELETE FROM ".TABLE_DEM." WHERE dem_id= $dem_id"; 
	  
//------ Exécution de l'ordre 
if (isset($requete)) {
	$resultat = mysql_query	($requete, $connexion); 
	if ($resultat) {
				$butconti = "edit";
				if (isset($detruire)) {
//					echo "<br>Destructions CVs de dem_id : " . $dem_id ;
					destrocvs($dem_id, $connexion);
					$dem_id = "";
					$butconti = "";
				};
				echo "<div class='menu' id='documents_joints'><h2>" . _T('operation_succes') . "</h2></div>";
				echo 
				"<form action='' method='post'> \n "
				."<INPUT TYPE=\"hidden\" id=\"dem_id\" NAME=\"dem_id\" VALUE=\"".$dem_id."\">"
				."<input type='submit' name='".$butconti."' value='" . _T('continuer') . "'>\n"
				."</form>" ;
				return;
	}
	else 
   {echo "<B><font color=#ff0000>Erreur dans l'execution de la requ&ecirc;te.</font></B><BR>$dem_remq<BR>";
    echo "$requete <p></p>message de MySql : " . mysql_error($connexion); exit ;}
	; 
};

$mareq = "SELECT * FROM ".TABLE_DEM ;
$fiche = 0;

if ($dem_id != '') {
	if (isset($precedent)) {
			$resultat = execRequete ($mareq." WHERE dem_id<".$dem_id." ORDER BY dem_id DESC LIMIT 1", $connexion); 
		} else if (isset($suivant)) {
			$resultat = execRequete ($mareq." WHERE dem_id>".$dem_id." ORDER BY dem_id LIMIT 1", $connexion); 
		} else {	// demande d'edition ou retour de modif
			$resultat = execRequete ($mareq." WHERE dem_id=".$dem_id, $connexion); 
			}
	 $fiche = mysql_num_rows($resultat) ;
	} else {
		$resultat = execRequete ("SELECT d.*,a.nom,a.email FROM ".TABLE_DEM." d JOIN lbz_auteurs a ON d.dem_idauteur=a.id_auteur ORDER BY dem_datmodif", $connexion); 
	echo "<table cellpadding=\"1\" cellspacing=\"1\" border=\"1\" width=\"100%\">
		<tr align='center'>
			<td><big>id</big></td>
			<td><big>Nom</big></td>
			<td><big>Prénom</big></td>
			<td><big>Mail Auteur</big></td>
			<td><big>domaine</big></td>
			<td><big>Date modif</big></td>
			<td> </td>
		</tr>";
		while ($ligne = mysql_fetch_object ($resultat)) {
			echo " 
					 <tr><td>$ligne->dem_id </td> 
					 <td>$ligne->dem_nom</td> 
					 <td >$ligne->dem_prenom</td>
					 <td >$ligne->email</td>
					 <td>$ligne->dem_domaines</td> 
					 <td >$ligne->dem_datmodif</td>
					 <td ><form action='' method='post' class='ajax'>
				  	 <INPUT TYPE='hidden' id='dem_id' NAME='dem_id' VALUE='$ligne->dem_id'>
                <input type='submit' name='edit' value='edit'>
                </form></td>
					 </tr>"; 
			};
	echo "</table>";
	return;
	};




// cas d'un precedent sur premier ou suivant sur dernier
if ($fiche == 0)  {
		$resultat = execRequete ($mareq." WHERE dem_id=".$dem_id, $connexion); 
		}

 $ligne = mysql_fetch_object ($resultat); 
 $fiche = mysql_num_rows($resultat) ;

 $dem_idauteur = $ligne->dem_idauteur ;

 $resu = execRequete ("SELECT * FROM xx_upcurvit WHERE up_idauteur = '$dem_idauteur' ", $connexion); 
 $nbcv = mysql_num_rows($resu) ;

 $listedoms = array('anim', 'gardenf', 'enseignmt', 'accompscol', 'commarti', 'sante', 'commedia', 'linguis', 'admin', 'arts', 'divers') ;
 $labelsdoms = array(_T('anim'), _T('gardenf'), _T('enseignmt'), _T('accompscol'), _T('commarti'), _T('sante'), _T('commedia'), _T('linguis'), _T('admin'), _T('arts'), _T('divers')) ;
 $listediplm = array('B.A.F.A.', 'Stagiaire BAFA', 'B.A.F.D.', 'Stagiaire BAFD', 'BEATEP-BPJEPS', 'Surveillant de baignade', 'Premiers secours') ;
 $labelsdiplm = array(_T('bafa'), _T('stage_bafa'), _T('bafd'), _T('stage_bafd'), _T('beatep_bpjeps'), _T('surv_baignade'), _T('premiers_sec')) ;
?> 

<!-- formulaire de modification pr&eacute;garni &eacute;ventuellement--> 
<!-- <form action="squelettes/gestionphp/fmajDemTr.php" method="post" name="modif" id="modif">  -->
<form action="" method="post" name="modif" id="modif"> 

			<label for="dem_id">dem_id</label>
	  		<INPUT TYPE="text" id="dem_id" NAME="dem_id" VALUE="<?php echo"$ligne->dem_id" ;?>">
			&nbsp;&nbsp;&nbsp;<label for="dem_idauteur">dem_idauteur</label>
	  		<INPUT TYPE="text" id="dem_idauteur" NAME="dem_idauteur" VALUE="<?php echo"$ligne->dem_idauteur" ;?>">
	  		<INPUT TYPE="hidden" ID="dem_lat" NAME="dem_lat" VALUE="<?php echo"$ligne->dem_lat" ;?>">
	  		<INPUT TYPE="hidden" ID="dem_long" NAME="dem_long" VALUE="<?php echo"$ligne->dem_long" ;?>">	 			 
			<INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="<?php echo $taille_max ?>" />
			<INPUT TYPE="hidden" NAME='OK' VALUE='1'>
	<ul> 
		<?php echo "<li><SPAN class=notes>" . _T('fiche_modif_le') ;?>
		<?php $date = timestampeur($ligne->dem_datmodif); echo"$date </SPAN</li>";?>	 
		<li><?php formInputText ('dem_nom', 40, $ligne, _T('nom_dem'));?>&nbsp;&nbsp;&nbsp;<?php formInputText ('dem_prenom', 40, $ligne, _T('prenom_dem'));?> </li> 
		<li><?php formInputText ('dem_datnais', 20, $ligne, _T('datnaiss')); ?>  (jj-mm-aaaa)&nbsp;&nbsp;&nbsp;<?php formInputText ('dem_email', 40, $ligne, _T('mel')); ?></li> 
		<li><?php formInputText ('dem_cp', 7, $ligne, _T('code_postal')); ?>&nbsp;&nbsp;&nbsp;<?php formInputText ('dem_ville', 40, $ligne, _T('commune')); ?></li>
		<li><?php echo _T('domaine') ;?>
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
		<li><?php echo _T('diplomes') ;?>
			<ul><?php formCheckboxEnum ('dem_diplomes', $listediplm, $ligne, $labelsdiplm); ?></ul>
			</li>
		<li><?php formInputText ('dem_diplodivers', 40, $ligne, _T('diplodivers')); ?></li> 
		<li><label for="dem_profpost"><?php echo _T('profil') . "<small>" . _T('profil_info') . "</small>"; ?><span class="notes">(optionnel)</span></label>
				 <textarea rows="3" cols="30" name="dem_profpost" id="dem_profpost"><?php echo "$ligne->dem_profpost" ;?></textarea>
			  &nbsp;&nbsp;&nbsp;<label for="dem_dispo"><?php echo _T('disponibilite') ;?></label>
        <textarea rows="3" cols="30" name="dem_dispo" id="dem_dispo"><?php echo "$ligne->dem_dispo" ;?></textarea>
      </li> 
      <li><label for="dem_remq"><?php echo _T('remarques') ;?></label>
			  		<!-- <span class="notes"><?php echo _T('non_affiche') ;?></span> -->
			  		<textarea rows="3" cols="40" name="dem_remq" id="dem_remq"><?php echo "$ligne->dem_remq" ;?></textarea>
      </li> 
       
</ul>
 
	<!-- <?php boutonsValidation ('spip.php?page=sommaire', $ligne->dem_id, 'dem_') ; ?> -->
	<p class='boutons'>
	<input type=SUBMIT name='precedent' value='<< Précédent' >
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type=SUBMIT name='modifier' value='<?php echo  _T('modifier') ;?>' >
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type=SUBMIT name='detruire' value='<?php echo  _T('detruire') ;?>' 
								onClick="javascript:return confirm('<?php echo  _T('confirm_suppr') ;?>')">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type=SUBMIT name='suivant' value='Suivant >>' >
	</p>
 
</form> 

<!-- Liste des cvs--> 
<?PHP 
if ($nbcv >= 1) {
	echo "<table cellpadding=\"1\" cellspacing=\"1\" border=\"1\" width=\"100%\">
		<tr>
			<td>id</td>
			<td>Nom</td>
			<td>Chemin</td>
			<td>Taille</td>
			<td>Date</td>
		</tr>";
		while ($licv = mysql_fetch_object ($resu)) {
			echo " 
					 <tr><td>$licv->up_id </td> 
					 <td>$licv->up_nom</td> 
					 <td ><a href=\"IMG/cvdemandr/$licv->up_chemin\">$licv->up_chemin</a></td>
					 <td>$licv->up_taille</td> 
					 <td >$licv->up_date</td>
					 </tr>"; 
			};
	echo "</table>";
	};
?>
