<?php

if($_COOKIE['name']) {
    echo $_COOKIE['name'] . '<br />';
// ovo je isto sto i mada je obsolete...
    echo @$HTTP_COOKIE_VARS['name'] . '<br />';
}

if($_COOKIE['age']) {
    echo $_COOKIE['age'] . '<br />';
// ovo je isto sto i mada je obsolete...
    echo @$HTTP_COOKIE_VARS['age'] . '<br />';
}

echo date('H:i:s');
