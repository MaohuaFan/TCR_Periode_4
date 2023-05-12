<?php
    declare(strict_types=1);
    
    require_once 'Music.php';

    $music1 = new Music (name: 'Bach', genre:'Klassiek', listen: 3);
    
    echo $music1->getName()."<br><br>";
    
    var_dump($music1);
?>