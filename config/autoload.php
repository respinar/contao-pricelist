<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Pricelist
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Pricelist',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Models
	'Pricelist\PricelistPriceModel'   => 'system/modules/pricelist/models/PricelistPriceModel.php',
	'Pricelist\PricelistProductModel' => 'system/modules/pricelist/models/PricelistProductModel.php',
	'Pricelist\PricelistModel'        => 'system/modules/pricelist/models/PricelistModel.php',

	// Modules
	'Pricelist\ModulePricelist'       => 'system/modules/pricelist/modules/ModulePricelist.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_pricelist'       => 'system/modules/pricelist/templates/module',
	'mod_pricelist_empty' => 'system/modules/pricelist/templates/module',
));
