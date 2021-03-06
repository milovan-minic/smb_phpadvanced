<?php

include 'Book.php';

if(isset($_POST) &&
    (!empty($_POST['idk']) &&
     !empty($_POST['naslov']))) {

    $idk = $_POST['idk'];
    $naslov = $_POST['naslov'];
    $oblast = $_POST['oblast'];
    $izdavac = $_POST['izdavac'];
    $pisac = $_POST['pisac'];
    $tiraz = $_POST['tiraz'];

    if($idk != '' &&
        $naslov != '') {

        $novaKnjiga = new Book($idk, $naslov, $oblast, $izdavac, $pisac, $tiraz);
        $novaKnjiga->insertBook();
        $novaKnjiga->insertKI();
        $novaKnjiga->insertKP();
    } else {
        echo 'Polja su prazna' . '<br />';
        echo '<a href="NewBook.php">Pokusajte ponovo ovde</a>';
    }
} else {
    echo '<h3>Greska</h3>';
    echo '<p>Molimo pokusajte ponovo i unesite sva obavezna polja.</p>';
    echo '<a href="NewBook.php">Pokusajte ponovo ovde</a>';
}
