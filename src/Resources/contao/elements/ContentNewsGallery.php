<?php

/**
 * @copyright  Bright Cliud Studio
 * @author     Bright Cloud Studio
 * @package    Dixon Inspiration
 * @license    LGPL-3.0+
 * @see	       https://github.com/bright-cloud-studio/dixon-inspiration
 */

namespace Bcs\DixonBundle;

use Contao\ContentTable;

class ContentNewsGallery extends ContentTable
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_news_gallery';


	/**
	 * Generate the content element
	 */
	public function compile()
	{
        // Run the initial compile function just to be cool like that
        //parent::compile();
	}

    /**
	 * Initialize the object
	 *
	 * @param ContentModel $objElement
	 * @param string       $strColumn
	 */
	public function __construct($objElement, $strColumn='main')
	{
	    // Run the original construct function
        parent::__construct($objElement, $strColumn='main');  
	}  
  
}

class_alias(ContentNewsGallery::class, 'ContentNewsGallery');
