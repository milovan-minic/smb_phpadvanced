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
// TODO: Ispraviti kod na osnovu primera dole
$niz[] = new Book('math', 1450, 'Algebra');
//Book::$instances[] = ($math);

$physics = new Book('physics', 1290, 'Physics for High School');
//Book::$instances[] = ($physics);

$chemistry = new Book('chemistry', 999, 'Advanced Chemistry');
//Book::$instances[] = ($chemistry);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Book Prices</title>
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
        <table>
            <tr>
                <th width="33.3%">Naziv objekta</th>
                <th width="33.3%">Vrednost atributa <i>price</i></th>
                <th width="33.4%">Vrednost atributa <i>title</i></th>
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
                <th width="33.3%">Naziv objekta</th>
                <th width="33.3%">Vrednost atributa <i>price</i></th>
                <th width="33.4%">Vrednost atributa <i>title</i></th>
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
