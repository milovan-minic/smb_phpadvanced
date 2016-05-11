<?php

include 'Connection.php';

class Book
{
    private $_idk;
    private $_naslov;
    private $_oblast;
    private $_idi;
    private $_idp;
    private $_tiraz;

    /**
     * @param string $idk
     * @param string $naslov
     * @param string $oblast
     * @param string $idi
     * @param string $idp
     * @param int $tiraz
     */
    public function __construct($idk, $naslov, $oblast, $idi, $idp, $tiraz)
    {
        $this->_idk = $idk;
        $this->_naslov = $naslov;
        $this->_oblast = $oblast;
        $this->_idi = $idi;
        $this->_idp = $idp;
        $this->_tiraz = $tiraz;
    }

    /**
     * @return mixed
     */
    static function listBooks()
    {
        $konekcia = new Connection();

        $listBooksQuery = "SELECT idK, Naslov, Oblast FROM K";

        $res = $konekcia->upit($listBooksQuery);

        if($res === false){

            echo 'Greska: ' . $listBooksQuery  . '<br />';

            echo '<a href="index.php">Vrati se na pocetnu stranu</a><br />';
        }

        $konekcia->zatvoriKonekciju();

        return $res;
    }

    /**
     * @return mixed
     */
    public function insertBook()
    {
        $konekcija = new Connection();

        /** "Ciscenje unosa" stiti aplikaciju od MySQL injection napada */
        $idk = $konekcija->ocistiUnos($this->_idk);
        $naslov = $konekcija->ocistiUnos($this->_naslov);
        $oblast = $konekcija->ocistiUnos($this->_oblast);

        $insertBookQuery = "INSERT INTO K (idK, Naslov, Oblast)
                            VALUES ('$idk', '$naslov', '$oblast')";

        $res = $konekcija->upit($insertBookQuery);

        if($res === true) {
            echo 'Nova knjiga je dodata: ' . $idk . ', ' . $naslov . ', ' . $oblast . '<br />';
        } else {
            echo 'Greska: ' . $insertBookQuery  . '<br />';
        }

        echo '<a href="index.php">Vrati se na pocetnu stranu</a><br />';

        $konekcija->zatvoriKonekciju();

        return $res;
    }

    /**
     * @return mixed
     */
    public function insertKI()
    {
        $konekcija = new Connection();

        $idi = $konekcija->ocistiUnos($this->_idi);
        $idk = $konekcija->ocistiUnos($this->_idk);
        $tiraz = $konekcija->ocistiUnos($this->_tiraz);

        $insertKIQuery = "INSERT INTO KI (idK, idI, Tiraz)
                          VALUES ('$idk', '$idi', $tiraz)";

        $res = $konekcija->upit($insertKIQuery);

        if($res === true) {
            echo 'Nova relacija Knjiga-Izdavac je dodata: ' . $idk . ', ' . $idi . ', ' . $tiraz . '<br />';
        } else {
            echo 'Greska: ' . $insertKIQuery . '<br />';
        }

        echo '<a href="index.php">Vrati se na pocetnu stranu</a><br />';

        $konekcija->zatvoriKonekciju();

        return $res;
    }

    public function insertKP()
    {
        $konekcija = new Connection();

        $idk = $konekcija->ocistiUnos($this->_idk);
        $idp = $konekcija->ocistiUnos($this->_idp);

        $insertKPQuery = "INSERT INTO KP (idK, idP, RBroj)
                          VALUES ('$idk', '$idp', 1)";

        $res = $konekcija->upit($insertKPQuery);

        if($res === true) {
            echo 'Nova relacija Knjiga-Pisac je dodata: ' . $idk . ', ' . $idp . '<br />';
        } else {
            echo 'Greska: ' . $insertKPQuery . '<br />';
        }

        echo '<a href="index.php">Vrati se na pocetnu stranu</a><br />';

        $konekcija->zatvoriKonekciju();

        return $res;
    }
}
