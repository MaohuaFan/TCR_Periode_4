<?php
// Functie: Update CRUD
// Auteur: MHF

// Initialisatie
require_once('functions.php');

// Main
    // Print Update CRUD
    echo '<h1> Update Bier </h1>';

    # Test of er op de wijzig-knop is gedrukt
    if(isset($_POST) && isset($_POST['submit'])){
        GetCRUD(0,'',$row);

        #header("location:CRUD_Overzicht.php"); 
    }

    if(isset($_GET['biercode'])){
        echo '<br> Data uit het vorige formulier: <br>';
        # Haal alle info van de betreffende biercode $_GET['biercode']
        $biercode = $_GET['biercode'];
        #$filter = " biercode = $biercode";
        #$row = GetData('bier','', $filter);
        $row = GetBier($biercode);
        #var_dump($row);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update CRUD</title>
</head>
<body>
    <form action="#" method="post">
        <input type="number" name="biercode" value="<?php echo $_GET['biercode']?>" id="0" hidden required><br>
        <label for="1">Naam: </label><input type="text" name="naam" value="<?=$row['naam']?>" id="1" required><br>
        <label for="2">Soort: </label><input type="text" name="soort" value="<?=$row['soort']?>" id="2" required><br>
        <label for="3">Stijl: </label><input type="text" name="stijl" value="<?=$row['stijl']?>" id="3" required><br>
        <label for="4">Alcohol %: </label><input type="number" name="alcohol" value="<?=$row['alcohol']?>" id="4" required><br>
        <?php 
            $ColumnId = "brouwcode";
            dropDown("$ColumnId","$ColumnId", GetData("brouwer","","",""), "$ColumnId");
        ?>
        <br><input type="submit" name="submit" value="Wijzigen" id="submit">
</form>
<a href="CRUD_Overzicht.php">Terug naar overzicht</a>
    <?php
    /*} else {
        echo 'Geen biercode opgegeven';
    }*/
    ?>
</body>
</html>
