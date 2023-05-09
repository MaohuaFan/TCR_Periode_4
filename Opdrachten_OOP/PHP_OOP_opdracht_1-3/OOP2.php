<?php
    class Product
    {
        public $name = "Een bepaald frisdrank";
    }

    $frisdrank1 = new Product();
    $frisdrank1->name = "Frisdrank 1";

    $frisdrank2 = new Product();
    $frisdrank2->name = "Frisdrank 2";

    $frisdrank3 = new Product();
    $frisdrank3->name = "Frisdrank 3";
    
    $frisdrank4 = new Product();
    $frisdrank4->name = "Frisdrank 4";


    echo "<br>".$frisdrank1->name. "<br>";
    echo $frisdrank2->name. "<br>";
    echo $frisdrank3->name. "<br><br>";
    
    $frisdrank1->name = "Frisdrank_1";
    echo $frisdrank1->name. "<br><br>";

    var_dump($frisdrank1);
    var_dump($frisdrank2);
    var_dump($frisdrank3);
    var_dump($frisdrank4);
?>