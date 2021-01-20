<?php 
    //haal de config.php op zodat we connectie hebben met de database
    require 'includes/config.php';

    //haal de fingerprint op
    $queryvingerprint = "SELECT * FROM `vingerid` WHERE id = '1'";

    //vuur de query naar de database
    $resultvingerprint = mysqli_query($mysqli, $queryvingerprint);

    if ($rowvingerprint = mysqli_fetch_assoc($resultvingerprint)) 
    {
        $vingerprint = $rowvingerprint['vinger_id'];
    }

    //selecteer de rij waar username $u is
    $query = "SELECT * FROM `klant` WHERE vingerprint = $vingerprint";

    //vuur de query naar de database
    $result = mysqli_query($mysqli, $query);

    //als de query succesvol is gaat die in deze if statement
    if ($row = mysqli_fetch_assoc($result)) 
    {
        echo "<p style='display:none'; class='js-edit-id' id=" . $row['id']  .">";
        echo "<p class='result__form-input-title'>Naam:</p>
        <input class='result__form-input js-edit-name' value=" . $row['naam'] . "><br>";
        echo "<p class='result__form-input-title'>Box:</p>
        <input class='result__form-input js-edit-box' value=" . $row['box'] . "><br>";
        echo "<p class='result__form-input-title'>Gezin:</p>
        <input class='result__form-input js-edit-size' value=" . $row['gezin'] . "><br>";
        echo "<p class='result__form-input-title'>Allergie:</p>
        <input class='result__form-input js-edit-allergy' value=" . $row['allergie'] . "><br>";
        echo "<p class='result__form-input-title'>Voorkeuren:</p>
        <input class='result__form-input js-edit-preferences' value=" . $row['voorkeuren'] . "><br>";
        echo "<p class='result__form-input-title'>Voedselbank:</p>
        <input class='result__form-input js-edit-foodbank' value=" . $row['voedselbank'] . "><br>";
        echo '<button class="add-client__button js-edit-button">Edit</button>';
    } else {
        echo "geen user gevonden met deze vingerprint";
    }
?>
