<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FourInRowTest extends TestCase
{
    public function test_horizontal_row() {
        $html = file_get_contents('http://dagosproject.ddev.site:800/jugar/1121314');
    }

    public function test_vertical_row() {
        $html = file_get_contents('http://dagosproject.ddev.site:800/jugar/1212121');
    }
}
