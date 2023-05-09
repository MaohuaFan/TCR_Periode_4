<?php

    require_once 'Movie.php';

    $movie1 = new Movie(name:'Avatar', genre:'fantasy', seen:5);

    echo $movie1->getName();
?>