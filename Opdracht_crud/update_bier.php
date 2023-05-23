<?php
// Functie: ---
// Auteur: ---   

// Initialisatie
#include 'functions.php';
require_once('functions.php');

// Main


// Print ---
echo '<h1> Update brouw </h1>';

// Test of er op de wijzig-knop is gedrukt
if(isset($_POST) && isset($_POST['submit'])){
    UpdateBrouwer($_POST);

    #header("location:crud_brouwen.php"); 

    //header("location:update.php?$_POST[NR]"); 
}

if(isset($_GET['brouwcode'])){
    echo '<br> Data uit het vorige formulier: <br>';
    // Haal alle info van de betreffende brouwcode $_GET['brouwcode']
     $brouwcode = $_GET['brouwcode'];
     $row = GetBrouwer($brouwcode);



    #echo "Data uit het vorige formulier: <br>"; ^^^
    #$row = Getbrouw($_GET['brouwcode']); ^^^
    #echo "<br>"; ^^^

    #var_dump($row);
    #echo "brouwcode: " . $_GET['brouwcode'] . "<br>";
    #echo "Debug information var_dump <br>";
    #var_dump($_POST);
    #echo "<br>";
    #var_dump($_GET);
    #echo "<br>";

    // <!php echo $row['naam']!>" -> <!= $row['naam']!> ////  !-teken staat voor de ? /// ! => ? 

    
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
        <!--<label for="0">brouwcode: </label>--><input type="number" name="brouwcode" value="<?php echo $_GET['brouwcode']?>" id="0" hidden required><br>
        <label for="1">brouwnaam: </label><input type="text" name="brouwnaam" value="<?=$row['naam']?>" id="1" required><br>
        <label for="2">Soort: </label><input type="text" name="soort" value="<?=$row['soort']?>" id="2" required><br>
        <label for="3">Stijl: </label><input type="text" name="stijl" value="<?=$row['stijl']?>" id="3" required><br>
        <label for="4">Alcohol %: </label><input type="number" name="alcohol" value="<?=$row['alcohol']?>" id="4" required><br>
        <?php 
            dropDown('brouwcode', GetData('brouwer', ''), 'brouwcode');
        ?>
        <!--
        <label for="5">Brouwcode: </label><select name="brouwcode" id="5">
            >?php
                OptionsBrouwcode();
            ?<
        </select><br>-->
        <input type="submit" name="submit" value="Wijzigen" id="submit">
</form>
    <a href="crud_brouwen.php">Terug naar crud brouwen</a>
    <?php
    } else {
        echo 'Geen brouwcode opgegeven';
    }
    ?>
</body>
</html>
