<?php

/**
 * @copyright  Bright Cliud Studio
 * @author     Bright Cloud Studio
 * @package    Contao CE Chart
 * @license    LGPL-3.0+
 * @see	       https://github.com/bright-cloud-studio/contao-ce-chart
 */

// Get our default 'tl_news' DCA
$dc = &$GLOBALS['TL_DCA']['tl_news'];

$arrFields = array(
    'bar_border_width'        => array(
        'label'                    => &$GLOBALS['TL_LANG']['tl_news']['bar_border_width'],
        'inputType'                => 'text',
		'eval'                     => array('tl_class'=>'w50'),
		'sql'                      => "varchar(12) NOT NULL default '0'"
    ),
);

$dc['fields'] = array_merge($dc['fields'], $arrFields);
