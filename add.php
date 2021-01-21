<input class="add-client__input js-add-name" type="text" placeholder="Naam">
<input class="add-client__input js-add-box" type="number" placeholder="Box">
<input class="add-client__input js-add-size" type="number" placeholder="Grootte gezin">
<input class="add-client__input js-add-allergy" type="text" placeholder="Allergie">
<input class="add-client__input js-add-preferences" type="text" placeholder="Voorkeuren">

<?php 

   //haal de config.php op zodat we connectie hebben met de database
   require 'includes/config.php';

   //selecteer de rij waar username $u is
   $query = "SELECT * FROM `vingerid` WHERE id = '1'";

   //vuur de query naar de database
   $result = mysqli_query($mysqli, $query);

   if ($row = mysqli_fetch_assoc($result)) 
   {
        echo "<input class='add-client__input js-add-fingerprint' value =" . $row['vinger_id']  . " type='number' placeholder='Vingerafdruk' readonly>";
   }
?>

<input class="add-client__input js-add-foodbank" type="number" placeholder="voedselbank toevoegen">