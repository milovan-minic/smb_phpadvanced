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
            Izdavac:    <select>
                            <?php
                            $izdavaci = $kontrola->izdavacDropDown();

                            while($izdavac = $izdavaci->fetch_assoc()){
                                echo '<option value="' . $izdavac["Naziv"] . '">' . $izdavac["Naziv"] . '</option>';
                            }
                            ?>
                        </select><br />
            Pisac:      <select>
                            <?php
                            $pisci = $kontrola->autorDropDown();

                            while($pisac = $pisci->fetch_assoc()){
                                echo '<option value="' . $pisac["Ime"] . '">' . $pisac["Ime"] . '</option>';
                            }
                            ?>
                        </select><br />
            <input type="submit" value="Unesi">
            <input type="reset" value="Obrisi podatke">
        </form>
    <a href="index.php">Povratak na pocetak</a>
    </body>
</html>