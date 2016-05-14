<?php

namespace phpadvanced\sqlDump;

include 'Connection.php';

class File
{
    private $_fileName;
    private $_tableName;
    private $_resource;

    public function __construct($fileName, $tableName)
    {
        $this->_fileName = 'files/' . $fileName;
        $this->_tableName = $tableName;
    }

    /** @return resource */
    public function createFile()
    {
        $this->_resource = fopen($this->_fileName, 'w') or die('Nije moguce kreirati fajl ' . $this->_fileName);

        return $this->_resource;
    }

    /**
     * @param $content
     *
     * @return int
     */
    public function addToFile($content)
    {
        return fwrite($this->_resource, $content);
    }

    /** @return bool */
    public function closeFile()
    {
        return fclose($this->_resource);
    }
}
