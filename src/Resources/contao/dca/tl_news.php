<?php

  /**
  * @copyright  Bright Cliud Studio
  * @author     Bright Cloud Studio
  * @package    Contao Dixon Inspiration
  * @license    LGPL-3.0+
  * @see	       https://github.com/bright-cloud-studio/dixon-inspiration
  */
  
  /* Extend the tl_news palettes */
  $GLOBALS['TL_DCA']['tl_news']['palettes']['default'] = str_replace(';{teaser_legend}', ';{inspiration_legend},test_field;{teaser_legend}', $GLOBALS['TL_DCA']['tl_news']['palettes']['default']);
  
  $GLOBALS['TL_DCA']['tl_news']['fields']['test_field'] = array
  (
    'label'                   => &$GLOBALS['TL_LANG']['tl_news']['test_field'],
    'inputType'               => 'text',
    'default'                 => '',
    'search'                  => true,
    'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
  );
