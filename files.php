<?php

/*
@$handle = fopen('proba.txt', 'r');

$sadrzaj = fread($handle, filesize('proba.txt'));

fclose($handle);
*/

//$fileName = '/var/www/phpadvanced/proba.txt';
$fileName = 'proba.txt';

$handle = fopen($fileName, 'r');

$contents = fread($handle, filesize($fileName));

echo $contents;

fclose($handle);

