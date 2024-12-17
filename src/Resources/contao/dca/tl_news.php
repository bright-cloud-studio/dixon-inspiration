<?php

 /* Extend the tl_news palettes */
$GLOBALS['TL_DCA']['tl_news']['palettes']['default'] = str_replace(';{enclosure_legend:hide}', ';{type_legend},news_type;{enclosure_legend:hide}', $GLOBALS['TL_DCA']['tl_news']['palettes']['default']);

$GLOBALS['TL_DCA']['tl_news']['palettes']['__selector__'] = array('source', 'addImage', 'addEnclosure', 'overwriteMeta', 'news_type');
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['step_by_step'] = 'singleSRCMainImage';
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['activity'] = 'sizeMainImage';



$GLOBALS['TL_DCA']['tl_news']['fields']['news_type'] = array
(
    'label'                    => &$GLOBALS['TL_LANG']['tl_news']['news_type'],
    'inputType'                => 'select',
    'options'                  => array('step_by_step' => 'Step-by-Step', 'activity' => 'Activity', 'article' => 'Article'),
    'eval'                     => array('submitOnChange'=>true, 'mandatory'=>true, 'tl_class'=>'w50'),
    'default'                   => '',
    'sql'                       => "text default ''"
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
