<?php
    // Auteur: Maohua Fan
    // Functie: Wijzig een film op basis van de filmid

    require_once('functions.php');
    echo "<h1>Update Film</h1>";

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){
        UpdateFilm($_POST);

        //header("location: CRUD_Film.php");
    }

    if(isset($_GET['filmid'])){  
        // Haal alle info van de betreffende filmid $_GET['filmid']
        $filmid = $_GET['filmid'];
        $row = GetFilm($filmid);
?>

<html>
    <body>
        <form method="post">
        <br>
        <input type="hidden" name="filmid" value="<?php echo $row['filmid'];?>"><br>
        Filmnaam:<input type="text" name="naam" value="<?php echo $row['filmnaam'];?>"><br> 
        <?php
                dropDownGenre('genreid', $row['genreid']);
        ?>
        Releasejaar: <input type="number" name="releasejaar" value="<?= $row['releasejaar']?>"><br>
        <?php
                dropDownRegisseur('regisseur', $row['regisseur']);
                dropDownLand('landherkomst', $row['landherkomst']);
        ?>
        Duur: <input type="number" name="duur" value="<?= $row['duur']?>"><br>
        <br><br>
         <input type="submit" name="btn_wzg" value="Wijzigen"><br>
        </form>
        <br><br>
        <a href='CRUD_Film.php'>Home</a>
    </body>
</html>

<?php
    } else {
        "Geen filmid opgegeven<br>";
    }
?>