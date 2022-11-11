<?php

namespace Tests\Feature;
namespace App;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BoardTest extends TestCase
{
    public function test_emptyBoard() {
        $board = new Board();

        $white = new Piece();

        $empty = [[$white, $white, $white, $white, $white, $white],
                  [$white, $white, $white, $white, $white, $white],
                  [$white, $white, $white, $white, $white, $white],
                  [$white, $white, $white, $white, $white, $white],
                  [$white, $white, $white, $white, $white, $white],
                  [$white, $white, $white, $white, $white, $white],
                  [$white, $white, $white, $white, $white, $white]];

        $this->assertEquals($board->getBoard(), $empty);

    }

    public function test_putPieces() {
        $board = new Board();

        $blue = new Piece("🟦");
        $red = new Piece("🟥");
        $white = new Piece();

        $board->putPiece(1,$blue);
        $board->putPiece(1,$blue);
        $board->putPiece(1,$blue);
        $board->putPiece(1,$red);
        $board->putPiece(1,$blue);
        $board->putPiece(2,$red);
        $board->putPiece(2,$red);
        $board->putPiece(3,$red);
        $board->putPiece(5,$blue);
        $board->putPiece(5,$red);
        $board->putPiece(5,$blue);
        $board->putPiece(6,$red);

        $res = [[$white, $blue, $red, $blue, $blue, $blue],
                [$white, $white, $white, $white, $red, $red],
                [$white, $white, $white, $white, $white, $red],
                [$white, $white, $white, $white, $white, $white],
                [$white, $white, $white, $blue, $red, $blue],
                [$white, $white, $white, $white, $white, $red],
                [$white, $white, $white, $white, $white, $white]];

        $this->assertEquals($board->getBoard(), $res);

    }

    public function test_removePieces() {
        $board = new Board();

        $blue = new Piece("🟦");
        $red = new Piece("🟥");
        $white = new Piece();


        $board->putPiece(1,$blue);
        $board->putPiece(1,$blue);
        $board->putPiece(1,$blue);
        $board->putPiece(1,$red);
        $board->putPiece(1,$blue);
        $board->putPiece(2,$red);
        $board->putPiece(2,$red);
        $board->putPiece(3,$red);
        $board->putPiece(5,$blue);
        $board->putPiece(5,$red);
        $board->putPiece(5,$blue);
        $board->putPiece(6,$red);

        $board->removePiece(1);
        $board->removePiece(1);
        $board->removePiece(1);
        $board->removePiece(1);
        $board->removePiece(1);
        $board->removePiece(2);
        $board->removePiece(2);
        $board->removePiece(3);
        $board->removePiece(5);
        $board->removePiece(6);
        $board->removePiece(5);
        $board->removePiece(5);


        $empty = [[$white, $white, $white, $white, $white, $white],
                  [$white, $white, $white, $white, $white, $white],
                  [$white, $white, $white, $white, $white, $white],
                  [$white, $white, $white, $white, $white, $white],
                  [$white, $white, $white, $white, $white, $white],
                  [$white, $white, $white, $white, $white, $white],
                  [$white, $white, $white, $white, $white, $white]];

        $this->assertEquals($board->getBoard(), $empty);

    }


}