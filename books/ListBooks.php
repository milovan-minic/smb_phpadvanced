<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Spisak knjiga</title>
    <style>
        table{
            font-family: "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 80%;
        }
        table, th, td {
            border: 2px solid cornflowerblue;
        }
        tr:nth-child(even){
            background-color: lightskyblue;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th width="15%">Sifra knjige</th>
        <th width="55%">Naslov knjige</th>
        <th width="30%">Oblast</th>
    </tr>

<?php

include 'Book.php';

if(isset($_POST)) {
    $idk = $_POST['idk'];
    $naslov = $_POST['naslov'];
    $oblast = $_POST['oblast'];

    $novaKnjiga = new Book($idk, $naslov, $oblast);

    $listResult = $novaKnjiga->listBooks();
    while ($red = $listResult->fetch_assoc()) {

        echo '<tr>';
        echo '<td>' . $red['idK'] . '</td><td>' . $red['Naslov'] . '</td><td>' . $red['Oblast'] . '</td>';
        echo '</tr>';

    }
}
?>
</table>
<a href="index.php">Vrati se na pocetak</a>
</body>
</html>
