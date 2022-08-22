<?php

namespace App;

use Piece;

interface boardInterface {
    public function getX () : int;
    public function getY () : int;
    public function getPiece();
    public function putPiece();
    public function clean();
    public function undo();
}

class Board implements boardInterface {
    protected int $lenX;
    protected int $lenY;
    
    public function getX () : int{

        return $this->lenX;
    }

    public function getY () : int{

        return $this->lenY;
    }

    public function getPiece(){

    }

    public function putPiece(){

    }

    public function clean(){

    }

    public function undo(){

    }

}
?>