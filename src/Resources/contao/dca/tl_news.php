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

// TEST - Removing default palette fields so we only have our custom ones and publish
$GLOBALS['TL_DCA']['tl_news']['palettes']['news_gallery'] = '{type_legend},newsType;{teaser_legend},teaser;{date_legend},date,time;{publish_legend},published,start,stop';


// Define subpalettes for the various newsType options
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['newsType_step'] = 'stepImage, stepDownload, stepVideo, stepDixonMaterials, stepOtherMaterials, stepObjectives';
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['newsType_news_gallery'] = '{gallery_legend},galleryImage, headline;';
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['newsType_activity'] = 'sizeMainImage';
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['newsType_default'] = '';

// Fields for the 'newsType' selection
$GLOBALS['TL_DCA']['tl_news']['fields']['newsType'] = array(
    'label'     => &$GLOBALS['TL_LANG']['tl_news']['newsType'],
    'inputType' => 'select',
    'options'   => array(
        'step' => 'Step-by-Step',
        'news_gallery' => 'Gallery',
        'activity' => 'Activity',
        'default' => 'Default'
    ),
    'eval'      => array('submitOnChange' => true, 'mandatory' => true, 'tl_class' => 'w50'),
    'default'   => 'default',
    'sql'       => "varchar(255) NULL default 'default'"
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

    //if (!empty($newsType)) {
    //    Input::setGet('act', 'edit');
    //}
};


// News Gallery
$GLOBALS['TL_DCA']['tl_news']['fields']['galleryImage'] = array(
    'label'     => &$GLOBALS['TL_LANG']['MSC']['galleryImage'],
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

// Override default listNewsArticles function so we can display information in the backend for our custom news type
$GLOBALS['TL_DCA']['tl_news']['list']['sorting']['child_record_callback'] = array('tl_news_inspiration', 'listNewsArticles');

class tl_news_inspiration extends tl_news
{
    public function listNewsArticles($arrRow)
    {
        if($arrRow['newsType'] == 'news_gallery') {
            return '<div class="tl_content_left">' . $arrRow['galleryHeadline'] . ' <span style="color:#b3b3b3;padding-left:3px">[' . Date::parse(Config::get('datimFormat'), $arrRow['date']) . ']</span></div>';
        } else {
            return '<div class="tl_content_left">' . $arrRow['headline'] . ' <span style="color:#b3b3b3;padding-left:3px">[' . Date::parse(Config::get('datimFormat'), $arrRow['date']) . ']</span></div>';
        }
    }
}
