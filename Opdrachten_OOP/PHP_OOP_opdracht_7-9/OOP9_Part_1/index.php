<?php

    require_once 'Movie.php';

    $movie1 = new Movie(name:'4', ['fantasy','sf'], seen:5);

    echo $movie1->getName();

    var_dump($movie1)
?>