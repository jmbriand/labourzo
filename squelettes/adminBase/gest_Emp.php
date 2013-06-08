<?PHP
		
   require ("squelettes/gestionphp/design.php");
	require ("squelettes/gestionphp/formulaire.php");
	require ("squelettes/local_fr.php");
//	require ("squelettes/local_br.php");
    $connexion = initier();
//		$emp_idauteur = $auteur_session['id_auteur'];
?>
<script src="squelettes/gestionphp/jquery.js"></script>
<script type="text/javascript" src="squelettes/gestionphp/jquery.bgiframe.min.js"></script>
<script type="text/javascript" src="squelettes/gestionphp/jquery.ajaxQueue.js"></script>
 
<?PHP 
// CORRECTIONS VALEURS
$emp_id = $_REQUEST ['emp_id'] ;
/*$emp_nom = addslashes ( $_REQUEST ['emp_nom']);
$emp_adresse = addslashes ( $_REQUEST ['emp_adresse']);
$emp_cp = $_REQUEST ['emp_cp'];
$emp_ville = addslashes ( $_REQUEST ['emp_ville'] );
$emp_tel = $_REQUEST ['emp_tel'];
$emp_fax = $_REQUEST ['emp_fax'];
$emp_mel = $_REQUEST ['emp_mel'];
$emp_web = $_REQUEST ['emp_web'];
$emp_domaines = $_REQUEST ['emp_domaines'];
$emp_poste = addslashes ( $_REQUEST ['emp_poste'] );
$emp_type = $_REQUEST [emp_type ];
$emp_durdates = addslashes ( $_REQUEST ['emp_durdates'] );
$emp_lieu = addslashes ( $_REQUEST ['emp_lieu'] );
$emp_profil = addslashes ( $_REQUEST ['emp_profil'] );
$emp_mission = addslashes ( $_REQUEST ['emp_mission'] );
$emp_remu = addslashes ( $_REQUEST ['emp_remu'] );
$emp_remq = addslashes ( $_REQUEST ['emp_remq'] );
$emp_contact = addslashes ( $_REQUEST ['emp_contact'] );*/

$modifier = $_REQUEST['modifier'] ;
$precedent = $_REQUEST['precedent'] ;
$suivant = $_REQUEST['suivant'] ;
$detruire = $_REQUEST['detruire'] ;

//----Connection à la base, et création de l'ordre SQL 
 
if (isset($detruire)) 
	 $requete = "DELETE FROM ".TABLE_EMP."
	 WHERE emp_id= $emp_id"; 
	  
//------ Exécution de l'ordre 
//$connexion = connexion(SERVEUR, NOM, PASSE, BASE); 
if (isset($requete)) {
	$resultat = mysql_query	($requete, $connexion); 
	if ($resultat) {
				echo 
				"<form action='' method='post'> \n "
				."<INPUT TYPE=\"hidden\" id=\"emp_id\" NAME=\"emp_id\" VALUE=\"" . $emp_id . "\">"
				."<h2>Suppression de l'enregistrement N° ". $emp_id . " effectuée. <h2/>\n"
				."<input type='submit' value='" . _T('continuer') . "'>\n"
				."</form>" ;
				return;
				}
	else 
   {echo "<B><font color=#ff0000>Erreur dans l'execution de la requ&ecirc;te.</font></B></BR>";
    echo "$requete <p></p>message de MySql : " . mysql_error($connexion); exit ;}
	; 
};

$fiche = 0;

if ($emp_id != '') {
	if (isset($precedent)) {
			$resultat = execRequete ("SELECT * FROM ".TABLE_EMP." WHERE emp_id<".$emp_id." ORDER BY emp_id DESC LIMIT 1", $connexion); 
		} else if (isset($suivant)) {
			$resultat = execRequete ("SELECT * FROM ".TABLE_EMP." WHERE emp_id>".$emp_id." ORDER BY emp_id LIMIT 1", $connexion); 
		} else {		// demande d'edition ou retour de modif
			$resultat = execRequete ("SELECT * FROM ".TABLE_EMP." WHERE emp_id=".$emp_id, $connexion); 
			}
	 $fiche = mysql_num_rows($resultat) ;
	} else {
		$resultat = execRequete ("SELECT * FROM ".TABLE_EMP." ORDER BY emp_datmodif", $connexion); 
	echo "<table cellpadding=\"1\" cellspacing=\"1\" border=\"1\" width=\"100%\">
		<tr>
			<td>id</td>
			<td>Employeur</td>
			<td>Poste</td>
			<td>domaine</td>
			<td>Date modif</td>
			<td> </td>
		</tr>";
		while ($ligne = mysql_fetch_object ($resultat)) {
			echo " 
					 <tr><td>$ligne->emp_id </td> 
					 <td>$ligne->emp_nom</td> 
					 <td >$ligne->emp_poste</td>
					 <td>$ligne->emp_domaines</td> 
					 <td >$ligne->emp_datmodif</td>
					 <td ><form action='' method='post' class='ajax'>
				  	 <INPUT TYPE='hidden' id='emp_id' NAME='emp_id' VALUE='$ligne->emp_id'>
                <input type='submit' name='edit' value='edit'>
                </form></td>
					 </tr>"; 
			};
	echo "</table>";
	return;
	};

