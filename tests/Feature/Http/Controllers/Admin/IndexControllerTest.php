<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    public function testSuccessfulPage(): void
    {
        $response = $this->get(route('admin.index'));

        $response->assertStatus(200);
    }
}
