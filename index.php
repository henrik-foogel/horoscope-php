<?php require 'header.php'?>
<?php require './code/viewHoroscope.php' ?>
<?php require './code/deleteHoroscope.php' ?>
<?php require './code/addHoroscope.php' ?>
<body>
    <article class="container">
        <h1>Horoscope</h1>
        <section class="horoscope-input">
            <h2>Get your sign</h2>
                    <label for="date">Date of birth:</label>
                    <input type="date" name="date" id="date">
                    <div class="btn-div">
                        <input type="submit" onclick="getHoroscope()" value="Get" name="get" class="get-btn">
                        <input type="submit" onclick="addHoroscope()" value="Save" name="save" class="save-btn">
                        <input type="submit" value="Delete" name="delete" class="delete-btn">
                    </div>
            <h2 class="gotten-horoscope-text"></h2>
        </section>
    </article>
</body>
</html>
<script src="./code/js.js"></script>
<?php
    // if(isset($_POST['date'] && isset($_POST['get'])) {
    //     addHoroscope($_POST['date']);
    // }

    
?>