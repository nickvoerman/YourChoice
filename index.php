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
    
        <div class="result__form js-info">

            <?php include_once 'info.php' ?>

        </div>

        <div class="result__logo">
            <p>YourChoice</p>
        </div>
    </div>

    <div class="header">
        <p>Klant toevoegen?</p>
    </div>

    <div class="add-client">
        <div class="add-client__form js-add">
            <?php include_once 'add.php' ?>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>