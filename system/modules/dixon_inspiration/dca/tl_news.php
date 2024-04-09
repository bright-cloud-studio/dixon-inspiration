<?php

/* Extend the tl_news palettes */
$GLOBALS['TL_DCA']['tl_news']['palettes']['default'] = str_replace(';{teaser_legend}', ';{inspiration_legend},inspiration_steps;{teaser_legend}', $GLOBALS['TL_DCA']['tl_news']['palettes']['default']);

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
                    'eval'      => [ 'style' => 'width:100%', 'columnPos' => 'group_1' ],
                ],
                'insp_text' => [
                    'label'     => &$GLOBALS['TL_LANG']['tl_news']['insp_text'],
                    'exclude'   => true,
                    'inputType' => 'textarea',
                    'eval'      => array('tl_class'=>'clr', 'rte'=>'tinyMCE', 'style' => 'width:100%', 'columnPos' => 'group_1'),
                ],
                'insp_image' => [
                    'label'     => &$GLOBALS['TL_LANG']['tl_news']['insp_image'],
                    'exclude'   => true,
                    'inputType' => 'text',
                    'eval'      => [ 'style' => 'width:100%', 'columnPos' => 'group_1' ],
                ],
                'insp_video' => [
                    'label'     => &$GLOBALS['TL_LANG']['tl_news']['insp_video'],
                    'exclude'   => true,
                    'inputType' => 'text',
                    'eval'      => [ 'style' => 'width:100%', 'columnPos' => 'group_1' ],
                ],
            ],
        ],
        'sql'       => 'blob NULL',
);
