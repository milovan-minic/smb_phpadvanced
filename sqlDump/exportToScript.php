<?php

namespace phpadvanced\sqlDump;

include 'Connection.php';
//include 'File.php';

if(isset($_POST['submit'])) {

    switch ($_POST['tabela']) {
        case 1:
            $tabela = 'K';
            break;
        case 2:
            $tabela = 'I';
            break;
        default:
            $tabela = 'P';
    }

//    echo $tabela . '<br />';

    $connection = new Connection();

    $fileName = 'files/db_dump_' . $tabela . '.sql';
    $fileHeader = "INSERT INTO $tabela VALUES " . PHP_EOL;

//    $file = new File($fileName, $tabela);
    $myFile = fopen($fileName, 'w') or die('Fajl nije kreiran');

//    $file->addToFile($fileHeader);
    fwrite($myFile, $fileHeader);

    $results = $connection->listResults($tabela);
    $numRows = count($results);
//    $numRows = sizeof($results);
//    echo $numRows . ' redova<br />';

    $j = 1;

    while($red = $results->fetch_assoc()) {
//        $file->addToFile('(');
        fwrite($myFile, '(');
//        echo('(');

        $i = 1;

        $numFields = count($red);

        foreach($red as $polje){
            if($i < $numFields) {
//                echo $polje . ', ';
//                $file->addToFile($polje);
                fwrite($myFile, "'" . $polje . "'");
//                $file->addToFile(', ');
                fwrite($myFile, ', ');
            } else {
//                $file->addToFile($polje);
                fwrite($myFile, "'" . $polje . "'");
//                echo $polje;
            }
            $i++;

        }

        $j++;

        if($j <= $i) {
//            $file->addToFile('),');
            fwrite($myFile, '),' . PHP_EOL);
//            echo('),<br />');
        } else {
//            $file->addToFile(');');
            fwrite($myFile, ');');
//            echo(');<br />');
        }

//        echo $j . '<br />';
    }

//    $file->closeFile();
    fclose($myFile);

} else {
    echo 'Greska!!!';
}
