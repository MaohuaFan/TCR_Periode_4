<?php
    class Product
    {
        public $name;
        public $price;
        public $currency;

        public function __construct($price, $name = "een product", $currency = "&euro")
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

    $product1 = new Product(name: "Techo beats", currency: "&euro", price: 2);
    $product2 = new Product(price:10, currency:"€", name:"product 2");
    $product3 = new Product(price:50, currency:"€", name:"product 3");
    echo $product1->getProduct()."<br>";
    echo $product2->getProduct()."<br>";
    echo $product3->getProduct()."<br><br>";
    //$product2 = new Product(price:10, name:"product 2");

//    echo "<br>".$product1->name."<br>";
//    echo $product1->currency."<br>";
//    echo $product1->price."<br><br>";

    //echo $product2->formatPrice(). "<br>";
    //echo $product2->name. "<br>";
    //echo $product2->price. "<br><br>";
    
    var_dump($product1);
    echo"<br>";
    var_dump($product2);
    echo"<br>";
    var_dump($product3);
?>