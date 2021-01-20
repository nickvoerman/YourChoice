<?php 
    require 'config.php';
    
    $query = "SELECT * FROM `vingerid` WHERE id = '1'";

    //vuur de query naar de database
    $result = mysqli_query($mysqli, $query);
    
    if ($row = mysqli_fetch_assoc($result)) 
    {
        $message = $row['vinger_id'];

        echo $message;
    }
?>