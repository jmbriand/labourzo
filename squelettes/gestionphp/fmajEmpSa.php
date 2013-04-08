<?PHP
/*		$minUserLevel = 1;
		$cfgProgDir =  '../_phpSecure/';
		include($cfgProgDir . "secure.php");*/
		
   require ("design.php");
	require ("formulaire.php");
	require ("squelettes/local_fr.php");
//	require ("squelettes/local_br.php");
    $connexion = initier();
		$emp_idauteur = $auteur_session['id_auteur'];
/*		if ($GLOBALS['spip_lang'] == 'fr') 
		$idart = '13' ;
		else $idart = '19' ;*/
//		echo "lang = " . $_REQUEST ['lang_select'] ;
?>
<script src="squelettes/gestionphp/jquery.js"></script>
<script type="text/javascript" src="squelettes/gestionphp/jquery.bgiframe.min.js"></script>
<script type="text/javascript" src="squelettes/gestionphp/jquery.ajaxQueue.js"></script>

<script type="text/javascript">

$(document).ready(function(){	 
	 $("#modif").submit(function() {	// VERIFIE SAISIE
		poste = $("#emp_poste").val();
		if(poste.length<2) {alert('Veuillez préciser le poste S.V.P. !');return false ;} ;
		
		durdate = $("#emp_durdates").val();
		if(durdate.length<2) {alert('Veuillez préciser la durée ou les dates S.V.P. !');return false ;} ;
		
		lieu = $("#emp_lieu").val();
		if(lieu.length<2) {alert('Veuillez préciser le lieu S.V.P. !');return false ;} ;

		nom = $("#emp_nom").val();
		if(nom.length<2) {alert('Veuillez préciser un employeur S.V.P. !');return false ;} ;
		
//		tel = $("#emp_tel").val();
//		if(tel.length<10) {alert('Veuillez donner un N° de téléphone S.V.P. !');return false ;} ;
		
		mel = $("#emp_mel").val();
		if(mel.lastIndexOf("@")<0) {alert('Veuillez donner une adresse e-mail valide S.V.P. !');return false ;} ;
		
		if($('input[type=radio][name=emp_domaines]:checked').length<1) {alert('Veuillez choisir un domaine S.V.P. !');return false ;} ;
		
		contact = $("#emp_contact").val();
		if(contact.length<10) {alert('Veuillez préciser les coordonnées du contact S.V.P. !');return false ;} ;
	});

}); 	 


</script>

 
<?PHP 
// CORRECTIONS VALEURS
$emp_id = $_REQUEST ['emp_id'] ;
/*$emp_idauteur = $_REQUEST ['emp_idauteur'] ;*/
$emp_nom = addslashes ( $_REQUEST ['emp_nom']);
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
$emp_contact = addslashes ( $_REQUEST ['emp_contact'] );

$inserer = $_REQUEST['inserer'] ;
$modifier = $_REQUEST['modifier'] ;
$detruire = $_REQUEST['detruire'] ;

//----Connection à la base, et création de l'ordre SQL 
 
if (isset($inserer)) 
	 $requete = "INSERT INTO ".TABLE_EMP."  
	 (emp_idauteur, emp_nom, emp_adresse, emp_cp, emp_ville, emp_tel, emp_fax, emp_mel, 
	 emp_web, emp_domaines, emp_poste, emp_type, emp_durdates, emp_lieu, emp_profil, emp_mission, emp_remu, emp_remq, emp_contact ) 
	 VALUES ('$emp_idauteur', '$emp_nom', '$emp_adresse', '$emp_cp', '$emp_ville','$emp_tel', '$emp_fax', 
	 '$emp_mel', '$emp_web', '$emp_domaines', '$emp_poste', '$emp_type', '$emp_durdates', '$emp_lieu', '$emp_profil', 
	 '$emp_mission', '$emp_remu', '$emp_remq', '$emp_contact') 
	 "; 
	  
if (isset($modifier))  
	 $requete = "UPDATE  ".TABLE_EMP." 
	 SET emp_id='$emp_id', emp_idauteur='$emp_idauteur', emp_nom='$emp_nom', emp_adresse='$emp_adresse', 
	 		emp_cp='$emp_cp', emp_ville='$emp_ville', emp_tel='$emp_tel', emp_fax='$emp_fax', emp_mel='$emp_mel', 
	 		emp_web='$emp_web', emp_domaines='$emp_domaines', emp_poste='$emp_poste', emp_type='$emp_type', 
	 		emp_durdates='$emp_durdates', emp_lieu='$emp_lieu', emp_profil='$emp_profil', emp_mission='$emp_mission', 
	 		emp_remu='$emp_remu', emp_remq='$emp_remq', emp_contact='$emp_contact'  
	 WHERE emp_id= $emp_id 
	 "; 
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
				."<input type='submit' value='" . _T('continuer') . "'>\n"
				."</form>" ;
				return;
				}
	else 
   {echo "<B><font color=#ff0000>Erreur dans l'execution de la requ&ecirc;te.</font></B></BR>";
    echo "$requete <p></p>message de MySql : " . mysql_error($connexion); exit ;}
	; 
};

 if (isset($emp_idauteur))  
{ 
	 $resultat = execRequete ("SELECT * FROM ".TABLE_EMP." WHERE emp_idauteur = '$emp_idauteur' ", $connexion); 
	// $ligne = mysql_fetch_object ($resultat); 
	 $fiche = mysql_num_rows($resultat) ;


//	if (isset($emp_id))
	
//	echo "id_article = " . $_REQUEST[ id_article ] ; 
	if ( $fiche == 0 || isset($emp_id) )
	{
		$resultat = execRequete ("SELECT * FROM ".TABLE_EMP." WHERE emp_id = '$emp_id' ", $connexion); 
		$ligne = mysql_fetch_object ($resultat); 
		Aff_formemp($ligne, $emp_idauteur);
	} else {
	echo 
	"<form action='' method='post'> \n "
	."<INPUT TYPE=\"hidden\" id=\"emp_id\" NAME=\"emp_id\" VALUE=\"0\"> \n "
	."<input type='submit' value='" . _T('ajouter_fiche') . "'>\n"
	."</form>" ;
	
	};
}
?> 
