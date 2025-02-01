<?php
/**
 * Contao Open Source CMS
 *
 * @package    contao-ce-chart
 * @license    LGPL-3.0+
 * @link       https://github.com/bright-cloud-studio/dixon-inspiration
 */

/**
 * Fields for tl_news
 */
$GLOBALS['TL_LANG']['tl_news']['newsType'] = ['News Type', 'Select the type of news entry.'];

/**
 * Optional: Option labels for "newsType".
 * Note: Although the options are directly defined in the DCA, you may use these values in your templates.
 */
$GLOBALS['TL_LANG']['tl_news']['newsType_options'] = [
    'step'     => 'Step-by-Step',
    'activity' => 'Activity',
    'article'  => 'Article',
];

/**
 * Main image field for the "step" news type.
 * This field is referenced via tl_content, so we define it here for consistency.
 */
$GLOBALS['TL_LANG']['tl_content']['singleSRCMainImage'] = ['Main Image', 'Please select the main image for this news item.'];

/**
 * Field for image size used in the "activity" news type.
 */
$GLOBALS['TL_LANG']['MSC']['sizeMainImage'] = ['Main Image Size', 'Choose the dimensions for the main image.'];

/**
 * Fields for the "step" news type
 */
$GLOBALS['TL_LANG']['MSC']['stepDownload'] = ['Step Download', 'Select a PDF file for download for this step.'];
$GLOBALS['TL_LANG']['MSC']['stepVideo'] = ['Step Video', 'Enter the video embed code or URL for this step.'];
$GLOBALS['TL_LANG']['MSC']['stepDixonMaterials'] = ['Step Dixon Materials', 'Enter Dixon materials information for this step.'];
$GLOBALS['TL_LANG']['MSC']['stepOtherMaterials'] = ['Step Other Materials', 'Enter additional materials for this step.'];
