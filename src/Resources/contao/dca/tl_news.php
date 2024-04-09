<?php

// Extend the 'tl_news' Palette
//$GLOBALS['TL_DCA']['tl_news']['palettes']['default'] = str_replace(';{teaser_legend}', ';{add_news_fields_legend},news_issue;{teaser_legend}', $GLOBALS['TL_DCA']['tl_news']['palettes']['default']);


/*
 * Extend palettes
 */
$paletteManipulator = \Contao\CoreBundle\DataContainer\PaletteManipulator::create()
    ->addLegend('category_legend', 'title_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_AFTER)
    ->addField('categories', 'category_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)
;

foreach ($GLOBALS['TL_DCA']['tl_news']['palettes'] as $name => $palette) {
    if (is_string($palette)) {
        $paletteManipulator->applyToPalette($name, 'tl_news');
    }
}

/*
 * Add fields
 */
$GLOBALS['TL_DCA']['tl_news']['fields']['categories'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_news']['categories'],
    'exclude' => true,
    'filter' => true,
    'inputType' => 'newsCategoriesPicker',
    'foreignKey' => 'tl_news_category.title',
    'options_callback' => ['codefog_news_categories.listener.data_container.news', 'onCategoriesOptionsCallback'],
    'eval' => ['multiple' => true, 'fieldType' => 'checkbox'],
    'relation' => [
        'type' => 'haste-ManyToMany',
        'load' => 'lazy',
        'table' => 'tl_news_category',
        'referenceColumn' => 'news_id',
        'fieldColumn' => 'category_id',
        'relationTable' => 'tl_news_categories',
    ],
];
