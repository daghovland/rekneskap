<?php
class AdresserHelper extends AppHelper {
	var $helpers = array('Form');

	function adresseSkjema($id, $legend, $label){
		$tekst = "<fieldset id =\"" . $id . "\">";
		$tekst .= "<legend>" . __($legend) . "</legend>"; 
		$tekst .= $this->Form->input($label . ".nummer");
		$tekst .= $this->Form->input($label . ".linje1");
		$tekst .= $this->Form->input($label . ".linje2");
		$tekst .= $this->Form->input($label . ".linje3");
		$tekst .= $this->Form->input($label . ".merkes");
		$tekst .= $this->Form->input($label . ".postnummer");
		$tekst .= $this->Form->input($label . ".poststad");
		$tekst .= "</fieldset>";
		return $tekst;
	}
	

}
?>

