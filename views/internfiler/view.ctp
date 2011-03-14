<?php
header("Content-type: " . $internfil['Internfil']['filtype']);
header("Content-length: " . $internfil['Internfil']['size']);
header('Content-Disposition: inline; filename="' . $internfil['Internfil']['filnavn'] . '"'); 
header('Content-Disposition: attachment; filename="' . $internfil['Internfil']['filnavn'] . '"'); 
echo $internfil['Internfil']['innhold']; 
?>
