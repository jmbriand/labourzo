<?php  

require ("design.php");
$connection = initier();

// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node); 

// Opens a connection to a MySQL server

/*$connection=mysql_connect (localhost, $username, $password);
if (!$connection) {  die('Not connected : ' . mysql_error());} 

// Set the active MySQL database

$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
} */

// Select all the rows in the markers table
$query = "SELECT `dem_idauteur`,`dem_nom`,`dem_prenom`,`dem_cp`,`dem_ville`,`dem_profpost`,`dem_diplomes`,`dem_lat`,`dem_long`,
					SUBSTRING((REPLACE(`dem_domaines`, 'anim,', '')),1,8) as type FROM ".TABLE_DEM ." WHERE `dem_domaines` LIKE '%gardenf%'";
$result = mysql_query($query);
if (!$result) {  
  die('Invalid query: ' . mysql_error());
} 

header("Content-type: text/xml"); 

// Iterate through the rows, adding XML nodes for each

while ($row = @mysql_fetch_assoc($result)){  
  // ADD TO XML DOCUMENT NODE  
  $node = $dom->createElement("marker");  
  $newnode = $parnode->appendChild($node);   
  $newnode->setAttribute("idaut", $row['dem_idauteur']);
  $newnode->setAttribute("prenom", $row['dem_prenom']);
  $newnode->setAttribute("nom", $row['dem_nom']);
  $newnode->setAttribute("cp", $row['dem_cp']);
  $newnode->setAttribute("commune", $row['dem_ville']);
  $newnode->setAttribute("diplomes", $row['dem_diplomes']);
  $newnode->setAttribute("profpost", $row['dem_profpost']);
  $newnode->setAttribute("lat", $row['dem_lat']);
  $newnode->setAttribute("lng", $row['dem_long']);
  $newnode->setAttribute("type", $row['type']);
} 

echo $dom->saveXML();

?>