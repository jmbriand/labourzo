<?php 

//AFFICHAGE D'UN LIEN  N° rubrique ou URL
function url ($nom) 
{ 
	if ($nom) 
		{
      	if (!ereg('^http://|../rubrique',$nom) ) $nom = "http://$nom" ;		 
		echo "<A HREF=\"$nom\" target=\"_blank\"><I>aller sur le site</I></A>";} 
}

//ENVOI DE COURRIER
function mailto ($nom)
			{
 		  if ($nom)
			{echo "<i>écrire : <font size=\"-1\"><a href=\"mailto:$nom\">$nom</font></a></i>";}
			}
			 
function mel ($nom)
			{
 		  if ($nom)
			{$a="<a href=\"mailto:$nom\">$nom</a>";}
			return $a ;}
			 
//		AFFICHE-ECHO SI EXISTE
function affiche ($avant, $var, $apres) 
{
	if ($var) {echo "$avant $var $apres";}
return ;
}

//		RETOURNE SI EXISTE
function retour ($avant, $var, $apres) 
{
	if (! isset($avant) ) $avant='' ;
	if (! isset($var) ) $var='' ;
	if (! isset($apres) ) $apres='' ;
	if ($var) {$retour = "$avant $var $apres";}
return ($retour) ;
}
 
// FONCTION REQUETE EVENEMENT
// req_evenement($quels, $connection) => ordre croissant
// req_evenement($quels, $connection, d) => ordre décroissant
// req_evenement($quels, $connection, c, 5) => les 5 premiers
function req_evenement ($quels,$connexion,$s='c', $l=20)
{
 $sens = 'ASC';
 if ($s=='d') $sens = 'DESC';

	$resultat = ExecRequete (" 
		SELECT etype,ecomment,eurl,emel,econtact,edeb,efin,etitre,epcode,eredact,pcode,pnom, 
		DATE_FORMAT(edeb, '%d %m %y') AS debut, DATE_FORMAT(efin, '%d %m %y') AS fin 
		FROM pays, a_evenements
		WHERE $quels AND epcode LIKE pcode ORDER BY edeb $sens LIMIT $l " , 
		$connexion);
	if (!$resultat) {echo "erreur sur la requête" ; exit ;}
	return $resultat;
}

//  FONCTION AFFICHE EVENEMENTS
// aff_evenement(XXX,1): affiche le nom du pays
function aff_evenement($resultat, $pays=0)
{
  while ($evenement = mysql_fetch_object ($resultat))
		{ if ($evenement->fin!='00 00 00') {
			$date = "du $evenement->debut au $evenement->fin " ; }
			else {$date = "le $evenement->debut" ; } ;
		echo "<FONT face=\"Arial, Helvetica, sans-serif\" SIZE +1 COLOR=\"#006699\">
		<B>".stripSlashes($evenement->etitre); echo"</B></FONT><BR>\n
	<table border=0 width = 100%  cellpadding=\"1\">
				 <tr><td width=5% >&nbsp;</td>
				 <td NOWRAP>  $date</td>\n 
				 <td align=right>"; if ($pays==1) {echo "<FONT face=\"Arial, Helvetica, sans-serif\"  
				 size=\"-1\" COLOR=\"#006699\">Pays $evenement->pnom</FONT>";};
				  echo"</td>
				 </tr>
				 <tr><td width=5% >&nbsp;</td>
				 <td colspan=2>
				 <FONT SIZE=-1>".nl2br(stripSlashes($evenement->ecomment)); echo "</FONT>\n
				 </td></tr>
				 <tr><td width=5% >&nbsp;</td>
				 <td colspan=2>
				 <FONT SIZE=-1>".nl2br(stripSlashes($evenement->econtact)); echo"</FONT>\n
				 </td></TR>
  			 <tr><td width=5% >&nbsp;</td>
				 <td>"; url($evenement->eurl); echo"</td><td align=\"right\">";
				 				mailto ( $evenement->emel ); echo"
				 </td></tr>
  </table>
	<br>"
	; $date=''; }
};

