<?php

/* When in the Backend, add our custom style sheet */
if (TL_MODE == 'BE')
{
    $GLOBALS['TL_CSS'][]					= 'system/modules/dixon_inspiration/assets/css/inspiration_backend.css';
}
