<?php

include 'Connection.php';

class Book2
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
        $listBooksQuery = 'SELECT idK, Naslov, Oblast FROM K';

        $konekcia = new Connection();
        $res = $konekcia->upit($listBooksQuery);
        echo $konekcia->errno;
        return $res;
    }

    public function insertBook()
    {

    }

    /** @return string */
    public function getIdk()
    {
        return $this->_idk;
    }

    /** @param string $idk */
    public function setIdk($idk)
    {
        $this->_idk = $idk;
    }

    /** @return string */
    public function getNaslov()
    {
        return $this->_naslov;
    }

    /** @param string $naslov */
    public function setNaslov($naslov)
    {
        $this->_naslov = $naslov;
    }

    /** @return string */
    public function getOblast()
    {
        return $this->_oblast;
    }

    /** @param string $oblast */
    public function setOblast($oblast)
    {
        $this->_oblast = $oblast;
    }
}
