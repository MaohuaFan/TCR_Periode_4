<?php
    class Product
    {
        public $name;
        public $price;

        public function setName($name)
        {
            $this->name = ucfirst($name);
        }

        public function formatPrice()
        {
            return number_format($this->price, decimals:2);
        }
    }

    $frisdrank1 = new Product();
    $frisdrank1->setName(name:"frisdrank 1");
    $frisdrank1->price = 40;

    $frisdrank2 = new Product();
    $frisdrank2->setName(name:"frisdrank 2");
    $frisdrank2->price = 10;


    echo "<br>".$frisdrank1->formatPrice(). "<br>";
    echo $frisdrank1->name. "<br>";
    echo $frisdrank1->price. "<br><br>";

    echo $frisdrank2->formatPrice(). "<br>";
    echo $frisdrank2->name. "<br>";
    echo $frisdrank2->price. "<br><br>";
    
    var_dump($frisdrank1);
    var_dump($frisdrank2);
?>