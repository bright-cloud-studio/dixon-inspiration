<?php


$GLOBALS['TL_DCA']['tl_news']['palettes']['__selector__'][] = 'post_type';
$GLOBALS['TL_DCA']['tl_news']['palettes']['inspiration'] = str_replace('{title_legend}', ';{post_type_legend},post_type;{title_legend}', $GLOBALS['TL_DCA']['tl_news']['palettes']['default']);
$GLOBALS['TL_DCA']['tl_news']['palettes']['inspiration'] = str_replace(';{teaser_legend}', ';{inspiration_legend},inspiration_steps;{teaser_legend}', $GLOBALS['TL_DCA']['tl_news']['palettes']['default']);

/* Extend the tl_news palettes */
$GLOBALS['TL_DCA']['tl_news']['palettes']['default'] = str_replace('{title_legend}', ';{post_type_legend},post_type;{title_legend}', $GLOBALS['TL_DCA']['tl_news']['palettes']['default']);

/* Add new field */
$GLOBALS['TL_DCA']['tl_news']['fields']['inspiration_steps'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_news']['inspiration_steps'],
    'exclude'   => true,
    'inputType' => 'multiColumnWizard',
    'eval'      => [
        'columnFields' => [
            'insp_headline' => [
                'label'     => &$GLOBALS['TL_LANG']['tl_news']['insp_headline'],
                'exclude'   => true,
                'inputType' => 'text',
                'eval'      => [ 'style' => 'max-width:100%', 'columnPos' => 'group_1' ],
            ],
            'insp_text' => [
                'label'     => &$GLOBALS['TL_LANG']['tl_news']['insp_text'],
                'exclude'   => true,
                'inputType' => 'textarea',
                'eval'      => array('tl_class'=>'clr', 'rte'=>'tinyMCE', 'style' => 'max-width:100%', 'columnPos' => 'group_1'),
            ],
            'insp_image' => [
                'label'     => &$GLOBALS['TL_LANG']['tl_news']['insp_image'],
                'exclude'   => true,
                'inputType' => 'text',
                'eval'      => [ 'style' => 'max-width:100%', 'columnPos' => 'group_1' ],
            ],
            'insp_video' => [
                'label'     => &$GLOBALS['TL_LANG']['tl_news']['insp_video'],
                'exclude'   => true,
                'inputType' => 'text',
                'eval'      => [ 'style' => 'max-width:100%', 'columnPos' => 'group_1' ],
            ],
        ],
        'tl_class' => 'clr',
    ],
    'sql'       => 'blob NULL',
);

/* Adds a select at the top of a News content article to allow selecting which type of news post this is, news or inspiration */
$GLOBALS['TL_DCA']['tl_news']['fields']['post_type'] = array
(
    'label'        => &$GLOBALS['TL_LANG']['tl_news']['post_type'],
    'inputType'    => 'select',
    'options'      => array('default' => 'News', 'inspiration' => 'Inspiration'),
    'eval'         => array('mandatory'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50'),
    'sql'          => "varchar(32) NOT NULL default 'news'"
);
