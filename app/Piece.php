<?php

namespace App;

interface pieceInterface {
    public function getColor() : string;
}

class Piece implements pieceInterface {
    protected $color;    

    public function __construct($colorInput) {
        if($colorInput != "🟥" && $colorInput != "🟦" )
            throw new \Exception ("🚨 Piece must be red ('🟥') or blue ('🟦')🚨");

        $this->color = $colorInput;
    }

    public function getColor() : string {
        return $this->color;
    }
}

?>