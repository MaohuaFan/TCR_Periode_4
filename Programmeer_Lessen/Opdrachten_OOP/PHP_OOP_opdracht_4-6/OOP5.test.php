<?php
    class Product
    {
        public $name;
        public $price;

        public function __construct($name, $price)
        {
            $this->name = ucfirst($name);
            $this->price = $price;
        }

        public function formatPrice()
        {
            return number_format($this->price, decimals:2);
        }
    }

    $fruitsoort1 = new Product(name:"fruitsoort 1", price:40);
    $fruitsoort2 = new Product(name:"fruitsoort 2", price:10);

    echo "<br>".$fruitsoort1->formatPrice(). "<br>";
    echo $fruitsoort1->name. "<br>";
    echo $fruitsoort1->price. "<br><br>";

    echo $fruitsoort2->formatPrice(). "<br>";
    echo $fruitsoort2->name. "<br>";
    echo $fruitsoort2->price. "<br><br>";
    
    var_dump($fruitsoort1);
    var_dump($fruitsoort2);
?>