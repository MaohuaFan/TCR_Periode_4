<?php
    // Auteur: Maohua Fan
    // Functie:

    include 'functions.php';
    session_start();

    Login();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign In</title>
</head>
<body>
    <section>
        <h1>Log in</h1>
        <form action="#" method="post">
                <label for="username">Username: <input type="text" name="username"></label><br>
                <label for="password">Password: <input type="password" name="password"></label><br>
                <input type="submit" value="Submit">
            </form><br><br>
        <a href="SignUp.php">Sign up</a>
    </section>
</body>
</html>


