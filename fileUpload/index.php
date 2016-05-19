<!DOCTYPE html>
<html>
    <head>
        <title>Forma za upload CV-a</title>
    </head>

    <body>
    <h3>Popunite sva navedena polja:</h3><br />
    <form action="fileUploader.php" name="file_uploader" method="post" enctype="multipart/form-data">
        Ime: <input type="text" name="name"><br />
        Prezime: <input type="text" name="surname"><br />
        Email: <input type="email" name="email"><br />
        CV: <input type="file" name="file" size="500000" /><br />
        <input type="submit" name="submit" value="Prijavite se">
    </form>
    </body>
</html>