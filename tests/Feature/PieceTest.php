<?php

namespace Tests\Feature;
namespace App;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PieceTest extends TestCase
{

    public function whitePiece()
    {
        $whitePiece = new Piece();

        $this->assertTrue($whitePiece->getColor() == "⬜");
    }
    
    public function bluePiece()
    {
        $bluePiece = new Piece("🟦");

        $this->assertTrue($bluePiece->getColor() == "🟦");
    }

    public function redPiece()
    {
        $PieceRoja = new Piece("🟥");

        $this->assertTrue($PieceRoja->getColor() == "🟥");
    }
}