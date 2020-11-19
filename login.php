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
        <p>Login</p>
    </div>

    <div class="login-form">
        <input class="login-form__input js-username" type="text" placeholder="Naam">
        <input class="login-form__input js-password" type="password" placeholder="Password">
        <button class="login-form__button js-login">Login</button>
    </div>

    <?php 
        //haal de config.php op zodat we connectie hebben met de database
        require 'includes/config.php';

        //selecteer de rij waar username $u is
        $query = "SELECT * FROM `admin` WHERE naam = 'nick'";

        //vuur de query naar de database
        $result = mysqli_query($mysqli, $query);

        //als de query succesvol is gaat die in deze if statement
        if ($row = mysqli_fetch_assoc($result)) 
        {
            echo $row['naam'];   
            echo $row['password'];
        }


        $password = "test1";

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        var_dump($hashed_password);
        
        ?>

    <script src="assets/js/login.js"></script>
</body>
</html>