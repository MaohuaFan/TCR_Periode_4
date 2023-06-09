<?php
// Functie: Delete Brouwer
// Auteur: MHF  

// Initialisatie
#include 'functions.php';
require_once('functions.php');

// Main


// Print ---
echo '<h1> Verwijder Brouwer </h1>';

if(isset($_GET['brouwcode'])){
    echo '<br> Data uit het vorige formulier: <br>';
    // Haal alle info van de betreffende brouwcode $_GET['brouwcode']
    $brouwcode = $_GET['brouwcode'];
    $row = GetBrouwer($brouwcode);
    echo '<table border = 1px>';
        echo '<tr>';
            foreach ($row as  $value) {
                echo '<td>' . $value . '</td>';
            } 
        echo '</tr>';
    echo '</table>';
} else {
    echo 'Geen brouwcode opgegeven';
}

// Test of er op de wijzig-knop is gedrukt
if(isset($_POST) && isset($_POST['submit'])){
    DeleteBrouwer($brouwcode);
    
    header("location:crud_brouwer.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Brouwer</title>
</head>
<body>
    <form action="#" method="post">
        <input type="number" name="brouwcode" value="<?php echo $_GET['brouwcode']?>" id="0" hidden required><br>
        <input type="submit" name="submit" value="Verwijder" id="submit">
        <a href="crud_brouwer.php">Terug naar overzicht</a>
    </form>    
</body>
</html>
