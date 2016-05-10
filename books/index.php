<?php

    if($_POST){
        if(array_key_exists('list', $_POST)){
            header('Location: ListBooks.php');
        }

        if(array_key_exists('insert', $_POST)){
            header('Location: NewBook.php');
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>K N J I G E</title>
    </head>

    <body>
        <h3>Izaberite jednu od opcija</h3>
        <form action="" method="post">
            <input type="submit" name="list" value="Listaj">
            <input type="submit" name="insert" value="Unesi">
        </form>
    </body>
</html>