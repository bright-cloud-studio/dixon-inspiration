<?php

/**
 * @copyright  Bright Cloud Studio
 * @author     Bright Cloud Studio
 * @package    Contao CE Chart
 * @license    LGPL-3.0+
 * @see        https://github.com/bright-cloud-studio/dixon-inspiration
 */

use Contao\DataContainer;
use Contao\Database;
use Contao\Input;
use Contao\System;

// Insert the newsType field into the palette at an appropriate spot.
$GLOBALS['TL_DCA']['tl_news']['palettes']['default'] = str_replace(
    '{title_legend}',
    '{type_legend},newsType;{title_legend}',
    $GLOBALS['TL_DCA']['tl_news']['palettes']['default']
);

// Append 'newsType' to the existing __selector__ array rather than overwriting it.
$GLOBALS['TL_DCA']['tl_news']['palettes']['__selector__'][] = 'newsType';

// Define subpalettes for the various newsType options
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['newsType_step'] = 'stepImage, stepDownload, stepVideo, stepDixonMaterials, stepOtherMaterials, stepObjectives';
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['newsType_activity'] = 'sizeMainImage';
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['newsType_default'] = '';

// Fields for the 'newsType' selection
$GLOBALS['TL_DCA']['tl_news']['fields']['newsType'] = array(
    'label'     => &$GLOBALS['TL_LANG']['tl_news']['newsType'],
    'inputType' => 'select',
    'options'   => array(
        'step' => 'Step-by-Step',
        'activity' => 'Activity',
        'default' => 'Default'
    ),
    'eval'      => array('submitOnChange' => true, 'mandatory' => true, 'tl_class' => 'w50'),
    'default'   => 'default',
    'sql'       => "varchar(255) NOT NULL default ''"
);

// Ensure newsType dropdown appears when editing old content
$GLOBALS['TL_DCA']['tl_news']['config']['onload_callback'][] = function (DataContainer $dc) {
    if (!$dc->id) {
        return;
    }

    $newsType = Database::getInstance()
        ->prepare("SELECT newsType FROM tl_news WHERE id=?")
        ->execute($dc->id)
        ->newsType;

    if (!empty($newsType)) {
        Input::setGet('act', 'edit');
    }
};

// Define fields for Step type
$GLOBALS['TL_DCA']['tl_news']['fields']['stepImage'] = array(
    'label'     => &$GLOBALS['TL_LANG']['MSC']['stepImage'],
    'exclude'   => true,
    'inputType' => 'fileTree',
    'eval'      => array(
        'fieldType' => 'radio',
        'filesOnly' => true,
        'extensions' => '%contao.image.valid_extensions%',
        'mandatory' => false // Set to true if it's required
    ),
    'sql'       => "binary(16) NULL"
);

$GLOBALS['TL_DCA']['tl_news']['fields']['stepDownload'] = array(
    'label'     => &$GLOBALS['TL_LANG']['MSC']['stepDownload'],
    'exclude'   => true,
    'inputType' => 'fileTree',
    'eval'      => array('fieldType' => 'radio', 'filesOnly' => true, 'extensions' => 'pdf'),
    'sql'       => "binary(16) NULL"
);

$GLOBALS['TL_DCA']['tl_news']['fields']['stepVideo'] = array(
    'label'     => &$GLOBALS['TL_LANG']['MSC']['stepVideo'],
    'exclude'   => true,
    'inputType' => 'textarea',
    'search'    => true,
    'eval'      => array('style' => 'height:60px', 'rte' => 'tinyMCE', 'tl_class' => 'clr long'),
    'sql'       => "mediumtext NULL"
);

$GLOBALS['TL_DCA']['tl_news']['fields']['stepDixonMaterials'] = array(
    'label'     => &$GLOBALS['TL_LANG']['MSC']['stepDixonMaterials'],
    'exclude'   => true,
    'inputType' => 'textarea',
    'search'    => true,
    'eval'      => array('style' => 'height:60px', 'rte' => 'tinyMCE', 'tl_class' => 'clr long'),
    'sql'       => "mediumtext NULL"
);

$GLOBALS['TL_DCA']['tl_news']['fields']['stepOtherMaterials'] = array(
    'label'     => &$GLOBALS['TL_LANG']['MSC']['stepOtherMaterials'],
    'exclude'   => true,
    'inputType' => 'textarea',
    'search'    => true,
    'eval'      => array('style' => 'height:60px', 'rte' => 'tinyMCE', 'tl_class' => 'clr long'),
    'sql'       => "mediumtext NULL"
);

$GLOBALS['TL_DCA']['tl_news']['fields']['stepObjectives'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['MSC']['stepObjectives'],
    'exclude'   => true,
    'inputType' => 'textarea',
    'search'    => true,
    'eval'      => array('style' => 'height:60px', 'rte' => 'tinyMCE', 'tl_class' => 'clr long'),
    'sql'       => "mediumtext NULL"
);

// Define fields for Activity type
$GLOBALS['TL_DCA']['tl_news']['fields']['sizeMainImage'] = array(
    'label'            => &$GLOBALS['TL_LANG']['MSC']['sizeMainImage'],
    'exclude'          => true,
    'inputType'        => 'imageSize',
    'reference'        => &$GLOBALS['TL_LANG']['MSC'],
    'eval'             => array(
        'rgxp' => 'natural',
        'includeBlankOption' => true,
        'nospace' => true,
        'helpwizard' => true,
        'tl_class' => 'w50'
    ),
    'options_callback' => static function () {
        return System::getContainer()->get('contao.image.sizes')->getOptionsForUser(BackendUser::getInstance());
    },
    'sql'              => "varchar(64) NOT NULL default ''"
);
