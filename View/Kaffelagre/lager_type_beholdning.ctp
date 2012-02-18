<?php
echo $beholdning;
if(is_numeric($beholdning)){	
  for($i = 0; $i <= $beholdning; $i++)
    echo '<option value="' . $i . '">' . $i . '</option>';
}
?>
