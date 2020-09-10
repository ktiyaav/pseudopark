<?php
require("config.php");

// Start XML file, create parent node
$doc = new DOMDocument("1.0");
$node = $doc->createElement("markers");

$parnode = $doc->appendChild($node);
// Select all the rows in the markers table
$place = $_GET['place'];
$query = "SELECT * FROM parkdetails WHERE `parkArea` LIKE '$place%'";
$result = mysqli_query($con,$query);

if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  $node = $doc->createElement("marker");
  $newnode = $parnode->appendChild($node);

  $newnode->setAttribute("id", $row['parkId']);
  $newnode->setAttribute("name", $row['parkName']);
  $newnode->setAttribute("address", $row['parkAddress']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("type", 'bar');
}

$xmlfile = $doc->saveXML();
echo $xmlfile;

?>
