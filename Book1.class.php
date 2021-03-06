<?php

// $objekti cuva sve kreirane objekte u nizu kako bi se kasnije lakse iteriralo kroz sve clanove niza
$objekti = array();

class Book1
{
    private $_subject;
    private $_price;
    private $_title;

    /**
     * @param string $subject
     * @param int $price
     * @param string $title
     */
    public function __construct($subject, $price, $title)
    {
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
$objekti[] = new Book1('math', 1450, 'Algebra');
$objekti[] = new Book1('physics', 1290, 'Physics for High School');
$objekti[] = new Book1('chemistry', 999, 'Advanced Chemistry');

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
                foreach ($objekti as $objekat) {
                    echo '<tr>';
                    echo '<td>' . $objekat->getSubject() . '</td>';
                    echo '<td>' . $objekat->getPrice() . '</td>';
                    echo '<td>' . $objekat->getTitle() . '</td>';
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
                foreach ($objekti as $objekat) {
                    echo '<tr>';
                    echo '<td>' . $objekat->getSubject() . '</td>';
                    echo '<td>' . $objekat->getPrice() * 0.9 . '</td>';
                    echo '<td>' . $objekat->getTitle() . '</td>';
                    echo '</tr>';
                }
            ?>
        </table>
    </body>
</html>
