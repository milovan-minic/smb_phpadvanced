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

    public function upit($query)
    {
        return $this->_connection->query($query);
    }


}