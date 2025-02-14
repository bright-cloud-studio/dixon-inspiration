<?php

/**
 * @copyright  Bright Cloud Studio
 * @author     Bright Cloud Studio
 * @package    Contao CE Chart
 * @license    LGPL-3.0+
 * @see        https://github.com/bright-cloud-studio/dixon-inspiration
 */

use Contao\Config;
use Contao\DataContainer;
use Contao\Database;

// Get our default 'tl_content' DCA
$dc = &$GLOBALS['TL_DCA']['tl_content'];

// Update palettes: remove the multiColumnWizard field "step" and add our separate fields instead.
$GLOBALS['TL_DCA']['tl_content']['palettes']['activity'] = '{type_legend},type,headline;{activity_legend},activity_text,activity_picture,activity_download;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['step'] = '{type_legend},type,headline;{step_legend},step_picture,step_individual_video,step_text;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['default'] = '';

// Dynamically set the default content type based on newsType
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = function (DataContainer $dc) {
    if (!$dc->activeRecord || !$dc->activeRecord->pid) {
        return;
    }

    // Fetch the associated newsType from tl_news
    $news = Database::getInstance()
        ->prepare("SELECT newsType FROM tl_news WHERE id = (SELECT pid FROM tl_news_archive WHERE id = (SELECT pid FROM tl_content WHERE id=?))")
        ->execute($dc->id);

    if ($news->numRows > 0) {
        switch ($news->newsType) {
            case 'step':
                $GLOBALS['TL_DCA']['tl_content']['fields']['type']['default'] = 'step';
                break;
            case 'activity':
                $GLOBALS['TL_DCA']['tl_content']['fields']['type']['default'] = 'activity';
                break;
            default:
                $GLOBALS['TL_DCA']['tl_content']['fields']['type']['default'] = 'text';
                break;
        }
    }
};

// Modify the backend list view to display headlines
$GLOBALS['TL_DCA']['tl_content']['list']['label']['fields'] = array('headline', 'type');
$GLOBALS['TL_DCA']['tl_content']['list']['label']['format'] = '%s <span style="color:#999;padding-left:5px;">[%s]</span>';

// If headline is empty, set a fallback
$GLOBALS['TL_DCA']['tl_content']['list']['label']['label_callback'] = function ($row, $label, DataContainer $dc, $args) {
    $args[0] = !empty($row['headline']) ? $row['headline'] : '[No Headline]';
    return $args;
};

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
    'step_individual_video' => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_content']['step_individual_video'],
        'exclude'   => true,
        'inputType' => 'textarea',
        'search'    => true,
        'eval'      => array('style' => 'height:60px', 'rte' => 'tinyMCE', 'tl_class' => 'w100 clr long'),
        'sql'       => "mediumtext NULL"
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
