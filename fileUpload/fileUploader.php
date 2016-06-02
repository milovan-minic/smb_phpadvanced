<?php

//$allowedExtensions = array('jpg', 'jpeg', 'gif', 'png');
$allowedExtensions = array('pdf');

$explodedArray = explode('.', $_FILES['file']['name']);

$extension = end($explodedArray);

if (
        ($_FILES['file']['type'] == 'application/pdf') &&
        (($_FILES['file']['size'] < 500000) && (in_array($extension, $allowedExtensions)))
    ) {
    if ($_FILES['file']['error'] > 0) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br />';
    } else {
//        echo 'Uploaded: ' . $_FILES['file']['name'] . '<br />';
//        echo 'Type: ' . $_FILES['file']['type'] . '<br />';
//        echo 'Size: ' . ($_FILES['file']['size'] / 1024) . 'kB<br />';
//        echo 'Stored in: ' . $_FILES['file']['tmp_name'] . '<br />';
//        echo '<pre>' . print_r($_FILES) . '</pre>';

        if(file_exists('uploads/' . $_FILES['file']['name'])) {
            echo '<p style="color:#FF0000;">' . $_FILES['file']['name'] . ' already exists</p>';
        } else {
            $filePath = 'uploads/' . $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
//            echo 'Stored in: ' . $filePath;

            $connection = new mysqli('localhost', 'root', 'misa', 'biografije');

            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = '';
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                global $email;
                $email = $_POST['email'];
            } else {
                $email = 'niko@nigde.rs';
            }

            $insertQuery = "INSERT INTO prijave (ime, prezime, lokacija_fajla, email)
                            VALUES ('$name', '$surname', '$filePath', '$email')";

            $insertRes = $connection->query($insertQuery);

            if($insertRes){
                global $name;
                global $surname;
                global $filePath;
                global $email;

                $selectQuery = "SELECT id
                                FROM prijave
                                WHERE ime = '$name'
                                AND prezime = '$surname'
                                AND lokacija_fajla = '$filePath'
                                AND email = '$email'";

                $selectRes = $connection->query($selectQuery);

                if($selectRes) {

                    echo 'Cestitamo ' . $name . ', uspesno ste se prijavili!<br />';

                    foreach($selectRes->fetch_assoc() as $key=>$value){
//                        echo $key . ' => ' . $value . '<br />';
                        echo 'Vasa prijava je zavedena pod rednim brojem ' . $value . '!<br />';
                    }
                }


            }
        }
    }
} else {
    echo 'Invalid file!';
}


//while(true){

//}
