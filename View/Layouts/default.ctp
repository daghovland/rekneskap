<?php
/* SVN FILE: $Id: default.ctp 7945 2008-12-19 02:16:01Z gwoo $ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision: 7945 $
 * @modifiedby    $LastChangedBy: gwoo $
 * @lastmodified  $Date: 2008-12-18 18:16:01 -0800 (Thu, 18 Dec 2008) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php echo $this->Html->charset(); ?>
    <title>
      <?php echo __('Zapatistgruppa i Bergen:'); ?>
      <?php echo $title_for_layout; ?>
    </title>
    <?php
      echo $this->Html->meta('icon');
      echo $this->Html->script('prototype');
      echo $this->Html->script('scriptaculous');
      echo $this->Html->script('kaffeflyttinger');
      echo $this->Html->css('regnskap');
      echo $scripts_for_layout;
    ?>
  </head>
  <body>
    <div id="container">
      <div id="header">
	<h1>
	  <?php 
	    echo $this->Html->image("Zapatista-banner-mh.jpg");
	    echo "<br />";
	    echo $this->Html->link("Zapatistgruppa i Bergen", 'http://www.zapatista.no');
	    if($this->Session->check('Auth.Selger')){
	      $selgerInfo = $this->Session->read('Auth.Selger');
	      echo " - " . $selgerInfo['navn']; 
	    } else {
	      echo " Du er ikkje logga inn!";
	    }
	  ?>
	</h1>
	<select onChange = "window.location = this.options[this.selectedIndex].value">
	  <option>Vanlege handlingar:</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'kaffesalg','action' => 'add')); ?>">Registrer kaffisal</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'kaffeflyttinger', 'action' => 'hent_kaffi')); ?>">Registrer kaffiflytting</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'kaffeflyttinger', 'action' => 'svinn')); ?>">Register svinn</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'selgere', 'action' => 'logout')); ?>">Logg av</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'varetellinger', 'action' => 'add')); ?>">Ny varetelling</option>
	</select>
	
	<select onChange = "window.location = this.options[this.selectedIndex].value">
	  <option>Oversikt og lister:</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'selgere', 'action' => 'oversikt')); ?>">Kaffi-oversikt</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'regnskap', 'action' => 'view', 15)); ?>">Pengeoversikt</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'regnskap', 'action' => 'index')); ?>">Rekneskapar</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'sal_per_maanad')); ?>">Salsoversikt</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'kaffiimportar')); ?>">Kaffiimportar</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'kaffibrenningar')); ?>">Kaffiibrenningar</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'kunder', 'action' => 'index')); ?>">Kundeoversikt</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'varetellinger', 'action' => 'index')); ?>">Varetellingar</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'internfiler', 'action' => 'index')); ?>">Internt fillager</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'lagertyper', 'action' => 'view', 4)); ?>">Syn svinn</option>
	</select>
	
	<select onChange = "window.location = this.options[this.selectedIndex].value">
	  <option>Rekneskaps-val:</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'pengetellingar')); ?>">Pengetellinger</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'pengeflyttinger', 'action' => 'index', '/page:1/sort:dato/direction:desc')); ?>">Pengeflyttinger</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'budsjettPengeflyttinger')); ?>">Budsjett-posteringar</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'fakturaer', 'action' => 'ubetalte')); ?>">Ubetalte fakturaer</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'fakturaer', 'action' => 'index')); ?>">Alle fakturaer</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'kaffesalg', 'action' => 'index')); ?>">Alle kaffesalg</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'kaffelagre', 'action' => 'index')); ?>">Alle kaffelagre</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'kaffeflyttinger', 'action' => 'index')); ?>">Alle kaffeflyttinger</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'kontoer', 'action' => 'index')); ?>">Rekneskapskontoer</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'kaffepriser', 'action' => 'index')); ?>">Alle kaffityper</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'lagerverdikontoer', 'action' => 'index')); ?>">Lagerverdikontoer</option>
	  <option value="<?php echo $this->Html->url(array('controller' => 'rabatter', 'action' => 'index')); ?>">Alle rabatter</option>
	</select>
	<br />
	<?php echo $this->Html->link(__('Registrer kaffisal', true), array('controller' => 'kaffesalg', 'action' => 'add')); ?>
	<?php echo $this->Html->link(__('Registrer kaffiflytting', true), array('controller' => 'kaffeflyttinger', 'action' => 'hent_kaffi')); ?>
	<?php echo $this->Html->link(__('Registrer svinn', true), array('controller' => 'kaffeflyttinger', 'action' => 'svinn')); ?>
	<?php echo $this->Html->link(__('Logg av', true), '/selgere/logout'); ?>
      </div>
      <div id="content">
	<p>Last ned sertifikat frå <a href="https://www.cacert.org/index.php?id=3">cacert.org</a>. 
	<?php if(isset($_SERVER['HTTPS']) &&$_SERVER['HTTPS'] != 'on'):?>
	Då kan du bruke den <a href="https://regnskap.zapatista.no">sikre tilkoplinga</a>.
	<?php endif; ?>
	</p>
      </div>
      <div id="content">
	
	
	<?php $this->Session->flash(); ?>
	<?php $this->Session->flash('auth'); ?>
	
	
	<?php echo $content_for_layout; ?>
	
      </div>
      <div id="footer">
      </div>
    </div>
    <?php //echo $cakeDebug; ?>
    <?php echo $this->Js->writeBuffer(array('safe' => true)); ?>
  </body>
</html>
