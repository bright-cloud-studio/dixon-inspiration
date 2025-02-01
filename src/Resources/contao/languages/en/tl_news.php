<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) Bright Cloud Studio
 *
 * @package    contao-ce-chart
 * @license    LGPL-3.0+
 * @link       https://github.com/bright-cloud-studio/contao-ce-chart
 */

/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_news']['newsType'] = ['News Type', 'Select the type of news.'];

/*
 * Note: The field "singleSRCMainImage" is defined in tl_news but uses the language key of tl_content.
 * In case you have not yet overridden it in your project, you can add it here.
 */
$GLOBALS['TL_LANG']['tl_content']['singleSRCMainImage'] = ['Main Image', 'Please select the main image for this news item.'];

/*
 * These labels are used by the subpalettes and additional fields for the "step" news type.
 */
$GLOBALS['TL_LANG']['MSC']['sizeMainImage'] = ['Main Image Size', 'Choose the dimensions for the main image.'];
$GLOBALS['TL_LANG']['MSC']['stepDownload']  = ['Step Download', 'Select a PDF file for download for this step.'];
$GLOBALS['TL_LANG']['MSC']['stepVideo']     = ['Step Video', 'Enter the video embed code or URL for this step.'];
$GLOBALS['TL_LANG']['MSC']['stepDixonMaterials'] = ['Step Dixon Materials', 'Enter any Dixon materials for this step.'];
$GLOBALS['TL_LANG']['MSC']['stepOtherMaterials'] = ['Step Other Materials', 'Enter any additional materials for this step.'];
