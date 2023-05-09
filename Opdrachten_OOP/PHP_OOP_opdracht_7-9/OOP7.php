<?php
    class Product
    {

        public function __construct(public $price, public $name = "een muzieksoort", public $currency = "&euro")
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

    $muzieksoort1 = new Product(price:40, currency:"€", name:"muzieksoort 1");
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