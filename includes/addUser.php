<?php
  //krijg de waardes vanuit de post request
  $name = $_POST['name'];
  $box = $_POST['box'];
  $size = $_POST['size'];
  $allergy = $_POST['allergy'];
  $preferences = $_POST['preferences'];
  $fingerprint = $_POST['fingerprint'];
  $foodbank = $_POST['foodbank'];

    //check of de velden wel zijn ingevuld
    if(isset($name) || isset($box) || isset($size) || isset($fingerprint) || isset($foodbank)) {
    //Alle waarden zijn ingevuld dus vuur nu de login functie
    addUser($name, $box, $size, $allergy, $preferences, $fingerprint, $foodbank);
    } else {
        $Response = array(
            "error" => "Fields are not filled in"
        );

        //send back the response
        echo json_encode($Response);
    }

    function addUser($name, $box, $size, $allergy, $preferences, $fingerprint, $foodbank)
    {
        //haal de config.php op zodat we connectie hebben met de database
        require 'config.php';

        $query = "INSERT INTO klant (naam, box, gezin, allergie, voorkeuren, vingerprint, voedselbank) VALUES ('$name','$box', '$size', '$allergy', '$preferences', '$fingerprint' , '$foodbank')";

        if (mysqli_query($mysqli,$query))
        {
            //vul de reponse message
            $message = "User is toegevoegd";
                
            $Response = array(
                "message" => $message,
            );

            // stuur de reponse terug
            echo json_encode($Response);
        }
       else
        {
            $Response = array(
                "error" => "User kon niet toegevoegd worden contacteer de developer"
            );

            //send back the response
            echo json_encode($Response);
        }
    }
?>