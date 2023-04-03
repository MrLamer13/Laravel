<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    public function testSuccessfulPage(): void
    {
        $response = $this->get(route('index'));

        $response->assertStatus(200);
    }
}
