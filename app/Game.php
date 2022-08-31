<?php

namespace App;

include 'Board.php';

interface gameInterface {
    public function horizontal() : bool; // Reads if there is a horizonal 4-in-row in the board
    public function vertical() : bool; // Reads if there is a vertical 4-in-row in the board
    public function diagonal() : bool; // Reads if there is a diagonal 4-in-row in the board
    public function winner(string $player); // Sets the winner and ends the game
}

class Game implements gameInterface {
    protected $board;
    
    public function __construct (Board $newBoard) {
        $this->board = $newBoard->board;
    }

    public function horizontal() : bool {
        $red = 0;
        $blue = 0;

        for($y = ($this->board)->getY()-1; $y >= 0; $y--){
            for($x = 0; $x < ($this->board)->getX(); $x++){
                if(strcmp(($this->board[$x][$y])->getColor(), "🟥") == 0 /*R*/) {
                    $red++;
                    $blue == 0;
                    if($red == 4)
                        return TRUE;
                }
                if(strcmp(($this->board[$x][$y])->getColor(), "🟦") == 0 /*B*/) {
                    $blue++;
                    $red = 0;
                    if($blue == 3)
                        return TRUE;
                }
            }
        }

        return FALSE;    
    }

    public function vertical() : bool {
        $red = 0;
        $blue = 0;

        for($x = 0; $x < ($this->board)->getX(); $x++){
            for($y = ($this->board)->getY()-1; $y >= 0; $y--){
                if(strcmp(($this->board[$x][$y])->getColor(), "🟥") == 0 /*R*/) {
                    $red++;
                    $blue == 0;
                    if($red == 4)
                        return TRUE;
                }
                if(strcmp(($this->board[$x][$y])->getColor(), "🟦") == 0 /*B*/) {
                    $blue++;
                    $red = 0;
                    if($blue == 4)
                        return TRUE;
                }
            }
        }
        
        return FALSE;    
    }

    public function diagonal() : bool {
        return TRUE;
    }

    public function winner($board) {

    }
}


?>