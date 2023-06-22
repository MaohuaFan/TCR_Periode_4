<?php 
Class Music
{
    private $name = "";
    private $genre = "";
    private $listen = "";
   /** 
    * @param string $name
    * @param string $genre
    * @param int $listen
   */ 
    public function __construct($name = "Template", $genre = "None", $listen = 0) 
    {
        $this->name = $name;
        $this->genre = $genre;
        $this->listen = $listen;
    }

    function getName() {
        return $this->name;
    } 
}

?>