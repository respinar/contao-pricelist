<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
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
	'Pricelist\PricelistModel'        => 'system/modules/pricelist/models/PricelistModel.php',
	'Pricelist\PricelistItemModel'    => 'system/modules/pricelist/models/PricelistItemModel.php',

	// Modules
	'Pricelist\ModulePricelist'       => 'system/modules/pricelist/modules/ModulePricelist.php',
	'Pricelist\ModulePricelistReader' => 'system/modules/pricelist/modules/ModulePricelistReader.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_pricelist' => 'system/modules/pricelist/templates/module',
));
