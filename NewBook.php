<!DOCTYPE html>
<html>
    <head>
        <title>Nova knjiga</title>
    </head>

    <body>
        <h3>Unesi podatke za novu knjigu</h3>
        <form name="nova_knjiga" action="Obrada.php" method="post">
            ID Knjge: <input type="text" name="idk"><br />
            Naslov: <input type="text" name="naslov"><br />
            Oblast: <input type="text" name="oblast"><br />
            <input type="submit" value="Unesi">
            <input type="reset" value="Odustani">
        </form>
    </body>
</html>