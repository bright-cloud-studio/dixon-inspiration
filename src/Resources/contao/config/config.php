<?php

/**
* @copyright  Bright Cliud Studio
* @author     Bright Cloud Studio
* @package    Dixon Inspiration
* @license    LGPL-3.0+
* @see	       https://github.com/bright-cloud-studio/dixon-inspiration
*/

/* Front End modules */
//$GLOBALS['FE_MOD']['gai']['mod_receive_data'] = 'Bcs\Module\ModReceiveData';

array_insert($GLOBALS['TL_CTE']['datasets'], 10, array
(
    'activity' => 'Bcs\DixonBundle\ContentActivity'
));
