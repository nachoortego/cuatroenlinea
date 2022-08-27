<?php

namespace App;

//use App\Piece;

interface boardInterface {
    public function getX () : int; // Returns X value
    public function getY () : int; // Returns Y value
    public function isPiece(int $x, int $y) : bool; // Returns if the cell is occupied
    public function getPiece(int $x, int $y) : Piece; // Returns piece object
    public function putPiece(int $x, int $y, Piece $piece); // Puts new piece in board
    public function removePiece(int $x, int $y); // Removes a piece
    public function cleanBoard(); // Cleans the board
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

    public function putPiece(int $x, int $y, Piece $piece){ // Finish
        $this->board[$x][$y] = $piece;
    }

    public function removePiece(int $x, int $y){ // Finish
        $this->board[$x][$y] = "⬜";
    }

    public function showCell(int $x,int $y){

        if($x > $this->getX() || $y > $this->getY()){
            throw new \Exception("Value out of bounds");
        }

        if($this->board[$x][$y] == "⬜"){
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

$board = new Board;
$piece1 = new Piece("🟦");
$board->putPiece(3,3,$piece1);
$board->showBoard();
print($board->isPiece(3,3));


?>