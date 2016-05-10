<?php

class Connection
{
    private $_connection;

    public function __construct()
    {
        $this->_connection = new mysqli('localhost', 'root', 'misa', 'KIP');

        if($this->_connection->connect_errno > 0){
            echo 'Greska pri konekciji: ' . $this->_connection->connect_error;
        }
    }

    /**
     * @param $query
     * @return mixed
     */
    public function upit($query)
    {
        if($this->_connection->errno === 0) {
            return $this->_connection->query($query);
        } else {
            echo 'Greska prilikom izvrsavanja upita: ' . $this->_connection->error;
        }
    }

    /**
     * ocistiUnos stiti aplikaciju od MySQL injection napada koristeci mysqli::real_escape_string
     *
     * @param string $izraz
     *
     * @return string
     */
    public function ocistiUnos($izraz)
    {
        return $this->_connection->real_escape_string($izraz);
    }

    /**
     * @return bool
     */
    public function zatvoriKonekciju()
    {
        return $this->_connection->close();
    }
}