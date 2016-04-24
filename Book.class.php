<?php

class Book
{
    private $_subject;
    private $_price;
    private $_title;

    static $instances = array();

    /**
     * @param $subject
     * @param $price
     * @param $title
     */
    public function __construct($subject, $price, $title)
    {
        // Dodavanje informacije o svakom instanciranom objektu
        Book::$instances[] = $this;

        $this->_subject = $subject;
        $this->_price = $price;
        $this->_title = $title;
    }

    /** @return mixed */
    public function getSubject()
    {
        return $this->_subject;
    }

    /** @param $subject */
    public function setSubject($subject)
    {
        $this->_subject = $subject;
    }

    /** @return mixed */
    public function getPrice()
    {
        return $this->_price;
    }

    /** @param $price */
    public function setPrice($price)
    {
        $this->_price = $price;
    }

    /** @return mixed */
    public function getTitle()
    {
        return $this->_title;
    }

    /** @param $title */
    public function setTitle($title)
    {
        $this->_title = $title;
    }
}

$math = new Book('math', 1450, 'Algebra');
$physics = new Book('physics', 1290, 'Physics for High School');
$chemistry = new Book('chemistry', 999, 'Advanced Chemistry');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Prices</title>
    <meta charset="UTF-8">
    <style>
        table{
            border-collapse: collapse;
            width: 50%;
        }
        table, th, td {
            border: 1px solid aqua;
        }
        th{
            background-color: aquamarine;
            color: darkgray;
        }
        tr{
            background-color: darkgray;
        }
        tr:nth-child(odd){
            background-color: aquamarine;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>Subject</th>
        <th>Price</th>
        <th>Title</th>
    </tr>
    <?php
    foreach (Book::$instances as $instance) {
        echo '<tr>';
        echo '<td>' . $instance->getSubject() . '</td>';
        echo '<td>' . $instance->getPrice() . '</td>';
        echo '<td>' . $instance->getTitle() . '</td>';
        echo '</tr>';
    }
    ?>
</table>
<p>Nakon pojeftinjenja od 10%, cene su sledeće</p>
<table>
    <tr>
        <th>Subject</th>
        <th>Price</th>
        <th>Title</th>
    </tr>
    <?php
    foreach (Book::$instances as $instance) {
        echo '<tr>';
        echo '<td>' . $instance->getSubject() . '</td>';
        echo '<td>' . $instance->getPrice() * 0.9 . '</td>';
        echo '<td>' . $instance->getTitle() . '</td>';
        echo '</tr>';
    }
    ?>
</table>
</body>
</html>