<?php

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

namespace Bcs\Module;

use Contao\CoreBundle\Exception\PageNotFoundException;
use Contao\Model\Collection;

use Isotope\Module\ModuleNewsList;

/**
 * Front end module "news list".
 *
 * @property array  $news_archives
 * @property string $news_featured
 * @property string $news_order
 */
class ModuleInspirationNewsList extends \ModuleNewsList
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_newslist';


    public function __construct($objModule)
    {
        $objModule->news_template = "testy";
    }

    
	/**
	 * Display a wildcard in the back end
	 *
	 * @return string
	 */
	public function generate()
	{
		return parent::generate();
	}

	/**
	 * Generate the module
	 */
	protected function compile()
	{
		parent::construct();
	}

}
