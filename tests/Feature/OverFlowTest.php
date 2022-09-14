<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OverFlowTest extends TestCase
{
    public function test_horizontal_overflow() {
        $number = $this->get('/jugar/12345678'); // Number 8 is not considered on the board
        $number->assertStatus(500);    // Should receive a 500
    }
/*
    public function test_vertical_overflow() {
        $number = $this->get('/jugar/1111111'); // Seven 1's should result in getting out of the board
        $number->assertStatus(500);    // Should receive a 500
    }*/
}