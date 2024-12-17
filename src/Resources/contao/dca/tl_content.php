<?php

/**
 * @copyright  Bright Cliud Studio
 * @author     Bright Cloud Studio
 * @package    Contao CE Chart
 * @license    LGPL-3.0+
 * @see	       https://github.com/bright-cloud-studio/contao-ce-chart
 */

// Get our default 'tl_content' DCA
$dc = &$GLOBALS['TL_DCA']['tl_content'];
$GLOBALS['TL_DCA']['tl_content']['palettes']['chart_line'] = '{type_legend},type,headline;{dataset_legend},tableitems,label_x,label_y,chart_desc;{chart_line_config_legend},animate,line_tension,line_border_width,line_border_dash,line_border_joint_style,line_fill;{line_border_colors_legend},line_border_colors;{line_background_colors_legend},line_background_colors;{line_point_legend},line_point_background_color,line_point_border_color,line_point_border_width,line_point_style,line_point_radius;{chart_options_legend},maintain_aspect_ratio,responsive,max_width,max_height;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['chart_bar'] = '{type_legend},type,headline;{dataset_legend},tableitems,label_x,label_y,chart_desc;{chart_bar_config_legend},bar_border_width,bar_border_skipped,bar_border_radius,bar_inflate_amount,bar_point_style;{bar_background_colors_legend},bar_background_colors;{bar_border_colors_legend},bar_border_colors;{chart_options_legend},maintain_aspect_ratio,responsive,max_width,max_height;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

$arrFields = array(
    'label_x'             => array(
        'label'                    => &$GLOBALS['TL_LANG']['tl_content']['label_x'],
        'inputType'                => 'text',
		'eval'                     => array('tl_class'=>'w50'),
		'sql'                      => "mediumtext NULL"
    ),
    'line_background_colors'       => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_content']['line_background_colors'],
        'exclude'   => true,
        'inputType' => 'multiColumnWizard',
        'eval'      => [
            'columnFields' => [
                'bg_r' => [
                    'label'     => &$GLOBALS['TL_LANG']['tl_content']['bg_r'],
                    'exclude'   => true,
                    'inputType' => 'text',
                ],
                'bg_g' => [
                    'label'     => &$GLOBALS['TL_LANG']['tl_content']['bg_b'],
                    'exclude'   => true,
                    'inputType' => 'text',
                ],
            ],
        ],
        'sql'       => 'blob NULL',
    ),


);

$dc['fields'] = array_merge($dc['fields'], $arrFields);
