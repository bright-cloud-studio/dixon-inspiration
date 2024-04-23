<?php

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

namespace Bcs\Module;

use Bcs\Module\ModuleInspirationNews;
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
class ModuleInspirationNewsList extends ModuleInspirationNews
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_newslist';


    public function __construct($objModule)
    {
        parent::construct();
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
	protected function __compile($objModule)
	{
		parent::compile();
	}

}
