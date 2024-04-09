<?php

/**
 * @copyright  Bright Cliud Studio
 * @author     Bright Cloud Studio
 * @package    Contao CE Chart
 * @license    LGPL-3.0+
 * @see	       https://github.com/bright-cloud-studio/contao-ce-chart
 */




// Fields
$GLOBALS['TL_DCA']['tl_news']['fields']['test_1'] = array
(
    'label'            => &$GLOBALS['TL_LANG']['MSC']['test_1'],
    'exclude'          => true,
    'inputType'        => 'select',
    'search'           => true,
    'eval'             => array('chosen' => true, 'multiple' => true, 'tl_class' => 'clr'),
    'sql'              => "blob NULL"
);
