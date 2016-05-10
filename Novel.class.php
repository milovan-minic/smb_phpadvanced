<?php

require_once 'Book1.class.php';

class Novel extends Book1
{
    private $_publisher;

    public function __construct($subject, $price, $title, $publisher)
    {
        parent::__construct($subject, $price, $title);
        $this->_publisher = $publisher;
    }

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

$novel = new Novel('subj', 0, 'title', 'publisher');

$novel->setSubject('Novel Subject');
$novel->setPrice(123);
$novel->setTitle('Novel Title');
$novel->setPublisher('Novel Publisher');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Novel</title>
    <meta charset="UTF-8">
    <style>
        table{
            font-family: "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 80%;
        }
        table, th, td {
            border: 2px solid cornflowerblue;
        }
        tr:nth-child(even){
            background-color: lightskyblue;
        }
    </style>
</head>
<body>
<br /><br /><br />
    <table>
        <tr>
            <th width="25%">Naziv objekta</th>
            <th width="25%">Vrednost atributa <i>price</i></th>
            <th width="25%">Vrednost atributa <i>title</i></th>
            <th width="25%">Vrednost atributa <i>publisher</i></th>
        </tr>
        <tr>
            <td><?php echo $novel->getSubject(); ?></td>
            <td><?php echo $novel->getPrice(); ?></td>
            <td><?php echo $novel->getTitle(); ?></td>
            <td><?php echo $novel->getPublisher(); ?></td>
        </tr>
    </table>
</body>
</html>
