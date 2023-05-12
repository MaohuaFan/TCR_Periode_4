<?php

class Music
{
    public $name;
    public $genre;
    public $listen;

    /**
     * @param string $name
     * @param string $genre
     * @param int $listen
     */

    public function __construct($name, $genre, $listen)
    {
        $this->name = $name;
        $this->genre = $genre;
        $this->listen = $listen;
    }

    public function getName()
    {
        return $this->name;
    }
}

?>