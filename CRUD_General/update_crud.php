<?php
// Functie: Update FullCrudName
// Auteur: MHF

// Initialisatie
#include 'functions.php';
require_once('functions.php');

// Main


// Print ---
echo '<h1> Update FullCrudName </h1>';

// Test of er op de wijzig-knop is gedrukt
if(isset($_POST) && isset($_POST['submit'])){
    UpdateFullCrudName();

    #header("location:crud_CrudNaam.php"); 
}

if(isset($_GET['CrudCode'])){
    echo '<br> Data uit het vorige formulier: <br>';
    // Haal alle info van de betreffende CrudCode $_GET['CrudCode']
     $CrudCode = $_GET['CrudCode'];
     $row = GetFullNameCrud($CrudCode);    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update FullCrudName</title>
</head>
<body>
    <form action="#" method="post">
        <input type="number" name="CrudCode" value="<?php echo $_GET['CrudCode']?>" id="0" hidden required><br>
        <label for="1">FullCrudNamenaam: </label><input type="text" name="crudnamenaam" value="<?=$row['naam']?>" id="1" required><br>
        <?php 
            dropDown('land', GetData('','CrudNaam'), 'land');
        ?>
        <br><input type="submit" name="submit" value="Wijzigen" id="submit">
</form>
    <a href="crud_FullCrudName.php">Terug naar overzicht</a>
    <?php
    } else {
        echo 'Geen CrudCode opgegeven';
    }
    ?>
</body>
</html>
