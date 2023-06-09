<?php
    class Product
    {
        public $name;
        public $price;
        public $category;

        public function __construct($name, $price, $category)
        {
            $this->name = ucfirst($name);
            $this->price = $price;
            $this->category = strtoupper($category);
        }

        public function formatPrice()
        {
            return number_format($this->price, decimals:2);
        }
    }

    $fruitsoort1 = new Product(name:"fruitsoort 1", price:40, category:"category 1");
    $fruitsoort2 = new Product(name:"fruitsoort 2", price:10, category:"category 2");
    $fruitsoort3 = new Product(name:"fruitsoort 3", price:20, category:"category 3");
    $fruitsoort4 = new Product(name:"fruitsoort 4", price:30, category:"category 4");

    echo $frisdrank1->formatPrice()."<br>";
    echo $frisdrank1->name."<br>";
    echo $frisdrank1->price."<br>";
    echo $fruitsoort1->category. "<br><br>";

    echo $frisdrank2->formatPrice()."<br>";
    echo $frisdrank2->name. "<br>";
    echo $frisdrank2->price."<br>";
    echo $fruitsoort2->category. "<br><br>";

    echo $frisdrank3->formatPrice()."<br>";
    echo $frisdrank3->name. "<br><br>";
    echo $frisdrank3->price."<br>";
    echo $fruitsoort3->category. "<br><br>";


    $fruitsoort1->setName(name:"fruitsoort_1");
    echo $frisdrank1->name. "<br><br>";

    var_dump($frisdrank1);
    var_dump($frisdrank2);
    var_dump($frisdrank3);
    var_dump($frisdrank4);
?>