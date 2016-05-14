<?php

$handle = @fopen('/var/www/phpadvanced/proba.txt', 'r');

if($handle) {
    while(($buffer = fgets($handle, 4096)) !== false) {
        echo $buffer;
    }

    if(!feof($handle)) {
        echo 'Error: unexpected fgets() fail\n';
    }

    fclose($handle);
}

