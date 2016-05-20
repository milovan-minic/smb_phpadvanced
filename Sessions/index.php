<?php

session_start();

if(isset($_SESSION['counter'])) {
    $_SESSION['counter'] += 1;
} else {
    $_SESSION['counter'] = 1;
}

$msg = 'Posetili ste stranu ' . $_SESSION['counter'];

$msg .= '. put u trenutnoj sesiji.';

echo $msg;

//echo phpinfo();


