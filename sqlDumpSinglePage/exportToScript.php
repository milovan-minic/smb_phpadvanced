<?php

namespace phpadvanced\sqlDump;

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

    $connection = new \mysqli('localhost', 'root', 'misa', 'KIP');

    $query = "SELECT * FROM $tabela";

    $results = $connection->query($query);

    $fileName = 'files/db_dump_' . $tabela . '.sql';
    $fileHeader = "INSERT INTO $tabela VALUES " . PHP_EOL;

    $myFile = fopen($fileName, 'w') or die('Fajl nije kreiran');

    fwrite($myFile, $fileHeader);

    $numRows = $results->num_rows;

    // Inicijalizacija brojaca ispisanih redova
    $j = 1;

    while($red = $results->fetch_assoc()) {
        fwrite($myFile, '(');

        // Inicijalizacija brojaca ispisanih polja
        $i = 1;

        $numFields = sizeof($red);

        foreach($red as $polje){
            if($i < $numFields) {
                fwrite($myFile, "'" . $polje . "', ");
            } else {
                fwrite($myFile, "'" . $polje . "'");
            }

            $i++;
        }

        if($j < $numRows) {
            fwrite($myFile, '),' . PHP_EOL);
            $j++;
        } else {
            fwrite($myFile, ');');
        }
    }

    fclose($myFile);
    echo "<h3>Iz tabele $tabela uspesno eksportovano $numRows redova u fajl \"$fileName\"</h3><br />";
    echo '<a href="index.php">Povratak na pocetnu stranu</a><br />';

} else {
    echo 'Greska!!!';
}
