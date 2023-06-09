<?php

class ListenList
{
    public array $music = [];

    public function addMusic($music)
    {
        $this->music [] = $music;
    }
}

?>