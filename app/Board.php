<?php

namespace App;

use Piece;

interface boardInterface {
    public function getX () : int; // Returns X value
    public function getY () : int; // Returns Y value
    public function getPiece(); // Returns piece colour
    public function putPiece(); // Puts new piece in board
    public function cleanBoard(); // Cleans the board
    public function undo(); // Undo last movement
}

class Board implements boardInterface {
    protected $board;
    protected int $lenX;
    protected int $lenY;

    public function __construct(int $inputLenX = 7, int $inputLenY = 7) {
        if($inputLenX < 4 || $inputLenY < 4) 
            throw new \Exception ("Board size must be 4 or more");
        
        $this->lenX = $inputLenX;
        $this->lenY = $inputLenY;
        $this->cleanBoard();
    }
    
    public function getX () : int{
        return $this->lenX;
    }

    public function getY () : int{
        return $this->lenY;
    }
    
    public function cleanBoard(){
        for($x = 0; $x < $this->getX(); $x++){
            for($y = 0; $y < $this->getY(); $y++){
                $this->tablero[$x][$y] = "0";
            }
        }
    }

    public function getPiece(){

    }

    public function putPiece(){

    }

    public function undo(){

    }

    public function showCell(int $x,int $y){

        if($x > $this->getX() || $y > $this->getY()){
            throw new \Exception("Value out of bounds");
        }

        if($this->board[$x][$y] == "0"){
            return $this->board[$x][$y];
        }
        else{
            return $this->board[$x][$y]->getColor();
        }
    }

    public function showBoard(){
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