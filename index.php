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
    
    <div class="header">
        <p>Dashboard</p>
        <p style="cursor:pointer;user-select:none;"><a href="includes/logout.php">Logout</a></p>
    </div>

    <div class="result">
    
        <img class="result__image" src="assets/img/profile.png" alt="Profile Picture">
        <div class="result__form">
            <div class="result__form-input">Naam: ....</div>
            <div class="result__form-input">Box: ....</div>
            <div class="result__form-input">
                <p>Grootte gezin: ....</p>
                <p>Allergie: .... </p>
                <p>Voorkeuren: .... </p>
            </div>
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
            <input class="add-client__input" type="text" placeholder="Naam">
            <input class="add-client__input" type="text" placeholder="Box">
            <input class="add-client__input" type="text" placeholder="Grootte gezin">
            <input class="add-client__input" type="text" placeholder="Allergie">
            <input class="add-client__input" type="text" placeholder="Voorkeuren">
            <input class="add-client__input" type="text" placeholder="Vingerafdruk toevoegen">

            <button class="add-client__button">Voeg toe</button>
        </div>
    </div>

</body>
</html>