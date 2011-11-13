<?php
header("Content-type: " . $bilag['PengeflyttingBilag']['filtype']);
header("Content-length: " . $bilag['PengeflyttingBilag']['size']);
header('Content-Disposition: inline; filename="' . $bilag['PengeflyttingBilag']['filnavn'] . '"'); 
header('Content-Disposition: attachment; filename="' . $bilag['PengeflyttingBilag']['filnavn'] . '"'); 
echo $bilag['PengeflyttingBilag']['innhold']; 
?>
