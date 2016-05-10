<?php

include 'Connection.php';

class Control
{
    /** @return mixed */
    public function izdavacDropDown()
    {
        $konekcija = new Connection();

        $listaIzdavaca = "SELECT Naziv FROM I";

        $res = $konekcija->upit($listaIzdavaca);

        if($res === false){
            echo 'Greska prilikom izvrsavanja upita: ' . $listaIzdavaca . '<br />';
        }

        $konekcija->zatvoriKonekciju();

        return $res;
    }

    public function autorDropDown()
    {
        $konekcija = new Connection();

        $listaPisaca = "SELECT Ime FROM P";

        $res = $konekcija->upit($listaPisaca);

        if($res === false){
            echo 'Greska prilikom izvrsavanja upita: ' . $listaPisaca . '<br />';
        }

        $konekcija->zatvoriKonekciju();

        return $res;
    }
}
