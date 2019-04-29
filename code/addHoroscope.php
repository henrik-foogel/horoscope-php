<?php

class Horoscope {
    function __construct() {
        include_once('database.php');
        $this->database = new Database();
    }

    public function getHoroscopes() {

        $query = $this->database->connection->prepare("SELECT * FROM horoscopelist");
        $query->execute();
        $result = $query->fetchAll();

        if(empty($result)) {
            return array("error"=>"något gick fel");
        }

        return $result;

    }

    public function addHoroscope($date) {

        $query = $this->database->connection->
        prepare("SELECT horoscopeSign FROM horoscopelist 
        WHERE (dateFrom <= '$date') AND (dateUntil >= '$date');");
        $query->execute();
        $result = $query->fetchAll();

        if(empty($result)) {
            return array("error"=>"något gick fel");
        }
                return $result;

    }

}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dateValue'])) {
    $horoscopes = new Horoscope();
    $databaseResults = $horoscopes->addHoroscope($_POST['dateValue']);
    // $databaseResults = addHoroscopes($get, $_POST['dateValue']);
    echo json_encode($databaseResults);
    exit;
}

// include "viewHoroscope.php";

    // function addHoroscopes($horoscope, $date) {



        // $session_start;
        // // $query = $horoscope;

        // foreach($horoscope as $horo) {

        // }

        // // $_SESSION['date'] = $query;

        // if(empty($query)) {
        //     return array("error"=>"något gick fel");
        // }

        // return $query;

    // }


?>