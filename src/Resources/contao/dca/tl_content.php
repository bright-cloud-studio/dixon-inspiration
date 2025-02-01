<?php

/**
 * @copyright  Bright Cloud Studio
 * @author     Bright Cloud Studio
 * @package    Contao CE Chart
 * @license    LGPL-3.0+
 * @see        https://github.com/bright-cloud-studio/dixon-inspiration
 */

use Contao\Config;

// Get our default 'tl_content' DCA
$dc = &$GLOBALS['TL_DCA']['tl_content'];

// Update palettes: remove the multiColumnWizard field "step" and add our separate fields instead.
$GLOBALS['TL_DCA']['tl_content']['palettes']['activity'] = '{type_legend},type,headline;{activity_legend},activity_text,activity_picture,activity_download;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['step'] = '{type_legend},type,headline;{step_legend},step_picture,step_text;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

$arrFields = array(
    'activity_text' => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_content']['activity_text'],
        'exclude'   => true,
        'inputType' => 'textarea',
        'search'    => true,
        'eval'      => array('style' => 'height:60px', 'rte' => 'tinyMCE', 'tl_class' => 'clr long'),
        'sql'       => "mediumtext NULL"
    ),
    'activity_picture' => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_content']['activity_picture'],
        'inputType' => 'fileTree',
        'eval'      => array(
            'filesOnly'   => true,
            'extensions'  => Config::get('validImageTypes'),
            'fieldType'   => 'radio'
        ),
        'sql'       => "binary(16) NULL"
    ),
    'activity_download' => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_content']['activity_download'],
        'inputType' => 'fileTree',
        'eval'      => array(
            'filesOnly'   => true,
            'extensions'  => 'pdf',
            'fieldType'   => 'radio'
        ),
        'sql'       => "binary(16) NULL",
    ),
    // Removed the old multiColumnWizard field 'step'
    /*
    'step' => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_content']['activity'],
        'exclude'   => true,
        'inputType' => 'multiColumnWizard',
        'eval'      => array(
            'columnFields' => array(
                'step_picture' => array(
                    'label'     => &$GLOBALS['TL_LANG']['tl_content']['step_picture'],
                    'inputType' => 'fileTree',
                    'eval'      => array(
                        'filesOnly'  => true,
                        'extensions' => Config::get('validImageTypes'),
                        'fieldType'  => 'radio'
                    ),
                ),
                'step_text' => array(
                    'label'     => &$GLOBALS['TL_LANG']['tl_content']['step_text'],
                    'exclude'   => true,
                    'inputType' => 'textarea',
                    'search'    => true,
                    'eval'      => array('style' => 'height:60px', 'rte' => 'tinyMCE', 'tl_class' => 'clr long'),
                    'sql'       => "mediumtext NULL"
                ),
            ),
        ),
        'sql'       => 'blob NULL',
    ),
    */
    // New separate fields for step content:
    'step_picture' => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_content']['step_picture'],
        'exclude'   => true,
        'inputType' => 'fileTree',
        'eval'      => array(
            'filesOnly'  => true,
            'extensions' => Config::get('validImageTypes'),
            'fieldType'  => 'radio',
            'tl_class'   => 'w100'  // Makes the field full width in the backend
        ),
        'sql'       => "binary(16) NULL"
    ),
    'step_text' => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_content']['step_text'],
        'exclude'   => true,
        'inputType' => 'textarea',
        'search'    => true,
        'eval'      => array('style' => 'height:60px', 'rte' => 'tinyMCE', 'tl_class' => 'w100 clr long'),
        'sql'       => "mediumtext NULL"
    ),
);

$dc['fields'] = array_merge($dc['fields'], $arrFields);
