<?php 
class ListenList {
    public array $Music = [];

    public function AddMusic($music) {
        if($this->CheckMusic($music)) {
            $this->Music [] = $music;
        }
        //return $music;
    }

    private function CheckMusic($Music) {
        if(in_array($Music, $this->Music)) {
            return false;
        }
        else {
            return true;
        }
    }
}

?>