// cas d'un precedent sur premier ou suivant sur dernier
if ($fiche == 0)  {
		$resultat = execRequete ("SELECT * FROM ".TABLE_EMP." WHERE emp_id=".$emp_id, $connexion); 
		}
		
$ligne = mysql_fetch_object ($resultat); 
		
	echo "<form action=\"\" method=\"post\" name=\"modif\" id=\"modif\">";
	echo "<label for=\"emp_id\">emp_id</label>" ;
	echo "<INPUT TYPE=\"text\" id=\"emp_id\" NAME=\"emp_id\" VALUE=\"" . $ligne->emp_id . "\">";
	echo "&nbsp;&nbsp;&nbsp;<label for=\"emp_idauteur\">emp_idauteur</label>" ;
	echo "<INPUT TYPE=\"text\" id=\"emp_idauteur\" NAME=\"emp_idauteur\" VALUE=\"" . $ligne->emp_idauteur . "\">";
	echo "<INPUT TYPE=\"hidden\" NAME='OK' VALUE='1'>";
	echo "<ul><li><SPAN class=notes>" . _T('fiche_modif_le') ;
	$date = timestampeur($ligne->emp_datmodif);
	echo $date ;
	echo "</SPAN></li><li>";	 
	echo formInputText ('emp_poste', 40, $ligne, _T('poste'));
	echo "&nbsp;&nbsp;&nbsp;";
	echo formInputText ('emp_durdates', 40, $ligne, _T('duree_dates'));
	echo "</li><li>";
	echo formInputText ('emp_lieu', 40, $ligne, _T('lieu'));
	echo "&nbsp;&nbsp;&nbsp;";
	echo formInputText ('emp_nom', 40, $ligne, _T('nom_emp')) ;
	echo "</li><li>";
	echo formInputText ('emp_mel', 40, $ligne, _T('mel'));
	echo "&nbsp;&nbsp;&nbsp;";
	echo formInputText ('emp_web', 40, $ligne, _T('web'));
	echo "</li><li>";
	echo "<label>" . _T('domaine_emp') . "</label>";
	echo "<ul><li>";
	echo formRadio ('emp_domaines', 'CVL', $ligne, _T('cvl'));
	echo "</li><li>";
   echo formRadio ('emp_domaines', 'Baby Sit.', $ligne, _T('babysit'));
	echo "</li><li>";
   echo formRadio ('emp_domaines', 'Petite enf.', $ligne, _T('petite_enf'));
	echo "</li><li>";
   echo formRadio ('emp_domaines', 'Ecoles', $ligne, _T('ecoles'));
	echo "</li><li>";
   echo formRadio ('emp_domaines', 'Action culturelle', $ligne, _T('action_cultu'));
	echo "</li></ul>";
	echo "</li><li>";
	echo "<label for=\"emp_mission\">" . _T('mission') . "</label>";
	echo "<textarea rows=\"3\" cols=\"40\" name=\"emp_mission\" id=\"emp_mission\">" . $ligne->emp_mission . "</textarea>"; 
	echo "&nbsp;&nbsp;&nbsp;";
	echo "<label for=\"emp_profil\">" . _T('profil') . "</label>";
	echo "<textarea rows=\"3\" cols=\"40\" name=\"emp_profil\" id=\"emp_profil\">" . $ligne->emp_profil . "</textarea>"; 
	echo "</li><li>";
	echo "<label>" . _T('type') . "</label>";
	echo "<ul><li>";
	echo formRadio ('emp_type', 'CDI', $ligne, _T('cdi'));
	echo "</li><li>";
   echo formRadio ('emp_type', 'CDD', $ligne, _T('cdd'));
	echo "</li><li>";
   echo formRadio ('emp_type', 'Benev.', $ligne, _T('benevole'));
	echo "</li><li>";
   echo formRadio ('emp_type', 'Indemnite', $ligne, _T('indemnite'));
	echo "</li></ul>";
	echo "&nbsp;&nbsp;&nbsp;";
	echo formInputText ('emp_remu', 40, $ligne, _T('remuneration'));
	echo "</li><li>";
	echo "<label for=\"emp_remq\">" . _T('remarques') . "</label>";
	echo "<textarea rows=\"3\" cols=\"40\" name=\"emp_remq\" id=\"emp_remq\">" . $ligne->emp_remq . "</textarea>"; 
	echo "&nbsp;&nbsp;&nbsp;";
	echo "<label for=\"emp_contact\">" . _T('contact') . "<small>" . _T('exemple_contact') . "</small></label>";
	echo "<textarea rows=\"3\" cols=\"40\" name=\"emp_contact\" id=\"emp_contact\">" . $ligne->emp_contact . "</textarea>"; 
	echo "</li></ul>";
	
	echo "<p class='boutons'>" ;
	echo "<input type=SUBMIT name='precedent' value='<< Précédent' > \n" ;
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type=SUBMIT name='modifier' value='". _T('modifier')."' >";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type=SUBMIT name='detruire' value='" . _T('detruire') . "' 
						onClick=\"javascript:return confirm('" . _T('confirm_suppr') . "') \"> \n ";			
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type=SUBMIT name='suivant' value='Suivant >>' > \n" ;
	echo "</p>" ;
			
	echo "</form>"; 


?> 
