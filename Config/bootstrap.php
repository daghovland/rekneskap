<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as 
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Plugin' => array('/full/path/to/plugins/', '/next/full/path/to/plugins/'),
 *     'Model' =>  array('/full/path/to/models/', '/next/full/path/to/models/'),
 *     'View' => array('/full/path/to/views/', '/next/full/path/to/views/'),
 *     'Controller' => array('/full/path/to/controllers/', '/next/full/path/to/controllers/'),
 *     'Model/Datasource' => array('/full/path/to/datasources/', '/next/full/path/to/datasources/'),
 *     'Model/Behavior' => array('/full/path/to/behaviors/', '/next/full/path/to/behaviors/'),
 *     'Controller/Component' => array('/full/path/to/components/', '/next/full/path/to/components/'),
 *     'View/Helper' => array('/full/path/to/helpers/', '/next/full/path/to/helpers/'),
 *     'Vendor' => array('/full/path/to/vendors/', '/next/full/path/to/vendors/'),
 *     'Console/Command' => array('/full/path/to/shells/', '/next/full/path/to/shells/'),
 *     'locales' => array('/full/path/to/locale/', '/next/full/path/to/locale/')
 * ));
 *
 */

/**
 * Custom Inflector rules, can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */

Inflector::rules('plural', array('rules' => array('/^([^A]+)$/i' => '\1ar', '/^([^A]+)$/i' => '\1er'),
				 'irregular' => array('purring' => 'purringer', 'selger' => 'selgere', 'kaffitype' => 'kaffityper', 'postsending' => 'postsendingar', 'transportbetaling' => 'transportbetalingar', 'restbetaling' => 'restbetalingar', 'forskuddsbetaling' => 'forskuddsbetalingar', 'kaffiimport' => 'kaffiimportar', 'kaffibrenning' => 'kaffibrenningar', 'lagerverditype' => 'lagerverdityper', 'lagerverdikonto' => 'lagerverdikontoer', 'lagerverdiflytting' => 'lagerverdiflyttinger', 'kontobalanse' => 'kontobalanser', 'kunde' => 'kunder', 'faktura' => 'fakturaer', 'kaffelager' => 'kaffelagre', 'kaffepris' => 'kaffepriser', 'kaffeflytting' => 'kaffeflyttinger', 'pengeflytting' => 'pengeflyttinger', 'konto' => 'kontoer', 'selger' => 'selgere', 'rolle' => 'roller', 'lagertype' => 'lagertyper', 'fralagertype' => 'fralagertyper', 'tillagertype' => 'tillagertyper', 'fralager' => 'fralagre', 'tillager' => 'tillagre', 'kontotype' => 'kontotyper', 'adresse' => 'adresser', 'kaffetype' => 'kaffetyper', 'frakonto' => 'frakontoer', 'tilkonto' => 'tilkontoer', 'fakturaadresse' => 'fakturaadresser', 'leveringsadresse' => 'leveringsadresser', 'startsaldo' => 'startsaldoer', 'rabatt' => 'rabatter', 'varetelling' => 'varetellinger', 'beholdning' => 'beholdninger', 'kaffelagerbeholdning' => 'kaffelagerbeholdninger', 'pengetelling' => 'pengetellingar', 'InternFil' => 'InternFiler', 'intern_fil' => 'intern_filer', 'internFil' => 'internFiler', 'internfil' => 'internfiler', 'kontoutskrift' => 'kontoutskrifter', 'purrefaktura' => 'purrefakturaer', 'mvaklasse' => 'mvaklasser', 'rekning' => 'rekningar', 'leverandor' => 'leverandorar', 'tinging' => 'tingingar', 'innstilling' => 'innstillingar'),
				 'uninflected' => array('kaffesalgvekt', 'kaffesalg', 'kaffeflyttingvekt',  'Faktura_Ubetalt', 'bilag', 'regnskap', 'kaffiinnkjop')));

Inflector::rules('singular', array('rules' => array('/^(.+)er$/i' => '\1', '/^(.+)ar$/i' => '\1'),
                                'irregular' => array(),
                                'uninflected' => array('regnskap')));


/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
 *
 */


/** 
    Copied from guide to upgrade to cake 2.2
**/
// Enable the Dispatcher filters for plugin assets, and
// CacheHelper.
Configure::write('Dispatcher.filters', array(
    'AssetDispatcher',
    'CacheDispatcher'
));

// Add logging configuration.
CakeLog::config('debug', array(
    'engine' => 'FileLog',
    'types' => array('notice', 'info', 'debug'),
    'file' => 'debug',
));
CakeLog::config('error', array(
    'engine' => 'FileLog',
    'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
    'file' => 'error',
));
?>