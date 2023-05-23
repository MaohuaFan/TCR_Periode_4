<?php
// Functie: Insert Brouwer
// Auteur: MHF   

// Initialisatie
#include 'functions.php';
require_once('functions.php');

// Main


// Print ---
echo '<h1> Insert Brouwer </h1>';

// Test of er op de wijzig-knop is gedrukt
if(!empty(isset($_POST) && isset($_POST['submit']))){
    InsertBrouwer();
    header("location:crud_brouwer.php"); 
}    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Insert Brouwer</title>
    </head>
    <body>
        <form action="#" method="post">
            <input type="number" name="brouwcode" id="0" hidden><br>
            <label for="1">Brouwnaam: </label><input type="text" name="brouwernaam" value="" id="1" required><br>
            <?php 
                $column = 'DISTINCT land';
                dropDown('land', GetData($column,'brouwer'), 'land');
            ?>
            <br><input type="submit" name="submit" value="Insert" id="submit">
        </form>
    <a href="crud_brouwer.php">Terug naar overzicht</a>
    </body>
</html>
