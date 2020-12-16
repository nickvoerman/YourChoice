<?php
    require 'includes/config.php';
    require 'includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FingerScanner</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div id="properties" class="properties inactive">
      <div class="property">
        Connected: <span id="connected" class="value"></span>
      </div>
      <div class="property">
        Button A: <span id="buttonA" class="value"></span>
      </div>

      <div class="property">
        Button B: <span id="buttonB" class="value"></span>
      </div>

      <div class="property">
        Accelerometer: X:<span id="acc_X" class="value"></span>, Y:<span id="acc_Y" class="value"></span>, Z:<span id="acc_Z" class="value"></span>
      </div>

      <div class="property">
        Temperature: <span id="temp" class="value"></span>
      </div>

      <div class="property">
        Magnetometer bearing: <span id="bearing" class="value"></span>
      </div>

    </div>
    <button id="searchButton" onClick="searchDevice()">search device</button>
    
    <div class="header">
        <p>Dashboard</p>
        <p style="cursor:pointer;user-select:none;"><a href="includes/logout.php">Logout</a></p>
    </div>

    <div class="result">
    
        <img class="result__image" src="assets/img/user3.jpg" alt="Profile Picture">
        <div class="result__form">

            <?php 
            //haal de config.php op zodat we connectie hebben met de database
            require 'includes/config.php';

            //selecteer de rij waar username $u is
            $query = "SELECT * FROM `klant` WHERE naam = 'Younes'";

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
            }
            ?>

            <button class="add-client__button js-edit-button">Edit</button>

        </div>

        <div class="result__logo">
            <p>YourChoice</p>
        </div>
    </div>

    <div class="header">
        <p>Klant toevoegen?</p>
    </div>

    <div class="add-client">
        <div class="add-client__form">
            <input class="add-client__input js-add-name" type="text" placeholder="Naam">
            <input class="add-client__input js-add-box" type="number" placeholder="Box">
            <input class="add-client__input js-add-size" type="number" placeholder="Grootte gezin">
            <input class="add-client__input js-add-allergy" type="text" placeholder="Allergie">
            <input class="add-client__input js-add-preferences" type="text" placeholder="Voorkeuren">
            <input class="add-client__input js-add-fingerprint" type="number" placeholder="Vingerafdruk toevoegen">
            <input class="add-client__input js-add-foodbank" type="number" placeholder="voedselbank toevoegen">

            <button class="add-client__button js-add-user-button">Voeg toe</button>
        </div>
    </div>

<script src="assets/js/main.js"></script>
<script src="assets/js/microBit.js"></script>
<script>
microBit=new uBit();

microBit.onConnect(function(){
  console.log("connected");

  document.getElementById("connected").innerHTML="true";
  document.getElementById("properties").classList.toggle('inactive');
});
  microBit.onDisconnect(function(){
  console.log("disconnected");
  document.getElementById("connected").innerHTML="false";
});
microBit.onBleNotify(function(){
  document.getElementById("buttonA").innerHTML=microBit.getButtonA();
  document.getElementById("buttonB").innerHTML=microBit.getButtonB();

  document.getElementById("acc_X").innerHTML=microBit.getAccelerometer().x;
  document.getElementById("acc_Y").innerHTML=microBit.getAccelerometer().y;
  document.getElementById("acc_Z").innerHTML=microBit.getAccelerometer().z;

  document.getElementById("temp").innerHTML=microBit.getTemperature();
  document.getElementById("bearing").innerHTML=microBit.getBearing();
})


function searchDevice(){
  microBit.searchDevice();
}
</script>
</body>
</html>