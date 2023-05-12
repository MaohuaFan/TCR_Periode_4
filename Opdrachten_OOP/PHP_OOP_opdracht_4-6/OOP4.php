<?php
    class Product
    {
        public $name;
        public $price;
        public $category;

        public function setName($name)
        {
            $this->name = ucfirst($name);
        }

        public function formatPrice()
        {
            return number_format($this->price, decimals:2);
        }

        public function setCategory($category)
        {
            $this->category = strtoupper($category);
        }
    }

    $frisdrank1 = new Product($name, $category);
    $fruitsoort1->setName(name:"fruitsoort 1");
    $frisdrank1->price = 40;
    $fruitsoort1->category = "category 1";

    $frisdrank2 = new Product($name, $category);
    $fruitsoort1->setName(name:"fruitsoort 2");
    $frisdrank2->price = 10;
    $fruitsoort2->category = "category 2";

    $frisdrank3 = new Product($name, $category);
    $fruitsoort1->setName(name:"fruitsoort 3");
    $frisdrank2->price = 20;
    $fruitsoort3->category = "category 3";
    
    $frisdrank4 = new Product($name, $category);
    $fruitsoort1->setName(name:"fruitsoort 4");
    $frisdrank2->price = 30;
    $fruitsoort4->category = "category 4";

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