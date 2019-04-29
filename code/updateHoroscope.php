<?php

include "./addHoroscope.php";

    if($_SERVER["REQUEST_METHOD"] == 'POST') {
       $date = $_POST['dateValue'];

       $horoscope = new Horoscope();
       
       if(isset($_SESSION['horoscope'])) {
            $horoscope->addHoroscope($date);
            echo json_encode(true);
       } else {
           echo json_encode(false);
       }


    }

?>