<?PHP 
function initier()
{
   //CONNEXION BASE DE DONNEE
   require ("connect.php");
   require ("connexion.php");
   require ("outils.php");
   $connexion = connexion(SERVEUR, NOM, PASSE, BASE);
	 	return $connexion; 
}


?>