<?php
    // Functie: Insert CRUD
    // Auteur: MHF

    // Initialisatie
    require_once('functions.php');

    // Main
        // Print Insert CRUD
        echo '<h1> Insert CRUD </h1>';

        // Test of er op de wijzig-knop is gedrukt
        if(isset($_POST) && isset($_POST['submit'])){
            GetCRUD(2,"","");

            #header("location:CRUD_Overzicht.php"); 
        }
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Insert CRUD</title>
        </head>
        <body>
            <form action="#" method="post">
                <input type="number" name="biercode" id="0" hidden><br>
                <label for="1">Naam: </label><input type="text" name="naam" value="" id="1" required><br>
                <label for="2">Soort: </label><input type="text" name="soort" value="" id="2" required><br>
                <label for="3">Stijl: </label><input type="text" name="stijl" value="" id="3" required><br>
                <label for="4">Alcohol %: </label><input type="number" name="alcohol" value="" id="4" required><br>
                <?php 
                    $ColumnId = "brouwcode";
                    dropDown("$ColumnId","$ColumnId", GetData("brouwer","","",""), "$ColumnId");
                ?>
                <br><input type="submit" name="submit" value="Insert" id="submit">
            </form>
            <a href="CRUD_Overzicht.php">Terug naar overzicht</a>
        </body>
    </html>