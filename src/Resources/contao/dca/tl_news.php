<?php

$GLOBALS['TL_DCA']['tl_news']['palettes']['backgroundrecaptcha'] = '{type_legend},type;{description_legend},recaptcha_action;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_news']['fields']['testy2'] = [
    'label' => ['test2', 'Geben Sie hier den Vornamen des Mitglieds ein.'],
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'maxlength' => 255],
    'sql' => ['type' => 'string', 'length' => 255, 'default' => ''],
];
