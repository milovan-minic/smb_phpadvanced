<?php

setcookie('name', 'John Watkin', time()+3600, '/', '', 0);
setcookie('age', '36', time()+3600, '/', '', 0);
setcookie('TestCookie', '', time()-3600, '/~rasmus/', 'example.com', 1);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Setting Cookie with PHP</title>
    </head>

    <body>
        <?php echo 'Set Cookies'; ?>
    </body>
</html>
