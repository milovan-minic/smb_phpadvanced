<?php

namespace phpadvanced\sqlDump;

class FileCreator
{
    private $_myFile;

    public function __construct($name)
    {
        echo $name . '<br />';
        $this->_myFile = fopen($name, 'w') or die('Fajl nije kreiran!');

    }

    /**
     * @return bool
     */
    public function zatvoriFajl()
    {
        return fclose($this->_myFile);
    }
}
