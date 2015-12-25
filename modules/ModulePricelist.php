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
        
        // No pricelist available
		if (empty($this->pricelist))
		{
			return '';
		}

	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{

	    $this->strTemplate = $this->pricelist_template;

		$intList = $this->pricelist;

		$objPricelist = $this->Database->prepare("SELECT * FROM tl_pricelist WHERE id=?")->execute($intList);
		$objItems     = $this->Database->prepare("SELECT * FROM tl_pricelist_item WHERE published=1 AND pid=? ORDER BY sorting")->execute($intList);

		// Return if no Products were found
		if (!$objItems->numRows)
		{
			$this->Template->empty = $GLOBALS['TL_LANG']['MSC']['emptyPriceList'];
			return;
		}

		$this->Template->description = $objPricelist->description;

		$objJump = \PageModel::findByPk($objPricelist->jumpTo);
		$strLink = $this->generateFrontendUrl($objJump->row());

		$arrItems = array();

		$i = 0;

		// Generate Products
		while ($objItems->next())
		{

			$i = $i + 1;

			$arrItems[] = array
			(
				'no'           => $i,
				'title'        => $objItems->title,
				'sku'          => $objItems->sku,
				'price'        => $objItems->price ? $objItems->price .' '. $objPricelist->currency : '<a href='.$strLink.'>تماس بگیرید</a>',
				'unit'         => $objItems->unit,
				'sale'         => $objItems->sale,
				'stock'        => $objItems->stock,
				'url'          => $objItems->url,
				'description'  => $objItems->description,
			);
		}

		$this->Template->items = $arrItems;

	}
}