//		AFFICHE NOM DU TYPE D EVENEMENT abrégé ou pas	
// typeEv (1) => Evénement ; typeEv (1, 'a') => Ev
function typeEv ($codeType, $abrev='')
{
   $connexion = connexion(SERVEUR, NOM, PASSE, BASE);
   $resultat = ExecRequete ("select et_id, et_nom, et_abrev FROM ".TABLE_EV_TYP." 
   		WHERE et_id='$codeType'", $connexion);
	 $reponse = mysql_fetch_object ($resultat);
	 if ($abrev=='')  return ($reponse->et_nom);
	 else return ($reponse->et_abrev);
}

//......REQUETE ADHERENT
function req_adherent ($quels, $classer, $connexion)
{
	$resultat = ExecRequete (" SELECT s_id, s_nom, s_adresse, s_cp, s_ville, s_web, s_mel, 
	s_tel, s_comment, s_pub, s_pid, pcode, pnom 
				FROM ".TABLE_STR.", pays 
			WHERE $quels AND s_pub = 'publié' AND s_pid = pga
			ORDER BY $classer",
			$connexion);
if (!$resultat) {echo "erreur sur la requête" ; exit ;}
return $resultat ;
};

//      AFFICHAGE D'UN ADHERENT
function aff_adherent ($resultat)
{
  while ($adherent = mysql_fetch_object ($resultat))
	 {echo "<FONT FACE=\"arial, Helvetica, sans-serif\" 
	  		COLOR=\"#006699\"><B>$adherent->anom</B></FONT> 
				&nbsp;<font size=\"-1\"><i>Pays $adherent->pnom</i></font><BR>\n
				
	<table border=0 width = 100%  cellpadding=0 cellspacing=0>
				 <tr><td width=5% >&nbsp;</td>
				 <td colspan=2>
				 $adherent->s_adresse - <B>$adherent->s_cp $adherent->s_ville</B><br>\n 
				 </td></tr>" ;
				 if($adherent->s_pub = 'publié') {
   				 echo "<tr><td width=5%>&nbsp;</td>
   				 <td><font size=\"-1\">";
   				 affiche('tél. : ',$adherent->s_tel,' '); echo"</font></td> \n
   				 <td align=\"right\"> <font size=\"-1\">";
   				  affiche('fax. : ',$adherent->s_fax,'');
   				 echo "</font></td></TR>\n" ;
				 }			 
  			 echo "<tr><td width=5% >&nbsp;</td>
				 <td><font size=\"-1\">"; url($adherent->s_web); echo"</font></td> \n
				 <td align=\"right\"><font size=\"-1\">";	mailto ( $adherent->s_mel ); echo"</font>
				 </td></tr>";
				 if($adherent->s_comment){ echo "
   				 <tr><td width=5% >&nbsp;</td>
   				 <td colspan=2>
   				 <FONT SIZE=-1>". nl2br(stripSlashes($adherent->s_comment)) . "</FONT><br>\n
   				 </td></tr>"
				 ;}; echo "
  </table> <br>"
	; }
};

// FORMATAGE DE DATE POUR MYsql
function datemysql ($datesaisie)
{
	list($jour, $mois, $an) = split("[-./ ]", $datesaisie);
	return($an . "-" . $mois . "-" . $jour) ;
}

// FORMATAGE DE DATE POUR php
function datefr ($dateextraite)
{
	list($an, $mois, $jour) = split("[-./ ]", $dateextraite);
	return($jour . "-" . $mois . "-" . $an) ;
}	

// FORMATAGE DE DATE POUR timestamp (MySQL)
function timestampeur($dateheure)
{
	$dateheure = ereg_replace('(-| |:)', '', $dateheure) ;
	$y = substr($dateheure, 0, 4)  ;
	$m = substr($dateheure, 4, 2)  ;
	$j = substr($dateheure, 6, 2)  ;
	$h = substr($dateheure, 8, 2)  ;
	$mn = substr($dateheure, 10, 2)  ;
//	return ("$j $m $y, $h:$mn") ;
	return ("$j $m $y") ;
}

// TRAITEMENT DES QUOTES VALEURS SAISIES
function MyAddSlashes($chaine ) {
	if (get_magic_quotes_gpc() == 1) return $chaine ;
	else return addslashes($chaine) ;
//  return( get_magic_quotes_gpc() == 1 ?
//          $chaine : addslashes($chaine) );
}

function MyStripSlashes($chaine) {
  return( get_magic_quotes_gpc() == 1 ?
           stripslashes($chaine) : $chaine );
}

// TRAITEMENT DES QUOTES LU DS UN FICHIER OU UNE TABLE MYSQL
function MyStripSlashes_2($chaine) {
  return( get_magic_quotes_runtime() == 1 ?
           stripslashes($chaine) : $chaine  );
}
				 
//		AFFICHE NOM DU TYPE D ACTIVITE	
function type ($codeType)
{
   $connexion = connexion(SERVEUR, NOM, PASSE, BASE);
   $resultat = mysql_query ("select t_id, t_nom FROM ftype 
   		WHERE t_id='$codeType'", $connexion);
	 $reponse = mysql_fetch_object ($resultat);
	 return ($reponse->t_nom);
}

//		AFFICHE NOM DU PAYS	
function pays ($codePays)
{
   $connexion = connexion(SERVEUR, NOM, PASSE, BASE);
   $resultat = mysql_query ("select pnom FROM pays 
   		WHERE pcode='$codePays'", $connexion);
	 $reponse = mysql_fetch_object ($resultat);
	 if ($reponse->pnom > '')  return ('pays '.$reponse->pnom );
}
//		AFFICHE NOM DE COMMUNE	
function commune ($insee)
{
   $connexion = connexion(SERVEUR, NOM, PASSE, BASE);
   $resultat = mysql_query ("select code_insee, nom FROM f_communes_bzh
   		WHERE code_insee='$insee'", $connexion);
	 $reponse = mysql_fetch_object ($resultat);
	 return ($reponse->nom);
}
//		AFFICHE NOM DE L ASSO	
function asso ($codeStr)
{
   $connexion = connexion(SERVEUR, NOM, PASSE, BASE);
   $resultat = mysql_query ("select s_id, s_nom FROM fstructure 
   		WHERE s_id='$codeStr'", $connexion);
	 $reponse = mysql_fetch_object ($resultat);
	 if ($reponse->s_nom > '')  return ($reponse->s_nom );
}
// OUVRE FENETRE
function fenetre ($url,$lien,$cible,$width=500,$height=500 )
   {
   $tag="<a href=\"$url\" target=\"$cible\" 
   					onClick=\"javascript: org=window.open('','$cible','toolbar=no,location=no,directories=no, status=no,scrollbars=yes,resizable=yes,copyhistory=no,width=$width,height=$height'); org.focus()\">$lien</a>";
   return $tag ;
}
// RECHERCHE DE LA ZONE DEPARTEMENT OU REGION
function zone($codpos)
{
	$departement = substr ($codpos, 0, 2) ;
	switch ($departement)
   {
			case '13': $zone= 13; break;
			case '30': $zone= 30; break;
			case '33': $zone= 33; break;
			case '52': $zone= 52; break;
			case 'paca': $zone= 'paca'; break;
			case 'fr': $zone= 'fr'; break;
			default : $zone= 'bzh'; break;
	 }
	 return $zone ;
}
//		AFFICHE LA LISTE DES ACTIVITES SELECTIONNEES BRETON-GALLO

function listeAnim($resultatAct, $commune=0)// Si $commune=1 ne pas afficher la commune
{
	$i = 1;
	echo "<ul class=listes> \n";
	
	while ($act = mysql_fetch_object($resultatAct)) {
		$type = type($act->a_tid);
		$pays = pays($act->a_pid);
		$asso = asso($act->a_sid);
		$listInsee [$i] = $act->a_insee ;
		if ($listInsee [$i] < '999') $listInsee [$i] = 'non !' ; //ne pas planter animCarteCr.php
		if ($act->a_debval > 0)
			$debut = datefr($act->a_debval);
		if ($act->a_finval > 0)
			$fin = datefr($act->a_finval);

		echo 
		"<li class=listes>
			<div class=listes50d>\n
				<div class=gras>".
				fenetre("structure.php?id=$act->a_sid",$asso,'structure', 450, 350).
		 		"</div>\n
			</div>" .
			"<div class=titre2> $act->a_nom</div>\n".	 //"-$i-$listInsee[$i]" . //DEBUG
			
			"<div class=listes50d>\n";
				if ($commune!=1) 
					echo "<div class=petit><b>$pays</b> $act->a_cp&nbsp;$act->a_ville</div> \n" ;
				echo "<i>$type</i>\n
			</div>\n".
			
					
		"<div class=petit><b>$act->a_langue</b> - $act->a_age</div>\n ".
		"<div class=petit>" . retour('<i>Resp:</i> ', $act->a_resp,'') . " </div>\n ".
			
		retour('<div class= >du ', $debut, ' ').retour('au', $fin,"</div>\n").
		retour('<div class=violet >',$act->a_descrip, "</div>\n").
		retour('<div class=notes ><i>Conditions :</i> ', $act->a_condition,"</div>\n").
			
		"</li>\n";
		$i ++ ;
	}
	echo "</ul> \n";
	return $listInsee ;
}

//		AFFICHE LA LISTE DES STRUCTURES SELECTIONNEES BRETON-GALLO

function listeStr($resultat, $commune=0)// Si $commune=1 ne pas afficher la commune
{
	$i = 1;
	echo "<ul class=listes> \n";
	
	while ($str = mysql_fetch_object($resultat)) {
		$pays = pays($str->s_pid);
		$asso = $str->s_nom;
		$listInsee [$i] = $str->s_insee ;
		if ($listInsee [$i] < '999') $listInsee [$i] = 'non !' ; //ne pas planter animCarteCr.php

		echo 
		"<li class=listes>
				<div class=gras>".
				fenetre("structure.php?id=$str->s_id",$asso,'structure', 450, 350).
		 		"</div>\n ". 		
			"<div class=listes50d>\n";
				if ($commune!=1) 
					echo "<div class=petit><b>$pays</b> $str->s_cp&nbsp;$str->s_ville</div> \n" ;
				echo "<i>$type</i>\n
			</div>\n".
			
					
		"<div class=petit><b>$str->s_natjur</b> - $str->s_natprez</div>\n ".
			
		retour('<div class=violet >',$str->s_objec, "</div>\n").
			
		"</li>\n";
		$i ++ ;
	}
	echo "</ul> \n";
	return $listInsee ;
}
//"-$i-$listInsee[$i]" . //DEBUG

//		AFFICHE NOM DU TYPE D ACTIVITE	
function typeAdh ($codeType)
{
   $connexion = connexion(SERVEUR, NOM, PASSE, BASE);
   $resultat = mysql_query ("select t_id, t_nom FROM ".TABLE_TYP." 
   		WHERE t_id='$codeType'", $connexion);
	 $reponse = mysql_fetch_object ($resultat);
	 return ($reponse->t_nom);
}

//		AFFICHE NOM DE L ADHERENT	
function adherent ($codeStr)
{
   $connexion = connexion(SERVEUR, NOM, PASSE, BASE);
   $resultat = mysql_query ("select s_id, s_nom FROM ".TABLE_STR." 
   		WHERE s_id='$codeStr'", $connexion);
	 $reponse = mysql_fetch_object ($resultat);
	 if ($reponse->s_nom > '')  return ($reponse->s_nom );
}

//		AFFICHE LA LISTE DES ACTIVITES SELECTIONNEES des ADHERENTS

function listeAnimAdh($resultatAct, $cache='') // Si $cache='c' ne pas afficher la commune, ='a' ne pas afficher le nom de l'adhérent
{
	$i = 1;
	echo "<ul class=listes> \n";
	
	while ($act = mysql_fetch_object($resultatAct)) {
		$type = typeAdh($act->a_tid);
		$pays = pays($act->a_pid);
		$asso = adherent($act->a_sid);
		$listInsee [$i] = $act->a_insee ;
		if ($listInsee [$i] < '999') $listInsee [$i] = 'non !' ; //ne pas planter animCarteCr.php
		if ($act->a_debval > 0)
			$debut = datefr($act->a_debval);
		if ($act->a_finval > 0)
			$fin = datefr($act->a_finval);

		echo 
		"<li class=listes> \n" ;
		if ($cache!='a') { echo " <div class=listes50d>\n
   				<div class=gras>".
   				fenetre("structure.php?id=$act->a_sid",$asso,'structure', 520, 450).
   		 		"</div>\n
   			</div>" ;
			} ;
			echo "<div class=titre2> $act->a_nom</div>\n".	 //"-$i-$listInsee[$i]" . //DEBUG
			
			"<div class=listes50d>\n";
				if ($cache!='c') 
					echo "<div class=petit><b>$pays</b> $act->a_cp&nbsp;$act->a_ville</div> \n" ;
				echo "</div>\n".
			
					
		"<div class=petit><i>$type</i> $act->a_age</div>\n ".
		"<div class=petit>" . retour('<i>Resp:</i> ', $act->a_resp,'') . " </div>\n ".
		retour('<div class=violet >',$act->a_descrip, "</div>\n").
		retour('<div class=notes ><i>Conditions :</i> ', $act->a_condition,"</div>\n").
			
		"</li>\n";
		$i ++ ;
	}
	echo "</ul> \n";
	return $listInsee ;
}

//		AFFICHE LA LISTE DES STRUCTURES SELECTIONNEES

function listeAdh($resultat, $commune=0)// Si $commune=1 ne pas afficher la commune
{
	$i = 1;
	echo "<ul class=listes> \n";
	
	while ($str = mysql_fetch_object($resultat)) {
		$pays = pays($str->s_pid);
		$asso = $str->s_nom;
		$listInsee [$i] = $str->s_insee ;
		if ($listInsee [$i] < '999') $listInsee [$i] = 'non !' ; //ne pas planter animCarteCr.php

		echo 
		"<li class=listes>" .
			"<div class=listes50d>\n";
				if ($commune!=1) 
					echo "<div class=petit><b>$pays</b> $str->s_cp&nbsp;$str->s_ville</div> \n" ;
				echo "<i>$type</i>\n
			</div>\n".
				"<div class=gras>".
				fenetre("structure.php?id=$str->s_id",$asso,'structure', 600, 450).
		 		"</div>\n ". 		
			
			
		retour('<div class=violet >',$str->s_objec, "</div>\n").
			
		"</li>\n";
		$i ++ ;
	}
	echo "</ul> \n";
	return $listInsee ;
}
//"-$i-$listInsee[$i]" . //DEBUG

// OUVRE FENETRE AIDE
function aideFen ($ancre,$width=400,$height=300 )
   {
   $tag="<a href=\"../aideSaisie.html#$ancre\" target=\"aide\" 
   					onClick=\"javascript: org=window.open('','aide','toolbar=no,location=no,directories=no, status=no,scrollbars=yes,resizable=yes,copyhistory=no,width=$width,height=$height'); org.focus()\">
<img src=\"../_images/aide.png\" width=\"11\" height=\"15\" alt=\"aide\" border=0 /></a>";
   echo $tag ;
}

//		Traitement des fichiers C.V. associés aux fiches 

function cvenrgt($cv_nom, $cv_size, $cv_tmp, $cv_err, $taille_max) 
{
	$nomfich = "" ;
	if ($cv_err > 0) 
		echo "<br>Erreur de transfert : votre fichier d&eacute;passe peut-&ecirc;tre la limite de 1Mo autoris&eacute;e ..." ;
	else { 
		if ($cv_size > $taille_max) $erreur = "Le fichier est trop gros";
		else {
			$extensions_valides = array( 'pdf' , 'odt' , 'doc' , 'docx' );
			//1. strrchr renvoie l'extension avec le .
			//2. substr(chaine,1) ignore le premier caract&egrave;re de chaine
			//3. strtolower met l'extension en minuscule
			$extension_upload = strtolower(  substr(  strrchr($cv_nom, '.')  ,1)  );
			if ( !in_array($extension_upload,$extensions_valides) ) echo "<br>Type de fichier invalide";
			else {
				$nomfich = md5(uniqid(rand(), true)) . ".{$extension_upload}" ;
				$deplace = move_uploaded_file($cv_tmp, "IMG/cvdemandr/". $nomfich);
//				if ($deplace) echo "Transfert r&eacute;ussi";
				
			};
		};
	};

	return $nomfich ;
}

//		Ajout d'un enregistrement dans la table xx_upcurvit

function addCV($dem_id, $dem_idauteur, $cv_nom, $nomfich, $cv_size, $cv_lang, $connexion)
{
	 $requete = "INSERT INTO xx_upcurvit 
		 (up_demid, up_idauteur, up_nom, up_chemin, up_taille, up_lang ) 
		 VALUES ('$dem_id', '$dem_idauteur', '$cv_nom', '$nomfich', '$cv_size', '$cv_lang') "; 
	 $resultat = mysql_query($requete, $connexion);
	 if (!$resultat) {
		echo "<br><B><font color=#ff0000>Erreur dans l'execution de la requ&ecirc;te.</font></B><br>";
//	   echo "$requete <p></p>message de MySql : " . mysql_error($connexion); 
	   exit ;
	}; 

}

//		Nettoyage CVs d'une fiche demandeur détruite

function destrocvs($dem_id, $connexion)
{
	$requete = "SELECT * FROM xx_upcurvit WHERE up_demid = '$dem_id' ";
	$resultat = mysql_query($requete, $connexion);
	while ($line = mysql_fetch_object ($resultat)) {
		supp_cv($line->up_id, $connexion) ;
//		$nomfich = $line->up_chemin ;
//		if (unlink("IMG/cvdemandr/". $nomfich)) {
//			$drop = "DELETE FROM xx_upcurvit WHERE up_id = $line->up_id ";
//			$destru = mysql_query($drop, $connexion);
//			if (!$destru) {
//				echo "<br><B><font color=#ff0000>Erreur dans l'execution de la requ&ecirc;te.</font></B><br>";
//			   echo "$drop <p></p>message de MySql : " . mysql_error($connexion); 
//			   exit ;
//			}
//		} else echo "Probl&egrave;me avec fichier : " . $nomfich . "  <br> Veuillez contacter l'administrateur.";
	} 
}

function supp_cv($up_id, $connexion)
{
	$req = "SELECT * FROM xx_upcurvit WHERE up_id = '$up_id'";
	$resu = mysql_query($req, $connexion);
	if ($li = mysql_fetch_object ($resu)) {
		$nomfich = $li->up_chemin ;
		if (unlink("IMG/cvdemandr/". $nomfich)) {
			$drop = "DELETE FROM xx_upcurvit WHERE up_id = $li->up_id ";
			$destru = mysql_query($drop, $connexion);
			if (!$destru) {
				echo "<br><B><font color=#ff0000>Erreur dans l'execution de la requ&ecirc;te.</font></B><br>";
			   echo "$drop <p></p>message de MySql : " . mysql_error($connexion); 
			   exit ;
			}
		} else echo "Probl&egrave;me avec fichier : " . $nomfich . "  <br> Veuillez contacter l'administrateur.";
	}
}

// Affiche le formulaire de saisie d'une fiche employeur 
function Aff_formemp($ligne, $emp_idauteur)
{
	echo "<form action=\"$PHP_SELF\" method=\"post\" name=\"modif\" id=\"modif\">";
	echo "<INPUT TYPE=\"hidden\" id=\"emp_id\" NAME=\"emp_id\" VALUE=\"" . $ligne->emp_id . "\">";
	echo "<INPUT TYPE=\"hidden\" id=\"emp_idauteur\" NAME=\"emp_idauteur\" VALUE=\"" . $emp_idauteur . "\">";
	echo "<INPUT TYPE=\"hidden\" NAME='OK' VALUE='1'>";
	echo "<ul><li><SPAN class=notes>" . _T('fiche_modif_le') ;
	$date = timestampeur($ligne->emp_datmodif);
	echo $date ;
	echo "</SPAN</li><li class='obligatoire'>";	 
	echo formInputText ('emp_poste', 40, $ligne, _T('poste'));
	echo "</li><li class='obligatoire'>";
	echo formInputText ('emp_durdates', 40, $ligne, _T('duree_dates'));
	echo "</li><li class='obligatoire'>";
	echo formInputText ('emp_lieu', 40, $ligne, _T('lieu'));
	echo "</li><li class='obligatoire'>";
	echo formInputText ('emp_nom', 40, $ligne, _T('nom_emp')) ;
/*	echo "</li><li>";
	echo "<label for=\"emp_adresse\">" . _T('adresse') . "</label>";
	echo "<textarea rows=\"3\" cols=\"40\" name=\"emp_adresse\" id=\"emp_adresse\">" . $ligne->emp_adresse . "</textarea>"; 
	echo "</li><li>";
	echo formInputText ('emp_cp', 7, $ligne, _T('code_postal')) ;
	echo "</li><li>";
	echo formInputText ('emp_ville', 40, $ligne, _T('commune'));
	echo "</li><li class='obligatoire'>";
	echo formInputText ('emp_tel', 14, $ligne, _T('telephone'));
	echo "</li><li>";
	echo formInputText ('emp_fax', 14, $ligne, _T('fax'));*/
	echo "</li><li class='obligatoire'>";
	echo formInputText ('emp_mel', 40, $ligne, _T('mel'));
	echo "</li><li>";
	echo formInputText ('emp_web', 40, $ligne, _T('web'));
	echo "</li><li class='obligatoire'>";
	echo "<label>" . _T('domaine_emp') . "</label>";
	echo "<ul><li>";
	echo formRadio ('emp_domaines', 'CVL', $ligne, _T('cvl'));
	echo "</li><li>";
   echo formRadio ('emp_domaines', 'Baby Sit.', $ligne, _T('babysit'));
//   echo "<input type='hidden'  name='emp_domaines'  id='Baby Sit.' value='Baby Sit.'  />" ;
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
	echo "</li><li>";
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
	echo "</li><li>";
	echo formInputText ('emp_remu', 40, $ligne, _T('remuneration'));
	echo "</li><li>";
	echo "<label for=\"emp_remq\">" . _T('remarques') . "</label>";
	echo "<textarea rows=\"3\" cols=\"40\" name=\"emp_remq\" id=\"emp_remq\">" . $ligne->emp_remq . "</textarea>"; 
	echo "</li><li class='obligatoire'>";
	echo "<label for=\"emp_contact\">" . _T('contact') . "<small>" . _T('exemple_contact') . "</small></label>";
	echo "<textarea rows=\"3\" cols=\"40\" name=\"emp_contact\" id=\"emp_contact\">" . $ligne->emp_contact . "</textarea>"; 
	echo "</li></ul>";
	boutonsValidation ('', $ligne->emp_id, 'emp_') ;
	echo "</form>"; 

}
?>
