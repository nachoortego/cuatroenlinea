<?php

namespace App;

include 'Board.php';

interface gameInterface {
    public function play(); // Plays the game for 2 players
    public function horizontal() : bool; // Reads if there is a horizonal 4-in-row in the board
    public function vertical() : bool; // Reads if there is a vertical 4-in-row in the board
    public function diagonal() : bool; // Reads if there is a diagonal 4-in-row in the board
    public function winner(string $player) : bool; // Sets the winner and ends the game
}

class Game implements gameInterface {
    protected $board;
    
    public function __construct (Board $newBoard) {
        $this->board = $newBoard;
    }

    public function play() {
        $player = "Blue";
        $redPiece = new Piece("🟥");
        $bluePiece = new Piece("🟦");
        ($this->board)->showBoard();
        print("The game has started. Write 'remove' anytime to remove a piece.\n\n");
        while (TRUE) {
            $text = $player . " turn. \n";
            print($text);
            $column = readline("Choose a column to put a new piece: ");

            if(strcmp($column, 'remove') == 0) {
                $column = readline("Choose a column to remove a piece: ");
                ($this->board)->removePiece($column);
            }
            else {
                if($player == "Blue")
                    ($this->board)->putPiece($column, $bluePiece);
                if($player == "Red")
                    ($this->board)->putPiece($column, $redPiece);
            }

            ($this->board)->showBoard();

            if(!$this->winner($player))
                if(strcmp($player,"Blue") == 0)
                    $player = "Red";
                else
                    $player = "Blue";
            else 
                break;
        }
    }

    public function compare($x, $y, $color) {
        return strcmp((($this->board)->getBoard()[$x][$y])->getColor(), "$color") == 0;
    }

    public function horizontal() : bool {
        $red = 0;
        $blue = 0;

        for($y = ($this->board)->getY()-1; $y >= 0; $y--){
            for($x = 0; $x < ($this->board)->getX(); $x++){
                if(($this->board)->isPiece($x,$y)) {
                    if($this->compare($x, $y, "🟥") /*R*/) {
                        $red++;
                        $blue == 0;
                        if($red == 4)
                            return TRUE;
                    }
                
                    if($this->compare($x, $y, "🟦") /*B*/) {
                        $blue++;
                        $red = 0;
                        if($blue == 4)
                            return TRUE;
                    }
                }
                else {
                    $red = 0;
                    $blue = 0;
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
                if(($this->board)->isPiece($x,$y)) {
                    if($this->compare($x, $y, "🟥") /*R*/) {
                        $red++;
                        $blue == 0;
                        if($red == 4)
                            return TRUE;
                    }
                    if($this->compare($x, $y, "🟦") /*B*/) {
                        $blue++;
                        $red = 0;
                        if($blue == 4)
                            return TRUE;
                    }
                }
                else {
                    $red = 0;
                    $blue = 0;
                }
            }
        }
        
        return FALSE;    
    }

    public function diagonal() : bool {
        return FALSE;
    }

    public function winner(string $player) : bool{
        if($this->horizontal() || $this->vertical() || $this->diagonal()){
            $text = "The winner is " . $player;
            print($text);
            return TRUE;
        }
        else return FALSE;
    }
}

$tablero = new Board;
$juego = new Game($tablero);
$juego->play();


?>