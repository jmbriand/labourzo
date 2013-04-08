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
$dem_idauteur = $_REQUEST ['dem_idauteur'] ;
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

//$inserer = $_REQUEST['inserer'] ;
//$modifier = $_REQUEST['modifier'] ;
$precedent = $_REQUEST['precedent'] ;
$detruire = $_REQUEST['detruire'] ;
//$detcv = $_REQUEST['detcv'] ;

//----Connection à la base, et création de l'ordre SQL 

if (isset($detruire)) 
	 $requete = "DELETE FROM ".TABLE_DEM."
	 WHERE dem_id= $dem_id"; 
	  
//------ Exécution de l'ordre 
//$connexion = connexion(SERVEUR, NOM, PASSE, BASE); 
if (isset($requete)) {
	$resultat = mysql_query	($requete, $connexion); 
	if ($resultat) {
				if (isset($detruire)) {
//					echo "<br>Destructions CVs de dem_id : " . $dem_id ;
					destrocvs($dem_id, $connexion);
				};
				echo "<div class='menu' id='documents_joints'><h2>" . _T('operation_succes') . "</h2></div>";
				echo 
				"<form action='' method='post'> \n "
				."<INPUT TYPE=\"hidden\" id=\"dem_id\" NAME=\"dem_id\" VALUE=\"" . $dem_id . "\">"
				."<input type='submit' value='" . _T('continuer') . "'>\n"
				."</form>" ;
				return;
	}
	else 
   {echo "<B><font color=#ff0000>Erreur dans l'execution de la requ&ecirc;te.</font></B><BR>$dem_remq<BR>";
    echo "$requete <p></p>message de MySql : " . mysql_error($connexion); exit ;}
	; 
};

// $resultat = execRequete ("SELECT * FROM ".TABLE_DEM." ORDER BY dem_id LIMIT 1", $connexion); 
$mareq = "SELECT * FROM ".TABLE_DEM ;
$fiche = 0;

if ($dem_id != '') {
	if (isset($precedent)) {
			$resultat = execRequete ($mareq." WHERE dem_id<".$dem_id." ORDER BY dem_id DESC LIMIT 1", $connexion); 
		} else {
			$resultat = execRequete ($mareq." WHERE dem_id>".$dem_id." ORDER BY dem_id LIMIT 1", $connexion); 
			}
	 $fiche = mysql_num_rows($resultat) ;
	} 

if ($fiche == 0)  {
		$resultat = execRequete ($mareq." ORDER BY dem_id LIMIT 1", $connexion); 
		}

 $ligne = mysql_fetch_object ($resultat); 
 $fiche = mysql_num_rows($resultat) ;
/* if ($fiche > 1) 
 		{echo "<br><div class=alerte > -+-+-+- Erreur de compte : veuillez contacter l'administrateur du site -+-+-+-</div>";
 		exit() ;};
*/
$dem_idauteur = $ligne->dem_idauteur ;

 $resu = execRequete ("SELECT * FROM xx_upcurvit WHERE up_idauteur = '$dem_idauteur' ", $connexion); 
 $nbcv = mysql_num_rows($resu) ;
 if ($nbcv < 1 and ( 
 	strpos($ligne->dem_domaines, 'C.V.L.') !== false ||
 	strpos($ligne->dem_domaines, 'Ecoles') !== false ||
 	strpos($ligne->dem_domaines, 'Action') !== false)
 	) {
// 	echo "<div class=alerte >" . _T('joindre_cv_svp') . "</div>";
 };


 $listedoms = array('C.V.L.', 'Baby sitting', 'Petite enfance', 'Ecoles', 'Action culturelle') ;
 $labelsdoms = array(_T('cvl'), _T('babysit'), _T('petite_enf_agree'), _T('ecoles'), _T('action_cultu')) ;
 $listediplm = array('B.A.F.A.', 'Stagiaire BAFA', 'B.A.F.D.', 'Stagiaire BAFD', 'BEATEP-BPJEPS', 'Surveillant de baignade', 'Premiers secours') ;
 $labelsdiplm = array(_T('bafa'), _T('stage_bafa'), _T('bafd'), _T('stage_bafd'), _T('beatep_bpjeps'), _T('surv_baignade'), _T('premiers_sec')) ;
?> 

<!-- formulaire de modification pr&eacute;garni &eacute;ventuellement--> 
<!-- <form action="squelettes/gestionphp/fmajDemTr.php" method="post" name="modif" id="modif">  -->
<form action="" method="post" name="modif" id="modif"> 

			<label for="dem_id">dem_id</label>
	  		<INPUT TYPE="text" id="dem_id" NAME="dem_id" VALUE="<?php echo"$ligne->dem_id" ;?>">
			&nbsp;&nbsp;&nbsp;<label for="dem_idauteur">dem_idauteur</label>
	  		<INPUT TYPE="text" id="dem_idauteur" NAME="dem_idauteur" VALUE="<?php echo"$dem_idauteur" ;?>">
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
	<input type=SUBMIT name='detruire' value='<?php echo  _T('detruire') ;?>' 
								onClick="javascript:return confirm('<?php echo  _T('confirm_suppr') ;?>')">
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
