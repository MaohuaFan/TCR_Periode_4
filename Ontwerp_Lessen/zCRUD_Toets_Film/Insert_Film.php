<?php
    // Auteur: Maohua Fan
    // Functie: Wijzig een film op basis van de filmid

    require_once('functions.php');
    echo "<h1>Insert Film</h1>";

    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){
        InsertFilm($_POST);

        echo '<script>alert("Filmnaam: ' . $_POST['filmnaam'] . ' is toegevoegd")</script>';
        //echo "<script> location.replace('CRUD_Film.php'); </script>";
    }
?>

<html>
    <body>
        <form method="post"><br>
            Filmnaam:<input type="text" name="filmnaam"><br> 
            <?php
                dropDownGenre('genreid', -1);
            ?>
            Releasejaar: <input type="number" name="releasejaar"><br>
            <?php
                dropDownRegisseur('regisseur', -1);
                dropDownLand('landherkomst', -1);
            ?>
            Duur: <input type="number" name="duur"><br><br>
            <input type="submit" name="btn_ins" value="Insert"><br>
        </form><br><br>
        <a href='CRUD_Film.php'>Home</a>
    </body>
</html>
