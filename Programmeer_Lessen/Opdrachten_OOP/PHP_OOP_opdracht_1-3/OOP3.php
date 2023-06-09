<?php
    class Product
    {
        public $name;
        public $price;

        public function formatPrice()
        {
            return number_format($this->price, decimals:2);
        }
    }

    $frisdrank1 = new Product();
    $frisdrank1->name = "Frisdrank 1";
    $frisdrank1->price = 40;

    $frisdrank2 = new Product();
    $frisdrank2->name = "Frisdrank 2";
    $frisdrank2->price = 10;

    $frisdrank3 = new Product();
    $frisdrank3->name = "Frisdrank 3";
    $frisdrank2->price = 20;
    
    $frisdrank4 = new Product();
    $frisdrank4->name = "Frisdrank 4";
    $frisdrank2->price = 30;

    echo $frisdrank1->formatPrice()."<br>";
    echo $frisdrank1->name."<br>";
    echo $frisdrank1->price."<br>";

    echo $frisdrank2->formatPrice()."<br>";
    echo $frisdrank2->name. "<br>";
    echo $frisdrank2->price."<br>";

    echo $frisdrank3->formatPrice()."<br>";
    echo $frisdrank3->name. "<br><br>";
    echo $frisdrank3->price."<br>";


    $frisdrank1->name = "Frisdrank_1";
    echo $frisdrank1->name. "<br><br>";

    var_dump($frisdrank1);
    var_dump($frisdrank2);
    var_dump($frisdrank3);
    var_dump($frisdrank4);
?>