<?php

/**
 * @copyright  Bright Cloud Studio
 * @author     Bright Cloud Studio
 * @package    Dixon Inspiration
 * @license    LGPL-3.0+
 * @see        https://github.com/bright-cloud-studio/dixon-inspiration
 */

/* Front End modules */
//$GLOBALS['FE_MOD']['gai']['mod_receive_data'] = 'Bcs\Module\ModReceiveData';

array_insert($GLOBALS['TL_CTE']['inspiration'], 10, array
(
    'activity' => 'Bcs\DixonBundle\ContentActivity',
    'step'     => 'Bcs\DixonBundle\ContentStep',
    'article'  => 'Bcs\DixonBundle\ContentArticle'
));
