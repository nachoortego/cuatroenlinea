<?php

namespace App;

include 'Piece.php';

interface boardInterface {
    public function getX () : int; // Returns X value
    public function getY () : int; // Returns Y value
    public function cleanBoard(); // Cleans the board
    public function isPiece(int $x, int $y) : bool; // Returns if the cell is occupied
    public function getPiece(int $x, int $y) : Piece; // Returns piece object
    public function putPiece($x, Piece $piece); // Puts new piece in board
    public function removePiece($x); // Removes a piece
}

class Board implements boardInterface {
    protected $board;
    protected $lenX = 7;
    protected $lenY = 6;
    
    public function __construct() {
        $this->cleanBoard();
    }

    public function getBoard() {
        return $this->board;
    }
    
    public function getX() : int{
        return $this->lenX;
    }

    public function getY() : int{
        return $this->lenY;
    }
    
    public function cleanBoard(){
        $white = new Piece();
        for($x = 0; $x < $this->getX(); $x++){
            for($y = 0; $y < $this->getY(); $y++){
                $this->board[$x][$y] = $white;
            }
        }
    }
    
    public function isPiece(int $x, int $y) : bool {
        return ($this->board[$x][$y])->getColor() != "⬜";
    }

    public function getPiece(int $x, int $y) : Piece {
        return $this->board[$x][$y];
    }

    public function putPiece($x, Piece $piece){
        if(!is_numeric($x) || $x < 1 || $x > 7)
            throw new \Exception ("🚨 Position must be a number from 1 to 7");
        $x--;
        for($y = $this->getY()-1; $y >= 0; $y--){
            if(!($this->isPiece($x, $y))){
                $this->board[$x][$y] = $piece;
                break;
            }
        }
    }

    public function removePiece($x){
        if(!is_numeric($x) || $x < 1 || $x > 7)
            throw new \Exception ("🚨 Position must be a number from 1 to 7");
        $white = new Piece();
        $x--;
        for($y = 0; $y < $this->getY(); $y++){
            if($this->isPiece($x, $y)){
                $this->board[$x][$y] = $white;
                break;
            }
        }
    }

    public function showBoard(){
        print("\n\n");
        for($y = 0; $y < $this->getY(); $y++){
            for($x = 0;$x < $this->getX(); $x++){
                    print($this->board[$x][$y]->getColor());
            }
            print("\n");
        }
        print("\n\n");
    }

}


?>