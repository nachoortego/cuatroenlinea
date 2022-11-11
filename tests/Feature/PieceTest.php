<?php

namespace Tests\Feature;
namespace App;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PieceTest extends TestCase
{

    public function test_whitePiece()
    {
        $whitePiece = new Piece();

        $this->assertTrue($whitePiece->getColor() == "⬜");
    }
    
    public function test_bluePiece()
    {
        $bluePiece = new Piece("🟦");

        $this->assertTrue($bluePiece->getColor() == "🟦");
    }

    public function test_redPiece()
    {
        $PieceRoja = new Piece("🟥");

        $this->assertTrue($PieceRoja->getColor() == "🟥");
    }
}