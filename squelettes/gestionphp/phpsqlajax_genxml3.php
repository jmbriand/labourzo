<?php
require ("design.php");
$connection = initier();

// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node); 


// Select all the rows for Baby sitters
$query = "SELECT * FROM ".TABLE_DEM." WHERE `dem_domaines` LIKE '%Baby%'";
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
  $newnode->setAttribute("idaut",$row['dem_idauteur']);
  $newnode->setAttribute("prenom",$row['dem_prenom']);
  $newnode->setAttribute("commune", $row['dem_ville']);  
  $newnode->setAttribute("lat", $row['dem_lat']);  
  $newnode->setAttribute("lng", $row['dem_long']);  
  $newnode->setAttribute("date", datefr($row['dem_datnais']));
} 

echo $dom->saveXML();

?>
