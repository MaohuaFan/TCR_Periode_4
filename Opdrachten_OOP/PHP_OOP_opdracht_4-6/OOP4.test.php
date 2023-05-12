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

        public function setCategory()
        {
            $this->category = strtoupper($category);
        }
    }

    $fruitsoort1 = new Product();
    $fruitsoort1->setName(name:"fruitsoort 1");
    $fruitsoort1->price = 40;
    $fruitsoort1->category = "category 1";

    $fruitsoort2 = new Product();
    $fruitsoort2->setName(name:"fruitsoort 2");
    $fruitsoort2->price = 10;
    $fruitsoort2->category = "category 2";


    echo "<br>".$fruitsoort1->formatPrice(). "<br>";
    echo $fruitsoort1->name. "<br>";
    echo $fruitsoort1->price. "<br>";
    echo $fruitsoort1->category. "<br><br>";


    echo $fruitsoort2->formatPrice(). "<br>";
    echo $fruitsoort2->name. "<br>";
    echo $fruitsoort2->price. "<br>";
    echo $fruitsoort2->category. "<br><br>";

    
    var_dump($fruitsoort1);
    var_dump($fruitsoort2);
?>