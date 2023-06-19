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
        var_dump($row);
?>

<html>
    <body>
        <form method="post">
        <br>
        <input type="hidden" name="filmid" value="<?php echo $row[0]['filmid'];?>"><br>
        Filmnaam:<input type="text" name="filmnaam" value="<?php echo $row[0]['filmnaam'];?>"><br> 
        <?php
                dropDownGenre('genrenaam', ['genrenaam']);
        ?>
        Releasejaar: <input type="number" name="releasejaar" value="<?= $row[0]['releasejaar']?>"><br>
        <?php
                dropDownRegisseur('regisseur', $row[0]['regisseur']);
                dropDownLand('landherkomst', $row[0]['landherkomst']);
        ?>
        Duur: <input type="number" name="duur" value="<?= $row[0]['duur']?>"><br>
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