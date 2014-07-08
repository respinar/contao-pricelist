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
 * Namespace
 */
namespace Pricelist;


/**
 * Class ModulePriceList
 *
 * @copyright  2014
 * @author     Hamid Abbaszadeh
 * @package    Devtools
 */
class ModulePricelist extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_pricelist';

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['pricelist'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{

	    $this->strTemplate = $this->pricelist_template;

		$intList = $this->pricelist;

		$objList     = $this->Database->prepare("SELECT * FROM tl_pricelist WHERE id=?")->execute($intList);
		$objProducts = $this->Database->prepare("SELECT * FROM tl_pricelist_product WHERE published=1 AND pid=? ORDER BY sorting")->execute($intList);

		// Return if no Products were found
		if (!$objProducts->numRows)
		{
			$this->Template = new \FrontendTemplate('mod_pricelist_empty');
			$this->Template->empty = $GLOBALS['TL_LANG']['MSC']['emptyPriceList'];
			return;
		}

		$this->Template->description = $objList->description;

		$this->Template->spec = deserialize($objList->spec);

		$objJump = \PageModel::findByPk($objList->jumpTo);
		$strLink = $this->generateFrontendUrl($objJump->row());

		$arrProducts = array();

		$i = 0;

		// Generate Products
		while ($objProducts->next())
		{

			$i = $i + 1;

			$arrProducts[] = array
			(
				'no'           => $i,
				'title'        => $objProducts->title,
				'code'         => $objProducts->code,
				'price_retail' => $objProducts->price_retail ? $objProducts->price_retail.' '. $objList->currency : '<a href='.$strLink.'>تماس بگیرید</a>',
				'price_bulk'   => $objProducts->price_bulk ? $objProducts->price_bulk .' '. $objList->currency : '<a href='.$strLink.'>تماس بگیرید</a>',
				'unit'         => $objProducts->unit,
				'sale'         => $objProducts->sale,
				'stock'        => $objProducts->stock,
				'url'          => $objProducts->url,
				'spec'         => deserialize($objProducts->spec),
				'description'  => $objProducts->description,
			);
		}

		$this->Template->products = $arrProducts;

	}
}
