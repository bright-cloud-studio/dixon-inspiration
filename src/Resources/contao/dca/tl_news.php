<?php

 /* Extend the tl_news palettes */
$GLOBALS['TL_DCA']['tl_news']['palettes']['default'] = str_replace('{title_legend}', '{type_legend},newsType;{title_legend}', $GLOBALS['TL_DCA']['tl_news']['palettes']['default']);

$GLOBALS['TL_DCA']['tl_news']['palettes']['__selector__'] = array('source', 'addImage', 'addEnclosure', 'overwriteMeta', 'newsType');
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['newsType_step'] = 'singleSRCMainImage';
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['newsType_activity'] = 'sizeMainImage';



$GLOBALS['TL_DCA']['tl_news']['fields']['newsType'] = array
(
    'label'                    => &$GLOBALS['TL_LANG']['tl_news']['newsType'],
    'inputType'                => 'select',
    'options'                  => array('step' => 'Step-by-Step', 'activity' => 'Activity', 'article' => 'Article'),
    'eval'                     => array('submitOnChange'=>true, 'mandatory'=>true, 'tl_class'=>'w50'),
    'default'                   => 'step',
    'sql'                       => "text default 'step'"
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
