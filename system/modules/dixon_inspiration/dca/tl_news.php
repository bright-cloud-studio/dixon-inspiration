<?php

/* Extend the tl_news palettes */
$GLOBALS['TL_DCA']['tl_news']['palettes']['default'] = str_replace(';{teaser_legend}', ';{inspiration_legend},testy;{teaser_legend}', $GLOBALS['TL_DCA']['tl_news']['palettes']['default']);

/* Add new field */
$GLOBALS['TL_DCA']['tl_news']['fields']['testy'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_news']['inspiration_steps'],
        'exclude'   => true,
        'inputType' => 'multiColumnWizard',
        'eval'      => [
            'columnFields' => [
                'insp_headline' => [
                    'label'     => &$GLOBALS['TL_LANG']['tl_content']['insp_headline'],
                    'exclude'   => true,
                    'inputType' => 'text',
                ],
                'insp_text' => [
                    'label'     => &$GLOBALS['TL_LANG']['tl_content']['insp_text'],
                    'exclude'   => true,
                    'inputType' => 'text',
                ],
                'insp_image' => [
                    'label'     => &$GLOBALS['TL_LANG']['tl_content']['insp_image'],
                    'exclude'   => true,
                    'inputType' => 'text',
                ],
                'insp_video' => [
                    'label'     => &$GLOBALS['TL_LANG']['tl_content']['insp_video'],
                    'exclude'   => true,
                    'inputType' => 'text',
                ],
            ],
        ],
        'sql'       => 'blob NULL',
);
