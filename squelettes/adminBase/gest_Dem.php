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
				if (isset($detruire)) {
//					echo "<br>Destructions CVs de dem_id : " . $dem_id ;
					destrocvs($dem_id, $connexion);
					$dem_id = "";
				};
				echo "<div class='menu' id='documents_joints'><h2>" . _T('operation_succes') . "</h2></div>";
				echo 
				"<form action='' method='post'> \n "
				."<INPUT TYPE=\"hidden\" id=\"dem_id\" NAME=\"dem_id\" VALUE=\"".$dem_id."\">"
				."<input type='submit' value='" . _T('continuer') . "'>\n"
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
		$resultat = execRequete ($mareq." ORDER BY dem_id", $connexion); 
	echo "<table cellpadding=\"1\" cellspacing=\"1\" border=\"1\" width=\"100%\">
		<tr>
			<td>id</td>
			<td>Nom</td>
			<td>Prénom</td>
			<td>domaine</td>
			<td>Date modif</td>
			<td> </td>
		</tr>";
		while ($ligne = mysql_fetch_object ($resultat)) {
			echo " 
					 <tr><td>$ligne->dem_id </td> 
					 <td>$ligne->dem_nom</td> 
					 <td >$ligne->dem_prenom</td>
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
		<li><?php formInputText ('dem_cp', 7, $ligne, _T('code_postal')); ?>&nbsp;&nbsp;&nbsp;<?php formInputText ('dem_ville', 40, $ligne, _T('commune')); ?>
		&nbsp;&nbsp;&nbsp;<?php echo _T('voiture') ;?>
			<ul>
				<li><?php formRadio ('dem_voit', 'Oui', $ligne, _T('oui')); ?></li>
          	<li><?php formRadio ('dem_voit', 'Non', $ligne, _T('non')); ?></li>
       	</ul>
 		</li>
		<li><?php echo _T('domaine') ;?>
			<ul><?php formCheckboxEnum ('dem_domaines', $listedoms, $ligne, $labelsdoms); ?></ul>
		  </li>
		<li><?php echo _T('diplomes') ;?>
			<ul><?php formCheckboxEnum ('dem_diplomes', $listediplm, $ligne, $labelsdiplm); ?></ul>
			</li>
		<li><?php formInputText ('dem_diplodivers', 40, $ligne, _T('diplodivers')); ?></li> 
		<li><label for="dem_profpost"><?php echo _T('profil') ;?><span class="notes">(optionnel)</span></label>
				 <textarea rows="3" cols="40" name="dem_profpost" id="dem_profpost"><?php echo "$ligne->dem_profpost" ;?></textarea>
			  &nbsp;&nbsp;&nbsp;<label for="dem_dispo"><?php echo _T('disponibilite') ;?></label>
        <textarea rows="3" cols="40" name="dem_dispo" id="dem_dispo"><?php echo "$ligne->dem_dispo" ;?></textarea>
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
