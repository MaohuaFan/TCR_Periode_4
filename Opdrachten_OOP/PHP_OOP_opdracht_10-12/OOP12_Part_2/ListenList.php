<?php

class WatchList
{
    public array $movies = [];

    public function addMovie(Movie $movie)
    {
        $this->movies[] = $movie;
    }
}

?>