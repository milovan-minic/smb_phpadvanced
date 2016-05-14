<?php

$file = '/var/www/phpadvanced/proba_upis.txt';

$fp = fopen($file, 'w');

fwrite($fp, '1');
fwrite($fp, '23');

fclose($fp);


