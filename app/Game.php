<?php

namespace App;

use App\Board;

interface gameInterface {
    public function horizontal(Board $board) : bool; // Reads if there is a horizonal 4-in-row in the board
    public function vertical(Board $board) : bool; // Reads if there is a vertical 4-in-row in the board
    public function diagonal(Board $board) : bool; // Reads if there is a diagonal 4-in-row in the board
    public function winner(Board $board); // Sets the winner and ends the game
}

class Game implements gameInterface {
    protected $board;
    
    public function __construct (Board $newBoard) {
        $this->board = $newBoard->board;
    }

    public function horizontal($board) : bool {
        return TRUE;
    }

    public function vertical($board) : bool {
        return TRUE;
    }

    public function diagonal($board) : bool {
        return TRUE;
    }

    public function winner($board) {

    }
}


?>