<?php
header("Content-type: " . $bilag['Bilag']['filtype']);
header("Content-length: " . $bilag['Bilag']['size']);
//header('Content-Disposition: inline; filename="' . $bilag['Bilag']['filnavn'] . '"'); 
header('Content-Disposition: attachment; filename="' . $bilag['Bilag']['filnavn'] . '"'); 
print $bilag['Bilag']['innhold']; 
die();
?>