<?php
// Functie: ---
// Auteur: ---   

// Initialisatie
#include 'functions.php';
require_once('functions.php');

// Main


// Print ---
echo '<h1> Insert Bier </h1>';

// Test of er op de wijzig-knop is gedrukt
if(isset($_POST) && isset($_POST['submit'])){
    InsertBier($_POST);

    #header("location:crud_bieren.php"); 

    //header("location:update.php?$_POST[NR]"); 
}    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="#" method="post">
            <!--<label for="0">Biercode: </label>--><input type="number" name="biercode" value="9999" id="0" hidden required><br>
            <label for="1">Biernaam: </label><input type="text" name="biernaam" value="" id="1" required><br>
            <label for="2">Soort: </label><input type="text" name="soort" value="" id="2" required><br>
            <label for="3">Stijl: </label><input type="text" name="stijl" value="" id="3" required><br>
            <label for="4">Alcohol %: </label><input type="number" name="alcohol" value="" id="4" required><br>
            <?php 
                dropDown('brouwcode', GetData('brouwer', '',), '');
            ?>
            <input type="submit" name="submit" value="Wijzigen" id="submit">
        </form>
    <a href="crud_bieren.php">Terug naar crud bieren</a>
    </body>
</html>
