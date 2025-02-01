<?php

/* Extend the tl_news palettes */
$GLOBALS['TL_DCA']['tl_news']['palettes']['default'] = str_replace('{title_legend}', '{type_legend},newsType;{title_legend}', $GLOBALS['TL_DCA']['tl_news']['palettes']['default']);

$GLOBALS['TL_DCA']['tl_news']['palettes']['__selector__'] = array('source', 'addImage', 'addEnclosure', 'overwriteMeta', 'newsType');

// Define subpalettes for the various newsType options.
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['newsType_step'] = 'singleSRCMainImage, stepDownload, stepVideo, stepDixonMaterials, stepOtherMaterials';
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['newsType_activity'] = 'sizeMainImage';
// Blank subpalette for "default" – no extra fields are added when "default" is selected.
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['newsType_default'] = '';

/* Fields for the 'newsType' selection */
$GLOBALS['TL_DCA']['tl_news']['fields']['newsType'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_news']['newsType'],
    'inputType' => 'select',
    'options'   => array('step' => 'Step-by-Step', 'activity' => 'Activity', 'default' => 'Default'),
    'eval'      => array('submitOnChange' => true, 'mandatory' => true, 'tl_class' => 'w50'),
    'default'   => 'default', // Set default newsType to "default"
    'sql'       => "text default 'default'"
);

/* Define the fields for the 'step' newsType */
$GLOBALS['TL_DCA']['tl_news']['fields']['singleSRCMainImage'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['singleSRCMainImage'],
    'exclude'   => true,
    'inputType' => 'fileTree',
    'eval'      => array('fieldType' => 'radio', 'filesOnly' => true, 'extensions' => '%contao.image.valid_extensions%', 'mandatory' => true),
    'sql'       => "binary(16) NULL"
);

$GLOBALS['TL_DCA']['tl_news']['fields']['sizeMainImage'] = array
(
    'label'            => &$GLOBALS['TL_LANG']['MSC']['sizeMainImage'],
    'exclude'          => true,
    'inputType'        => 'imageSize',
    'reference'        => &$GLOBALS['TL_LANG']['MSC'],
    'eval'             => array('rgxp' => 'natural', 'includeBlankOption' => true, 'nospace' => true, 'helpwizard' => true, 'tl_class' => 'w50'),
    'options_callback' => static function ()
    {
        return System::getContainer()->get('contao.image.sizes')->getOptionsForUser(BackendUser::getInstance());
    },
    'sql'              => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_news']['fields']['stepDownload'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['MSC']['stepDownload'],
    'exclude'   => true,
    'inputType' => 'fileTree',
    'eval'      => array('fieldType' => 'radio', 'filesOnly' => true, 'extensions' => 'pdf'),
    'sql'       => "binary(16) NULL"
);

$GLOBALS['TL_DCA']['tl_news']['fields']['stepVideo'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['MSC']['stepVideo'],
    'exclude'   => true,
    'inputType' => 'textarea',
    'search'    => true,
    'eval'      => array('style' => 'height:60px', 'rte' => 'tinyMCE', 'tl_class' => 'clr long'),
    'sql'       => "mediumtext NULL"
);

$GLOBALS['TL_DCA']['tl_news']['fields']['stepDixonMaterials'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['MSC']['stepDixonMaterials'],
    'exclude'   => true,
    'inputType' => 'textarea',
    'search'    => true,
    'eval'      => array('style' => 'height:60px', 'rte' => 'tinyMCE', 'tl_class' => 'clr long'),
    'sql'       => "mediumtext NULL"
);

$GLOBALS['TL_DCA']['tl_news']['fields']['stepOtherMaterials'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['MSC']['stepOtherMaterials'],
    'exclude'   => true,
    'inputType' => 'textarea',
    'search'    => true,
    'eval'      => array('style' => 'height:60px', 'rte' => 'tinyMCE', 'tl_class' => 'clr long'),
    'sql'       => "mediumtext NULL"
);
