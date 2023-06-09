<?php
// Functie: Insert FullCrudName
// Auteur: MHF   

// Initialisatie
#include 'functions.php';
require_once('functions.php');

// Main


// Print ---
echo '<h1> Insert FullCrudName </h1>';

// Test of er op de wijzig-knop is gedrukt
if(!empty(isset($_POST) && isset($_POST['submit']))){
    InsertFullCrudName();
    header("location:crud_CrudNaam.php"); 
}    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Insert FullCrudName</title>
    </head>
    <body>
        <form action="#" method="post">
            <input type="number" name="CrudCode" id="0" hidden><br>
            <label for="1">CrudNaamnaam: </label><input type="text" name="CrudNaamnaam" value="" id="1" required><br>
            <?php 
                $column = 'DISTINCT land';
                dropDown('land', GetData($column,'CrudNaam'), 'land');
            ?>
            <br><input type="submit" name="submit" value="Insert" id="submit">
        </form>
    <a href="crud_CrudNaam.php">Terug naar overzicht</a>
    </body>
</html>
