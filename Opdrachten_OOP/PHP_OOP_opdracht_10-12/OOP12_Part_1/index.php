<?php
    declare(strict_types=1);

    require_once 'Movie.php';

    require_once 'WatchList.php';

    $piet = new WatchList();

    $movie1 = new Movie(name:'Avatar', genre:'fantasy', seen:5);
    $movie2 = new Movie(name:'Pirates', genre:'fantasy', seen:1);

    $piet->addMovie($movie1);
    $piet->addMovie($movie2);

    echo $movie1->getName();

    var_dump($piet);
?>