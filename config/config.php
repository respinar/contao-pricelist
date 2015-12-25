<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   PriceList
 * @author    Hamid Abbaszadeh
 * @license   LGPL-3+
 * @copyright (c) 2014-2015 Respinar
 */

/**
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD']['content'], 1, array
(
	'pricelist' => array
	(
		'tables' => array('tl_pricelist', 'tl_pricelist_item','tl_pricelist_price'),
		'icon'   => 'system/modules/pricelist/assets/icon.png'
	)
));


/**
 * Front end modules
 */

array_insert($GLOBALS['FE_MOD'], 2, array
(
	'miscellaneous' => array
	(
        'pricelist'    => 'ModulePricelist'
	)
));