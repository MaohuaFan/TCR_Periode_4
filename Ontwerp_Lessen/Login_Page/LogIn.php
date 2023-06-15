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
    <title>Login</title>
</head>
<body>
    <section>
        <h1>PHP - PDO Login and Registration</h1>
        <h2>Login here...</h2>
        <form action="#" method="post">
                <label for="username">Username: <input type="text" name="username" required></label><br>
                <label for="password">Password: <input type="password" name="password" required></label><br>
                <input type="submit" value="Login">
            </form><br>
        <a href="Registration.php">Registration</a>
    </section>
</body>
</html>


