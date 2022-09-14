<?php

namespace App;

include 'Board.php';

interface gameInterface {
    public function play(); // Plays the game for 2 players
    public function colorCompare(int $x,int $y, $color) : bool;// Checks the color of a cell from the board
    public function colorCount(int $x, int $y, int $red, int $blue);// Counts the same colour in a line and returns a boolean if there is a 4-in-row
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
            print("$player's turn.\n");
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

    public function colorCompare($x, $y, $color) : bool {
        return strcmp((($this->board)->getBoard()[$x][$y])->getColor(), $color) == 0;
    }

    public function colorCount(int $x, int $y, int $red, int $blue) { // Make this usable
        if($this->colorCompare($x, $y, '🟥') /*R*/) {
            $red++;
            $blue = 0;
            if($red == 4)
                return TRUE;
        }
    
        if($this->colorCompare($x, $y, '🟦') /*B*/) {
            $blue++;
            $red = 0;
            if($blue == 4)
                return TRUE;
        }
        /*                
        if($this->colorCount($x, $y, $red, $blue)) 
            return TRUE;
        */
        return FALSE;
    }

    public function horizontal() : bool {
        $red = 0;
        $blue = 0;

        for($y = ($this->board)->getY()-1; $y >= 0; $y--){
            for($x = 0; $x < ($this->board)->getX(); $x++){
                if($this->colorCompare($x, $y, "🟥") /*R*/) {
                    $red++;
                    $blue = 0;
                    if($red == 4)
                        return TRUE;
                }
                else if($this->colorCompare($x, $y, "🟦") /*B*/) {
                    $blue++;
                    $red = 0;
                    if($blue == 4)
                        return TRUE;
                }
                else /*⬜*/{
                    $red = 0;
                    $blue = 0;
                }
            }
            $red = 0;
            $blue = 0;
        }

        return FALSE;
    }

    public function vertical() : bool {
        $red = 0;
        $blue = 0;

        for($x = 0; $x < ($this->board)->getX(); $x++){
            for($y = ($this->board)->getY()-1; $y >= 0; $y--){
                if($this->colorCompare($x, $y, "🟥") /*R*/) {
                    $red++;
                    $blue = 0;
                    if($red == 4)
                        return TRUE;
                }
                else if($this->colorCompare($x, $y, "🟦") /*B*/) {
                    $blue++;
                    $red = 0;
                    if($blue == 4)
                        return TRUE;
                }
                else /*⬜*/{
                    $red = 0;
                    $blue = 0;
                }
            }
            $red = 0;
            $blue = 0;
        }
        
        return FALSE;    
    }

    public function diagonal() : bool {
        $red = 0;
        $blue = 0;

        // Right diagonals
        for($initialY = 2, $initialX = 0; $initialX < $this->board->getX();){
            $initialY > 0 ? $initialY-- : $initialX++;

            for($x = $initialX, $y = $initialY; $y < ($this->board)->getY() && $x < ($this->board)->getX(); $x++, $y++) {
                if($this->colorCompare($x, $y, "🟥") /*R*/) {
                    $red++;
                    $blue = 0;
                    if($red == 4)
                        return TRUE;
                }
                else if($this->colorCompare($x, $y, "🟦") /*B*/) {
                    $blue++;
                    $red = 0;
                    if($blue == 4)
                        return TRUE;
                }
                else /*⬜*/{
                    $red = 0;
                    $blue = 0;
                }
            }
        }

        // Left diagonals
        for($initialY = 3, $initialX = 0; $initialX < $this->board->getX();) {
            $initialY < ($this->board)->getY() ? $initialY++ : $initialX++;
            for($x = $initialX, $y = $initialY; $y <= 0 && $x < ($this->board)->getX(); $x++, $y--) {
                if($this->colorCompare($x, $y, "🟥") /*R*/) {
                    $red++;
                    $blue = 0;
                    if($red == 4)
                        return TRUE;
                }
                else if($this->colorCompare($x, $y, "🟦") /*B*/) {
                    $blue++;
                    $red = 0;
                    if($blue == 4)
                        return TRUE;
                }
                else /*⬜*/{
                    $red = 0;
                    $blue = 0;
                }
            }
        }
        return FALSE;
        
    }

    public function winner(string $player) : bool {
        if($this->horizontal() || $this->vertical() || $this->diagonal()){
            print("The winner is $player");
            return TRUE;
        }
        else return FALSE;
    }
}

$tablero = new Board;
$juego = new Game($tablero);
$juego->play();


?>