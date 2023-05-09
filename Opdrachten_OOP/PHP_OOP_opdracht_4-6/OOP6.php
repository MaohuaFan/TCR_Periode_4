<?php
    class Product
    {
        public $name;
        public $price;
        public $currency;

        public function __construct($price, $name = "een fruitsoort", $currency = "&euro")
        {
            $this->name = ucfirst($name);
            $this->price = $price;
            $this->currency = $currency;
        }

        public function formatPrice()
        {
            return number_format($this->price, decimals:2);
        }
    }

    $fruitsoort1 = new Product(price:40, currency:"€", name:"fruitsoort 1");
    //$fruitsoort2 = new Product(price:10, name:"fruitsoort 2");

    //echo "<br>".$fruitsoort1->formatPrice(). "<br>";
    //echo $fruitsoort1->name. "<br>";
    //echo $fruitsoort1->price. "<br><br>";

    //echo $fruitsoort2->formatPrice(). "<br>";
    //echo $fruitsoort2->name. "<br>";
    //echo $fruitsoort2->price. "<br><br>";
    
    var_dump($fruitsoort1);
    //var_dump($fruitsoort2);
?>