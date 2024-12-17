<?php

/**
 * @copyright  Bright Cliud Studio
 * @author     Bright Cloud Studio
 * @package    Contao CE Chart
 * @license    LGPL-3.0+
 * @see	       https://github.com/bright-cloud-studio/contao-ce-chart
 */

// Get our default 'tl_content' DCA
$dc = &$GLOBALS['TL_DCA']['tl_content'];
$GLOBALS['TL_DCA']['tl_content']['palettes']['activity'] = '{type_legend},type,headline;{activity_legend},activity_text;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['step'] = '{type_legend},type,headline;{step_legend},step_text, step_picture;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

$arrFields = array(
    'activity_text'             => array(
        'label'                    => &$GLOBALS['TL_LANG']['tl_content']['activity_text'],
        'inputType'                => 'text',
		'eval'                     => array('tl_class'=>'w50'),
		'sql'                      => "mediumtext NULL"
    ),
    'step'       => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_content']['activity'],
        'exclude'   => true,
        'inputType' => 'multiColumnWizard',
        'eval'      => [
            'columnFields' => [
                'step_text' => [
                    'label'     => &$GLOBALS['TL_LANG']['tl_content']['step_text'],
                    'exclude'   => true,
                    'inputType' => 'text',
                ],
                'step_picture' => [
                    'label'     => &$GLOBALS['TL_LANG']['tl_content']['step_picture'],
                    'exclude'   => true,
                    'inputType' => 'text',
                ],
            ],
        ],
        'sql'       => 'blob NULL',
    ),


);

$dc['fields'] = array_merge($dc['fields'], $arrFields);