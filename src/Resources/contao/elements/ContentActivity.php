<?php

/**
 * @copyright  Bright Cliud Studio
 * @author     Bright Cloud Studio
 * @package    Contao CE Chart
 * @license    LGPL-3.0+
 * @see	       https://github.com/bright-cloud-studio/contao-ce-chart
 */

namespace Bcs\ChartBundle;

use Contao\ContentTable;

class ContentActivity extends ContentTable
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_activity';


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

class_alias(ContentLineChart::class, 'ContentLineChart');
