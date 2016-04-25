<?php

class Novel extends Book
{
    private $_publisher;

    /** @return mixed */
    public function getPublisher()
    {
        return $this->_publisher;
    }

    /** @param $publisher */
    public function setPublisher($publisher)
    {
        $this->_publisher = $publisher;
    }
}

?>
