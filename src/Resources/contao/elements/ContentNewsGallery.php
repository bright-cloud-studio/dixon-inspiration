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





    public function generate()
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request))
		{
			$objTemplate = new BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### ' . $GLOBALS['TL_LANG']['FMD']['faqpage'][0] . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = StringUtil::specialcharsUrl(System::getContainer()->get('router')->generate('contao_backend', array('do'=>'themes', 'table'=>'tl_module', 'act'=>'edit', 'id'=>$this->id)));
            $objTemplate->bing_bong = "noise!";
            
            
			return $objTemplate->parse();
		}
	}


    

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
