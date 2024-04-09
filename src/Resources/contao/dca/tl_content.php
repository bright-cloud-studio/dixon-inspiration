<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['backgroundrecaptcha'] = '{type_legend},type;{description_legend},recaptcha_action;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields'] += [
    'testy' => [
        'label' => &$GLOBALS['TL_LANG']['tl_content']['testy'],
        'exclude' => true,
        'inputType' => 'text',
        'eval' => ['tl_class' => 'w50', 'required' => true, 'rgxp' => 'recaptcha'],
        'sql' => "varchar(120) NOT NULL default ''",
    ],
];
