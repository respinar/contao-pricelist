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

$GLOBALS['TL_DCA']['tl_module']['palettes']['pricelist']   = '{title_legend},name,headline,type;{pricelist},pricelist;{template_legend:hide},pricelist_template,tableClass;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

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
$GLOBALS['TL_DCA']['tl_module']['fields']['pricelist_template'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['pricelist_template'],
	'exclude'              => true,
	'inputType'            => 'select',
	'options_callback'     => array('tl_pricelist_template', 'getPriceListTemplates'),
	'eval'				   => array('tl_class'=>'w50'),
	'sql'				   => "varchar(64) NOT NULL default ''",
);
$GLOBALS['TL_DCA']['tl_module']['fields']['tableClass'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['tableClass'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>128, 'tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

/**
 * Class tl_pricelist
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Hamid Abbaszadeh 2014
 * @author     Hamid Abbaszadeh <http://respinar.com>
 * @package    PriceList
 */
class tl_pricelist_template extends Backend
{

	/**
	 * Return all links templates as array
	 * @param object
	 * @return array
	 */
	public function getPriceListTemplates(DataContainer $dc)
	{
		return $this->getTemplateGroup('mod_pricelist', $dc->activeRecord->pid);
	}
}

