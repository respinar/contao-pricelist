<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package   PriceList
 * @author    Hamid Abbaszadeh
 * @license   GNU/LGPL
 * @copyright 2014
 */

/**
 * Add palettes to tl_module
 */

$GLOBALS['TL_DCA']['tl_module']['palettes']['pricelist']   = '{title_legend},name,headline,type;{pricelist},pricelist;{config_legend},pricelist_retail,pricelist_bulk,pricelist_sale,pricelist_stock;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['pricelist'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['pricelist'],
	'exclude'              => true,
	'inputType'            => 'radio',
	'foreignKey'           => 'tl_pricelist.title',
	'eval'                 => array('multiple'=>false, 'mandatory'=>true),
    'sql'                  => "blob NULL"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['pricelist_retail'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pricelist_retail'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['pricelist_bulk'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pricelist_retail'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['pricelist_sale'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pricelist_sale'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['pricelist_stock'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pricelist_stock'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

