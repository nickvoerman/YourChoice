<?php
  //krijg de waardes vanuit de post request
  $u = $_POST['username'];
  $p = $_POST['password'];

    //check of de velden wel zijn ingevuld
    if(isset($u) || isset($p)) {
    //Alle waarden zijn ingevuld dus vuur nu de login functie
    LoginAdmin($u, $p);
    } else {

        $Response = array(
            "error" => "Fields are not filled in"
        );

        //send back the response
        echo json_encode($Response);
    }

    function LoginAdmin($u, $p)
    {
        //haal de config.php op zodat we connectie hebben met de database
        require 'config.php';

        //selecteer de rij waar username $u is
        $query = "SELECT * FROM `admin` WHERE naam = '$u'";

        //vuur de query naar de database
        $result = mysqli_query($mysqli, $query);

        //als de query succesvol is gaat die in deze if statement
        if ($row = mysqli_fetch_assoc($result)) 
        { 

            // bestaat
            if ($row['naam'] == $u && password_verify($p, $row['password'])) 
            { 
                // in deze rij is het password gelijk aan $p
                session_start(); // start de sessie

                //zet de sessies zodat we die later kunnen uitlezen in het project
                $_SESSION['name'] = $u;
                $_SESSION['id'] = $row['id'];

                //vul de reponse message
                $message = "You have been logged in";
                
                $Response = array(
                    "message" => $message,
                );

                // stuur de reponse terug
                echo json_encode($Response);
            } 
            else {
                //vul de reponse message
                $Response = array(
                    "error" => "Could not connect to user"
                );

                //send back the response
                echo json_encode($Response);
            }
        } 
        else 
        {   
            //vul de reponse message
            $Response = array(
                "error" => "username doesnt exist"
            );

            // stuur de reponse terug
            echo json_encode($Response);
        }
    }
?>