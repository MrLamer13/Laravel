<?php

namespace Http\Controllers\Admin;

use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    public function testNewsSuccessfulPage(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function testNewsCreateSuccessfulPage(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response
            ->assertViewIs('admin.news.create')
            ->assertStatus(200);
    }
}
