<?php
// Functie: Update Brouwer
// Auteur: MHF

// Initialisatie
#include 'functions.php';
require_once('functions.php');

// Main


// Print ---
echo '<h1> Update Brouwer </h1>';

// Test of er op de wijzig-knop is gedrukt
if(isset($_POST) && isset($_POST['submit'])){
    UpdateBrouwer($_POST);

    #header("location:crud_brouwer.php"); 
}

if(isset($_GET['brouwcode'])){
    echo '<br> Data uit het vorige formulier: <br>';
    // Haal alle info van de betreffende brouwcode $_GET['brouwcode']
     $brouwcode = $_GET['brouwcode'];
     $row = GetBrouwer($brouwcode);    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Brouwer</title>
</head>
<body>
    <form action="#" method="post">
        <input type="number" name="brouwcode" value="<?php echo $_GET['brouwcode']?>" id="0" hidden required><br>
        <label for="1">Brouwernaam: </label><input type="text" name="brouwernaam" value="<?=$row['naam']?>" id="1" required><br>
        <?php 
            dropDown('land', GetData('brouwer'), 'land');
        ?>
        <input type="submit" name="submit" value="Wijzigen" id="submit">
</form>
    <a href="crud_brouwer.php">Terug naar overzicht</a>
    <?php
    } else {
        echo 'Geen brouwcode opgegeven';
    }
    ?>
</body>
</html>
