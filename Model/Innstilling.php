<?php
App::uses('AppModel', 'Model');
/**
 * Innstilling Model
 *
 */
class Innstilling extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'namn';

	public $belongsTo = array('UbetaltKaffirekning'=> array('className' => 'Konto',
								'foreignKey' => 'ubetalte_kafferegninger'),
				  'Fraktutgift'=> array('className' => 'Konto',
								'foreignKey' => 'kaffesalg_fraktutgift'),
				  'StandardLager' => array('className' => 'Kaffelager',
							   'foreignKey' => 'standard_lager'),
				  'NettsalLager' => array('className' => 'Kaffelager',
							   'foreignKey' => 'nettsal_lager'),
				  );
}
