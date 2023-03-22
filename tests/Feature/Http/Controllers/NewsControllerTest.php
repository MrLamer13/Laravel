<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    public function testFullNewsSuccessfulPage(): void
    {
        $response = $this->get(route('news.index'));

        $response
            ->assertValid('newsList')
            ->assertStatus(200);
    }

    public function testOneNewsSuccessfulPage(): void
    {
        $response = $this->get(route('news.show', '1'));

        $response
            ->assertValid('news')
            ->assertStatus(200);
    }
}
