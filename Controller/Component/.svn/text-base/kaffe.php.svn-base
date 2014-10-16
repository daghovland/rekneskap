<?php
class KaffeComponent extends Object {
  function dateToSql($dato){
    if(is_numeric($dato['year']) && is_numeric($dato['month']) && is_numeric($dato['day']))
	    return $dato['year'] . '-' . $dato['month'] . '-' . $dato['day'];
	else
		$this->cakeError("Ugyldig dato oppgitt");
  }

  function BankDatoSql($bankdato){
    $datoarr = explode(".", $bankdato);
    if(is_numeric($datoarr[0]) && is_numeric($datoarr[1]) && is_numeric($datoarr[2]))
	    return $datoarr[2] . '-' . $datoarr[1] . '-' . $datoarr[0];
    else 
	$this->cakeError("Ugyldig dato oppgitt");
  }

  }
?>
