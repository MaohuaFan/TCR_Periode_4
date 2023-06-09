<?php
// Auteur: Maohua Fan
// Functie: Verwijder een film op basis van de film

include 'functions.php';
echo "<h1>Update Film</h1>";

// Haal film uit de database
if(isset($_GET['filmid'])){
    DeleteFilm($_GET['filmid']);

    echo '<script>alert("Filmid: ' . $_GET['filmid'] . ' is verwijderd")</script>';
    echo "<script> location.replace('CRUD_Film.php'); </script>";
}
?>

