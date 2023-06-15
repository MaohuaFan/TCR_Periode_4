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
    <h1>PHP - PDO Login and Registration</h1>
    <section>
        <h2>Login here...</h2>
        <form action="#" method="post">
                <label for="username">Username: <input type="text" name="username"></label><br>
                <label for="password">Password: <input type="password" name="password"></label><br>
                <input type="submit" value="Login">
            </form><br>
        <a href="Registration.php">Registration</a>
    </section>
</body>
</html>


