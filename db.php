<?php

$connection = new mysqli('localhost', 'root', 'misa', 'KIP');

if($connection->connect_errno > 0){
//    die('Doslo je do problema u konekciji sa bazom');
    echo 'Greska: ' . $connection->connect_error;
}

$query = 'SELECT * FROM K';

$results = $connection->query($query);
// konekcija moze da se zatvori i na ovom mestu, ali je zbog lakseg razumevanja smestena na kraj skripta

//var_dump($results);

while($red = $results->fetch_assoc()){
    echo $red['Naslov'] . ' | ';
}

$connection->close();
