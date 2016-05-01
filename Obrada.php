<?php

include 'Book2.php';

if(isset($_POST)) {
    $idk = $_POST['idk'];
    $naslov = $_POST['$naslov'];
    $oblast = $_POST['$oblast'];

    $novaKnjiga = new Book2($idk, $naslov, $oblast);



    echo 'OK';

    $result = $novaKnjiga->listBooks();
    while($red = $result->fetch_assoc()){
        echo $red['Naslov'] . ' | ';
    }
}
