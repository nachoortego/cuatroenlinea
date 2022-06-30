<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BoxCountTest extends TestCase
{
    public function test_count_white_box()
    {
        $html = file_get_contents('http://dagosproject.ddev.site:800/jugar/234234212137');
        
        $this->assertTrue(substr_count($html,'class="bg-gray-200') == 30);
    }
    public function test_count_red_box()
    {
        $html = file_get_contents('http://dagosproject.ddev.site:800/jugar/234234212137');

        $this->assertTrue(substr_count($html,'class="bg-red-500') == 6);
    }
    public function test_count_blue_box()
    {
        $html = file_get_contents('http://dagosproject.ddev.site:800/jugar/234234212137');

        $this->assertTrue(substr_count($html,'class="bg-sky-500') == 6);
    }
}