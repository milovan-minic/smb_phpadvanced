<?php
    include 'Control.php';

    $kontrola = new Control();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Nova knjiga</title>
    </head>

    <body>
        <h3>Unesi podatke za novu knjigu</h3>
        Polja oznacena sa * su obavezna
        <form name="nova_knjiga" action="Obrada.php" method="post">
            ID Knjge: <input type="text" name="idk"> * <br />
            Naslov: <input type="text" name="naslov"> * <br />
            Oblast: <input type="text" name="oblast"><br />
            Izdavac:    <select name="izdavac">
                            <?php
                            $izdavaci = $kontrola->izdavacDropDown();

                            while($izdavac = $izdavaci->fetch_assoc()){
                                echo '<option value="' . $izdavac["idI"] . '">' . $izdavac["Naziv"] . '</option>';
                            }
                            ?>
                        </select><br />
            Pisac:      <select name="pisac">
                            <?php
                            $pisci = $kontrola->autorDropDown();

                            while($pisac = $pisci->fetch_assoc()){
                                echo '<option value="' . $pisac["idP"] . '">' . $pisac["Ime"] . '</option>';
                            }
                            ?>
                        </select><br />
            Tiraz: <input type="number" name="tiraz"><br />
            <input type="submit" value="Unesi">
            <input type="reset" value="Obrisi podatke">
        </form>
    <a href="index.php">Povratak na pocetak</a>
    </body>
</html>