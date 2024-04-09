<?php

$GLOBALS['TL_DCA']['tl_news']['fields']['news_issue'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news']['news_issue'],
	'inputType'               => 'text',
	'default'                 => '',
	'search'                  => true,
	'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);
