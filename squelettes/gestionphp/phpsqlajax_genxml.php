<?php
require ("design.php");
$connection = initier();

// Start XML file, create parent node
$doc = domxml_new_doc("1.0");
$node = $doc->create_element("markers");
$parnode = $doc->append_child($node);

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
$query = "SELECT * FROM ".TABLE_DEM." WHERE `dem_domaines` LIKE '%Baby%'";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  $node = $doc->create_element("marker");
  $newnode = $parnode->append_child($node);

  $newnode->setAttribute("idaut",$row['dem_idauteur']);
  $newnode->setAttribute("prenom",$row['dem_prenom']);
  $newnode->setAttribute("commune", $row['dem_ville']);  
  $newnode->setAttribute("lat", $row['dem_lat']);  
  $newnode->setAttribute("lng", $row['dem_long']);  
  $newnode->setAttribute("date", datefr($row['dem_datnais']));
}

$xmlfile = $doc->dump_mem();
echo $xmlfile;

?>
