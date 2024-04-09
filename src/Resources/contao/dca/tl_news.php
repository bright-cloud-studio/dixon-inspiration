<?php

/**
 * @copyright  Bright Cliud Studio
 * @author     Bright Cloud Studio
 * @package    Contao CE Chart
 * @license    LGPL-3.0+
 * @see	       https://github.com/bright-cloud-studio/contao-ce-chart
 */




// Fields
$GLOBALS['TL_DCA']['tl_news']['fields'] += [
    'recaptcha_action' => [
        'label' => &$GLOBALS['TL_LANG']['tl_news']['recaptcha_action'],
        'exclude' => true,
        'inputType' => 'text',
        'eval' => ['tl_class' => 'w50', 'required' => true, 'rgxp' => 'recaptcha'],
        'sql' => "varchar(120) NOT NULL default ''",
    ],
];
