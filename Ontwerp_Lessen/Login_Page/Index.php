<?php
    // Auteur: Maohua Fan
    // Functie:

    include 'functions.php';
    session_start();
    
    #var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home Pagina</title>
</head>
<body>

    <section>
        <h1>PDO Login and Registration</h1><br>
        
        <h2>Welkom op de HOME-pagina!</h2>
        <?php
            Overzicht();
        ?>
    </section>
</body>
</html>