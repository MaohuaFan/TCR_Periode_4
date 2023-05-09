<?php
    class Product
    {
        public $name;
        public $price;
        public $currency;

        public function __construct($price, $name = "een muzieksoort", $currency = "&euro")
        {
            $this->name = ucfirst($name);
            $this->price = $price;
            $this->currency = $currency;
        }

        public function formatPrice()
        {
            return number_format($this->price, decimals:2);
        }

        public function getProduct()
        {
            return "Het product ".$this->name." kost ".$this->currency." ".$this->price;
        }
    }

    $muzieksoort1 = new Product(price:40, currency:"€", name:"muzieksoort 1");
    $muzieksoort2 = new Product(price:10, currency:"€", name:"muzieksoort 2");
    $muzieksoort3 = new Product(price:50, currency:"€", name:"muzieksoort 3");
    echo $muzieksoort1->getProduct()."<br>";
    echo $muzieksoort2->getProduct()."<br>";
    echo $muzieksoort3->getProduct()."<br><br>";
    //$muzieksoort2 = new Product(price:10, name:"muzieksoort 2");

//    echo "<br>".$muzieksoort1->name."<br>";
//    echo $muzieksoort1->currency."<br>";
//    echo $muzieksoort1->price."<br><br>";

    //echo $muzieksoort2->formatPrice(). "<br>";
    //echo $muzieksoort2->name. "<br>";
    //echo $muzieksoort2->price. "<br><br>";
    
    var_dump($muzieksoort1);
    //var_dump($muzieksoort2);
?>