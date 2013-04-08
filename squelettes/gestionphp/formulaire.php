 <?php 
function formSelectTitre ($titre, $ligne)
	{
	echo "
	<select name=\"$titre\">
			  		<option value=\"0\" ";
					 	if ($ligne->$titre < 2) {echo "SELECTED";}; echo ">Titre</option>
			  		<option value=\"2\" " ;
					 	if ($ligne->$titre == 2){echo "SELECTED";}; echo ">Mr</option>
					<option value=\"3\" " ;
						if ($ligne->$titre == 3){echo "SELECTED";}; echo ">Mme</option>
					<option value=\"4\" " ; 
						if ($ligne->$titre == 4){echo "SELECTED";}; echo ">Mlle</option>
	</select> " ;
	}

function formselect ($champ, $valeur, $taille, $liste, $multiple='')
	{
	$s = "<select name=\"$champ\" size=$taille $multiple>\n";
	$i = 0 ;
	while ($liste[$i])
		{
		if (ereg ($liste[$i], $valeur) ) $s .= "<OPTION VALUE='$liste[$i]' SELECTED>" .
				"$liste[$i]</OPTION>\n";
		else $s .= "<OPTION VALUE='$liste[$i]'>$liste[$i]</OPTION>\n";
		$i ++ ;
		}
	echo $s . "</SELECT>\n" ;					
	}
	
function formInputText ($a_champ, $taille, $ligne, $label)// si date =>  dd-mm-yy 
	{
	$value = $ligne->$a_champ ;
	if ( ereg ("^[0-9]{4}-[0-9]{2}-[0-9]{2}$", $value) ) $value = datefr ($value) ; 
	echo "<label for=\"$a_champ\">$label</label>" ;
	echo "<input type=\"text\" name=\"$a_champ\"  id=\"$a_champ\"  size=\"$taille\" maxlength=\"$taille\" 
				value =\"$value\" >" ;
	}

function formCheckbox ($a_champ, $value, $ligne, $label)
	{
	$valeur = $ligne->$a_champ ;	
	echo "<input type=\"CHECKBOX\"  name=\"$a_champ\" id='$value' value=\"$value\" ";
	if ($valeur==$value)  {echo "checked";};
	echo " ><label for='$value'>$label</label> &nbsp;\n  ";
	}
	
function formCheckboxEnum ($champ, $liste, $ligne, $labelsdiplm, $direction='v')
	{
	$valeur = $ligne->$champ ;
	$tabvaleur = explode (',', $valeur) ;
	$i = 0 ;
	while ($liste[$i]) 
	{
		if (ereg($liste[$i], $valeur) )
		$s .= "<li><input type='CHECKBOX'  name='$champ"."[$i]' id='$champ"."[$i]' value='$liste[$i]' CHECKED>&nbsp;<label for='$champ"."[$i]'>$labelsdiplm[$i]</label></li>";
		else $s .= "<li><input type='CHECKBOX'  name='$champ"."[$i]' id='$champ"."[$i]' value='$liste[$i]'>&nbsp;<label for='$champ"."[$i]'>$labelsdiplm[$i]</label></li>";
//		if ($direction == 'v') $s .= '<br>';
		$i++ ;
	}
	echo $s ;
	}

function formRadio ($a_champ, $value, $ligne, $label) 
	{	
	$valeur = $ligne->$a_champ ;	
	echo "<input type=\"radio\"  name=\"$a_champ\"  id=\"$value\" value=\"$value\" ";
	if ($valeur == $value) {echo "checked";}; 
	echo " />&nbsp;" ;
	echo "<label for=\"$value\">$label</label>" ;
	}

// BOITE DEROULANTE BASE DE DONNEE
function formselectBD($champ,$value, $resultat, $listevaleur, $listelibelle)
	{
	echo    "<select name=\"$champ\"  id=\"$champ\" size=\"1\"> \n".
            "<option value=\" \" selected=\"selected\"> ... choisir ...</option> \n" ;
 
	while ($liste = mysql_fetch_object ($resultat))						      
	            	{echo '<option value="'.$liste->$listevaleur.'"' ;
	            	if ($value==$liste->$listevaleur)	echo "selected=\"selected\" ";	
					echo '>'.$liste->$listelibelle." </option> \n";};

    echo "</select>";
	}

function verifInsee($c_insee)
{	
	  echo "&nbsp; <a href=\"#\"  onclick=\"javascript:insee();\" class=\"notes\">
		 v&eacute;rifier : </a>\n";
		echo "
			<IFRAME src=\"verifInsee.php?insee=$c_insee\"
				width=\"200\" height=\"15\"  scrolling=\"auto\" frameborder=\"1\" 
				style=\"background-color: #eee;\"	marginheight=\"0\" marginwidth=\"0\" 
				framespacing=\"0\" name=\"iframe\"> \n
			</IFRAME>";
}			   	
// MENU NAVIGATION haut DE FORMULAIRE
function formNavHaut ($cle, $id, $titre)	//nom de la cl&eacute;, valeur, titre formulaire
{  
	$p=$id-1 ; $s=$id+1 ;
	$c .= " 
	<table summary='aller' width=700  border=0 bgcolor=#dddddd>\n"
	  ."<tr><td class=titre>$titre N&deg; $id</td> \n"
	  ."<td align='right' class=notes><form action=' $PHP_SELF ' method='post'>\n "
	    ." aller &agrave; la fiche N&deg; <input type='text' name='$cle' size='3'>\n "
	    ."<input type='submit' value='aller'>&nbsp; &nbsp; \n "
	    ."<a href='$PHP_SELF?$cle=$p'> pr&eacute;c&eacute;dente </a>| \n"
	    ."<a href='$PHP_SELF?$cle=$s'> suivante </a>| \n"
	  	."</form>\n"
	  ."</td></tr>\n"
	."</table>\n\n" ;
	echo $c ;
}


// BOUTONS DE GESTION DE SAISIE modifier - d&eacute;truire - annuller ...
function boutonsValidation ($scriptanul, $id, $tab)
{
			echo "<p class='boutons'>" ;
			if ($id > '') { echo "<input type=SUBMIT name='modifier' value='" . _T('modifier') . "'> \n";}
			echo "<input type=reset value='" . _T('annuler') . "' onClick=\"javascript:window.location='$scriptanul' \"> \n" ;
			if ($id > '') { echo "<input type=SUBMIT name='detruire' value='" . _T('detruire') . "' 
								onClick=\"javascript:return confirm('" . _T('confirm_suppr') . "') \"> \n ";};			
			if ($id == '' || $tab == 'emp_') { echo "<input type=SUBMIT name='inserer' value='" . _T('ajouter') . "'> \n ";};	
			echo "</p>" ;
			
}

// ALLER A LA FICHE N&deg; - PRECEDENT - SUIVANT
function aller($id, $nomIndex)
{
	$p=$id-1 ; $s=$id+1 ;
	echo 
	"<form action='$PHP_SELF' method='post'> \n "
	."aller &agrave; la fiche N&deg; <input type='text' name='$nomIndex' size='3'> \n"
	."<input type='submit' value='aller' class=fnav> &nbsp; &nbsp;|  \n"
	."<a href='$PHP_SELF?$nomIndex=$p'> pr&eacute;c&eacute;dente </a>| \n"
	."<a href='$PHP_SELF?$nomIndex=$s'> suivante </a>| \n"
	."</form>" ;
}
	
 ?>