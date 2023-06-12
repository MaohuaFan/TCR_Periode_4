<?php
    // Auteur: Maohua Fan
    // Functie:

    include 'functions.php';
    session_start();

    echo "<h1>Welkom op de home-pagina</h1><br>";
    
    #var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home Page</title>
</head>
<body>
    <section>
        <?php
            Overzicht();
        ?>
    </section>
</body>
</html>