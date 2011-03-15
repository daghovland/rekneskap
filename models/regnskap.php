<?php
class Regnskap extends AppModel {

	var $name = 'Regnskap';
	var $useTable = 'regnskap';
	var $displayField = 'beskrivelse';


	var $hasMany = array('RegnskapGronneBonnerVerdiStartTotal', 'RegnskapLagertypeStart', 'RegnskapLagertypeSlutt', 'RegnskapGronneBonnerVerdiSluttTotal', 'RegnskapGronneBonnerVerdiStartSum',  'RegnskapGronneBonnerVerdiSluttSum', 'RegnskapBalanserVisning', 'RegnskapInntekter', 'RegnskapUtgifter', 'RegnskapGronneBonnerVerdiStartTotal', 'RegnskapGronneBonnerVerdiSluttTotal');
}
?>
