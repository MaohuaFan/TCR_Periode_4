<?php
// Functie: Delete FullCrudName
// Auteur: MHF  

// Initialisatie
#include 'functions.php';
require_once('functions.php');

// Main


// Print ---
echo '<h1> Verwijder CrudNaam </h1>';

if(isset($_GET['CrudCode'])){
    echo '<br> Data uit het vorige formulier: <br>';
    // Haal alle info van de betreffende CrudCode $_GET['CrudCode']
    $brouwcode = $_GET['CrudCode'];
    $row = GetData('','','','');
    echo '<table border = 1px>';
        echo '<tr>';
            foreach ($row as  $value) {
                echo '<td>' . $value . '</td>';
            } 
        echo '</tr>';
    echo '</table>';
} else {
    echo 'Geen CrudCode opgegeven';
}

// Test of er op de wijzig-knop is gedrukt
if(isset($_POST) && isset($_POST['submit'])){
    DeleteFullCrudName($CrudCode);
    
    header("location:crud_CrudNaam.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete FullCrudName</title>
</head>
<body>
    <form action="#" method="post">
        <input type="number" name="CrudCode" value="<?php echo $_GET['CrudCode']?>" id="0" hidden required><br>
        <input type="submit" name="submit" value="Verwijder" id="submit">
        <a href="crud_CrudNaam.php">Terug naar overzicht</a>
    </form>    
</body>
</html>
