<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatusTest extends TestCase
{
    public function statusNumber() 
    {
        $number = $this->get('/jugar/7');

        $number->assertStatus(200);
    }
}