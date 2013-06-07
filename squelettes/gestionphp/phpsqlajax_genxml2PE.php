<?php
require ("design.php");
$connection = initier();

function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&#39;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
$xmlStr=str_replace('é','&eacute;',$htmlStr); 
$xmlStr=str_replace('è','&egrave;',$htmlStr); 
$xmlStr=str_replace('ê','&ecirc;',$htmlStr); 
$xmlStr=str_replace('ë','&euml;',$htmlStr); 
$xmlStr=str_replace('É','&Eacute;',$htmlStr); 
$xmlStr=str_replace('à','&agrave;',$htmlStr); 
$xmlStr=str_replace('â','&acirc;',$htmlStr); 
$xmlStr=str_replace('ä','&auml;',$htmlStr); 
$xmlStr=str_replace('î','&icirc;',$htmlStr); 
$xmlStr=str_replace('ï','&iuml;',$htmlStr); 
$xmlStr=str_replace('ç','&ccedil;',$htmlStr); 
return $xmlStr; 
} 

// Opens a connection to a mySQL server
//$connection=mysql_connect (localhost, $username, $password);
/*f (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active mySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}
*/
// Select all the rows in the markers table
$query = "SELECT * FROM ".TABLE_DEM." WHERE `dem_domaines` LIKE '%gardenf%'";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml; charset=UTF-8");
//header("Content-type: text/plain; charset=iso-8859-1");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  echo '<marker ';
  echo 'idaut="' . $row['dem_idauteur'] . '" ';
  echo 'prenom="' . parseToXML($row['dem_prenom']) . '" ';
  echo 'nom="' . parseToXML($row['dem_nom']) . '" ';
  echo 'cp="' . parseToXML($row['dem_cp']) . '" ';
  echo 'commune="' . parseToXML($row['dem_ville']) . '" ';
  echo 'lat="' . $row['dem_lat'] . '" ';
  echo 'lng="' . $row['dem_long'] . '" ';
//  echo 'date="' . datefr($row['dem_datnais']) . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>
