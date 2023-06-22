<?php 
class ListenList {
    public array $Music = [];

    public function AddMusic($music) {
        $this->Music [] = $music;

        return $music;
    }
}

?>