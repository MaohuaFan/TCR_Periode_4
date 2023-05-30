<?php
// Functie: Delete CRUD
// Auteur: MHF   

// Initialisatie
require_once('functions.php');

// Main
    // Print Delete CRUD
    echo '<h1>Delte CRUD Row</h1>';

    if(isset($_GET['biercode'])){
        echo '<br> Data uit het vorige formulier: <br>';
        // Haal alle info van de betreffende biercode $_GET['biercode']
        $biercode = $_GET['biercode'];
        $row = GetCRUD($biercode);
        echo '<table border = 1px>';
            echo '<tr>';
                foreach ($row as  $value) {
                    echo '<td>' . $value . '</td>';
                } 
            echo '</tr>';
        echo '</table>';
    } else {
        echo 'Geen biercode opgegeven';
    }

    // Test of er op de wijzig-knop is gedrukt
    if(isset($_POST) && isset($_POST['submit'])){
        DeleteCRUD($biercode);
        header("location:CRUD_Overzicht.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete CRUD</title>
</head>
<body>
    <form action="#" method="post">
        <input type="number" name="biercode" value="<?php echo $_GET['biercode']?>" id="0" hidden required><br>
        <input type="submit" name="submit" value="Verwijder" id="submit">
        <a href="CRUD_Overzicht.php">Terug naar CRUD Overzicht</a>
    </form>    
</body>
</html>
