<?php

/* Extend the tl_news palettes */
$GLOBALS['TL_DCA']['tl_news']['palettes']['default'] = str_replace(';{teaser_legend}', ';{inspiration_legend},testy;{teaser_legend}', $GLOBALS['TL_DCA']['tl_news']['palettes']['default']);

/* Add new field */
$GLOBALS['TL_DCA']['tl_news']['fields']['testy'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_news']['testy'],
  'inputType'               => 'text',
  'default'                 => '',
  'search'                  => true,
  'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
  'sql'                     => "varchar(255) NOT NULL default ''"
);
