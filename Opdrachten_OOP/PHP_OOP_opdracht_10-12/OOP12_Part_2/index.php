<?php
    declare(strict_types=1);
    
    require_once 'Music.php';

    require_once 'WatchList.php';

    $piet = new WatchList();

    $music1 = new Music (name: 'Bach', genre:'Klassiek', listen: 3);
    $movie2 = new Movie(name:'Pirates', genre:'fantasy', seen:1);

    $piet->addMovie($movie1);
    $piet->addMovie($movie2);
    
    echo $music1->getName()."<br><br>";
    
    var_dump($music1);
?>