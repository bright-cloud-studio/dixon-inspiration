<?php

    /**
    * @copyright  Bright Cliud Studio
    * @author     Bright Cloud Studio
    * @package    Contao Dixon Inspiration
    * @license    LGPL-3.0+
    * @see	       https://github.com/bright-cloud-studio/dixon-inspiration
    */
    
    
    $dc = &$GLOBALS['TL_DCA']['tl_news'];
    
    /* Extend the tl_news palettes */
    $GLOBALS['TL_DCA']['tl_news']['palettes']['default'] = str_replace(';{teaser_legend}', ';{inspiration_legend},test_field;{teaser_legend}', $GLOBALS['TL_DCA']['tl_news']['palettes']['default']);
    
    $arrFields = array(
        'inspiration_1'             => array(
        'label'                    => &$GLOBALS['TL_LANG']['tl_news']['inspiration_1'],
        'inputType'                => 'text',
        'eval'                     => array('tl_class'=>'w50'),
        'sql'                      => "mediumtext NULL"
    )
);

$dc['fields'] = array_merge($dc['fields'], $arrFields);
