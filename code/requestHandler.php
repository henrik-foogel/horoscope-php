<?php
include "viewHoroscope.php";
include "addHoroscope.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if($_POST["collectionType"] == "horoscope" && $_POST["action"] == "get") {
            $horoscopes = new Horoscope();
            $databaseResults = $horoscopes->getHoroscopes();
            echo json_encode($databaseResults);
            exit;
        }

        if($_POST["collectionType"] == "horoscope" && $_POST["action"] == "save") {

            $horoscopes = new Horoscope();
            $databaseResults = $horoscopes->addHoroscope();
            // $databaseResults = addHoroscopes($get, $_POST['dateValue']);
            echo json_encode($databaseResults);
            exit;
        }

    } catch(Exception $error) {
        http_response_code(500);
        echo json_encode($error->getMessage());
    }
}

?>