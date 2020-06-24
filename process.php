<?php

$fileName = 'coordinates.txt';

if(isset($_POST['lat']) && isset($_POST['lng'])) {
    $myfile = fopen($fileName, "w") or die("Unable to open file!");
    $coordinates = $_POST['lat'] . "\n" . $_POST['lng'];
    fwrite($myfile, $coordinates);
    fclose($myfile);
} else {
    $file = fopen("coordinates.txt","r") or die("Unable to open file!");
    $location = [];

    while(!feof($file)) {
        $location[] = trim(fgets($file));
    }

    fclose($file);
    echo json_encode($location);
}