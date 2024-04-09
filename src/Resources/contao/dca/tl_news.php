<?php

$GLOBALS['TL_DCA']['tl_news']['fields'] += [
    'testy2' => [
        'label' => &$GLOBALS['TL_LANG']['tl_content']['testy2'],
        'exclude' => true,
        'inputType' => 'text',
        'eval' => ['tl_class' => 'w50', 'required' => true, 'rgxp' => 'recaptcha'],
        'sql' => "varchar(120) NOT NULL default ''",
    ],
];
