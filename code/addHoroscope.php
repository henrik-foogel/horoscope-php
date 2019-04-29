<?php

class Horoscope {
    function __construct() {
        include_once('database.php');
        $this->database = new Database();
    }

    public function addHoroscope($date) {

        $query = $this->database->connection->
        prepare("SELECT horoscopeSign FROM horoscopelist 
        WHERE (dateFrom <= '$date') AND (dateUntil >= '$date');");
        $query->execute();
        $result = $query->fetchAll();
        session_start();

        if(empty($result)) {
            return array("error"=>"något gick fel");
        }

        if($_POST['action'] == 'update' && !isset($_SESSION['horoscope'])) {
            return json_encode(false);
        }

        if(isset($_SESSION['horoscope']) && $_POST['action'] == 'add') {

            return json_encode(false);
        } else {
            $_SESSION['horoscope'] = $result;
    
            return json_encode(true);
        }

    }

}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dateValue'])) {
    $horoscopes = new Horoscope();
    $databaseResults = $horoscopes->addHoroscope($_POST['dateValue']);
    echo json_encode($databaseResults);
    exit;
}

?>