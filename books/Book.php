<?php

include 'Connection.php';

class Book
{
    private $_idk;
    private $_naslov;
    private $_oblast;

    /**
     * @param string $idk
     * @param string $naslov
     * @param string $oblast
     */
    public function __construct($idk, $naslov, $oblast)
    {
        $this->_idk = $idk;
        $this->_naslov = $naslov;
        $this->_oblast = $oblast;
    }

    static function listBooks()
    {
        $konekcia = new Connection();

        $listBooksQuery = "SELECT idK, Naslov, Oblast FROM K";

        $res = $konekcia->upit($listBooksQuery);

        if($res === false){

            echo 'Greska: ' . $listBooksQuery  . '<br />';

            echo '<a href="index.php">Vrati se na pocetnu stranu</a>';
        }

        $konekcia->zatvoriKonekciju();

        return $res;
    }

    public function insertBook()
    {
        $konekcija = new Connection();

        /**
         * "Ciscenje unosa" stiti aplikaciju od MySQL injection napada
         */
        $idk = $konekcija->ocistiUnos($this->_idk);
        $naslov = $konekcija->ocistiUnos($this->_naslov);
        $oblast = $konekcija->ocistiUnos($this->_oblast);

        $insertBookQuery = "INSERT INTO K (idK, Naslov, Oblast)
                            VALUES ('$idk', '$naslov', '$oblast')";

        $res = $konekcija->upit($insertBookQuery);

        if($res === true) {
            echo 'Nova knjiga je dodata: ' . $this->_idk . ', ' . $this->_naslov . ', ' . $this->_oblast . '<br />';
        } else {
            echo 'Greska: ' . $insertBookQuery  . '<br />';
        }

        echo '<a href="index.php">Vrati se na pocetnu stranu</a>';

        $konekcija->zatvoriKonekciju();

        return $res;
    }
}
