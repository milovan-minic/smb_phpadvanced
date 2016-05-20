<?php

if($_COOKIE['rgb']) {
    $backgroundColor = $_COOKIE['rgb'];
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cookie Colored Page</title>
    </head>

    <body bgcolor="<?php if($backgroundColor) {
        echo $backgroundColor;
    } else echo '#FFFFFF'?>">
        <h3>Unesite RGB sifru boje:</h3>
        <form name="rgb_form" action="cookieColoredPage.php" method="get">
            RGB: <input type="text" name="rgb" size="6"><br />
<!--            Red: <input type="number" name="red"><br />-->
<!--            Green: <input type="number" name="green"><br />-->
<!--            Blue: <input type="number" name="blue"><br />-->
            <input type="submit" name="submit" value="Change color">
        </form>
    </body>
</html>

<?php

if(isset($_GET['submit'])) {
    $rgb = '#' . strtoupper($_GET['rgb']);

    setcookie('rgb', $rgb, time() + 60);

    //$colorValue = "$r$g$b";
}

?>