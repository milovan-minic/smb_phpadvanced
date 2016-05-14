<?php

namespace phpadvanced\sqlDump;

class Connection
{
    private $_connection;
    private $_tabela;

    public function __construct()
    {
        $this->_connection = new \mysqli('localhost', 'root', 'misa', 'KIP');

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
     * @param $table
     *
     * @return mixed
     */
    public function listResults($table)
    {
        $this->_tabela = $table;

        $listQuery = "SELECT * FROM $table";

        $res = $this->upit($listQuery);

        if($res === false){

            echo 'Greska: ' . $listQuery  . '<br />';

            echo '<a href="index.php">Vrati se na pocetnu stranu</a><br />';
        }

        $this->zatvoriKonekciju();

        return $res;
    }


    /**
     * @return bool
     */
    public function zatvoriKonekciju()
    {
        return $this->_connection->close();
    }
}