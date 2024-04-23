<?php

// Palette for our module
$GLOBALS['TL_DCA']['mod_inspiration_news']['palettes']['default'] = str_replace('{title_legend}', ';{post_type_legend},post_type;{title_legend}', $GLOBALS['TL_DCA']['tl_news']['palettes']['default']);
