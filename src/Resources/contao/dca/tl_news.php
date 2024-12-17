<?php

 /* Extend the tl_news palettes */
$GLOBALS['TL_DCA']['tl_news']['palettes']['default'] = str_replace(';{enclosure_legend:hide}', ';{reader_main_image_legend},addImageMainImage;{enclosure_legend:hide}', $GLOBALS['TL_DCA']['tl_news']['palettes']['default']);

$GLOBALS['TL_DCA']['tl_news']['palettes']['__selector__'] = array('source', 'addImageMainImage', 'addImage', 'addEnclosure', 'overwriteMeta');
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['addImageMainImage'] = 'singleSRCMainImage,sizeMainImage';




$GLOBALS['TL_DCA']['tl_news']['fields']['addImageMainImage'] = array
(
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('submitOnChange'=>true),
    'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_news']['fields']['singleSRCMainImage'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['singleSRCMainImage'],
    'exclude'                 => true,
    'inputType'               => 'fileTree',
    'eval'                    => array('fieldType'=>'radio', 'filesOnly'=>true, 'extensions'=>'%contao.image.valid_extensions%', 'mandatory'=>true),
    'sql'                     => "binary(16) NULL"
);
$GLOBALS['TL_DCA']['tl_news']['fields']['sizeMainImage'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['MSC']['sizeMainImage'],
    'exclude'                 => true,
    'inputType'               => 'imageSize',
    'reference'               => &$GLOBALS['TL_LANG']['MSC'],
    'eval'                    => array('rgxp'=>'natural', 'includeBlankOption'=>true, 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50'),
    'options_callback' => static function ()
    {
        return System::getContainer()->get('contao.image.sizes')->getOptionsForUser(BackendUser::getInstance());
    },
    'sql'                     => "varchar(64) NOT NULL default ''"
);
