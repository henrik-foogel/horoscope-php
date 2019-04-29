<?php 
    session_start();

    
    if($_SERVER["REQUEST_METHOD"] == 'GET') {

    if(isset($_SESSION['horoscope'])) {
        $horo = $_SESSION['horoscope'];
        
        echo json_encode($horo);
    } else {
        echo json_encode('');
    }

}

?>