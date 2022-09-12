<?php

namespace App;

include 'Piece.php';

interface boardInterface {
    public function getX () : int; // Returns X value
    public function getY () : int; // Returns Y value
    public function cleanBoard(); // Cleans the board
    public function isPiece(int $x, int $y) : bool; // Returns if the cell is occupied
    public function getPiece(int $x, int $y) : Piece; // Returns piece object
    public function putPiece(int $x, Piece $piece); // Puts new piece in board
    public function removePiece(int $x); // Removes a piece
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
        for($x = 0; $x < $this->getX(); $x++){
            for($y = 0; $y < $this->getY(); $y++){
                $this->board[$x][$y] = "⬜";
            }
        }
    }
    
    public function isPiece(int $x, int $y) : bool {
        return $this->board[$x][$y] != "⬜";
    }

    public function getPiece(int $x, int $y) : Piece {
        return $this->board[$x][$y];
    }

    public function putPiece(int $x, Piece $piece){
        $x--;
        for($y = $this->getY()-1; $y >= 0; $y--){
            if(!($this->isPiece($x, $y))){
                $this->board[$x][$y] = $piece;
                break;
            }
        }
    }

    public function removePiece(int $x){
        $x--;
        for($y = 0; $y < $this->getY(); $y++){
            if($this->isPiece($x, $y)){
                $this->board[$x][$y] = "⬜";
                break;
            }
        }    
    }

    public function showCell(int $x,int $y){
        if($this->board[$x][$y] == "⬜")
            return $this->board[$x][$y];

        else{
            return $this->board[$x][$y]->getColor();
        }
    }

    public function showBoard(){
        print("\n\n");
        for($y = 0; $y < $this->getY(); $y++){
            for($x = 0;$x < $this->getX(); $x++){
                print($this->showCell($x,$y));
            }
            print("\n");
        }
        print("\n\n");
    }

}



?>