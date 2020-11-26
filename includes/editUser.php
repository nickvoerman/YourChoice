<?php
  //krijg de waardes vanuit de post request
  $id = $_POST['id'];
  $name = $_POST['name'];
  $box = $_POST['box'];
  $size = $_POST['size'];
  $allergy = $_POST['allergy'];
  $preferences = $_POST['preferences'];
  $foodbank = $_POST['foodbank'];

    //check of de velden wel zijn ingevuld
    if(isset($id) || isset($name) || isset($box) || isset($size) || isset($foodbank)) {
    //Alle waarden zijn ingevuld dus vuur nu de login functie
    editUser($id, $name, $box, $size, $allergy, $preferences, $foodbank);
    } 
    else {
        $Response = array(
            "error" => "Fields are not filled in"
        );

        //send back the response
        echo json_encode($Response);
    }

    function editUser($id, $name, $box, $size, $allergy, $preferences, $foodbank)
    {
        //haal de config.php op zodat we connectie hebben met de database
        require 'config.php';

        $query = "UPDATE klant SET `naam` = '$name', `box` = '$box', `gezin` = '$size', `allergie` = '$allergy', `voorkeuren` = '$preferences', `voedselbank` = '$foodbank' WHERE id = $id";

        if (mysqli_query($mysqli,$query))
        {
            //vul de reponse message
            $message = "User is geëdit!";
                
            $Response = array(
                "message" => $message,
            );

            // stuur de reponse terug
            echo json_encode($Response);
        }
       else
        {
            $Response = array(
                "error" => "User kon niet worden geedit contacteer de developer"
            );

            //send back the response
            echo json_encode($Response);
        }
    }
?>