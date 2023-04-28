<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    public function testCategoriesSuccessfulPage(): void
    {
        $response = $this->get(route('categories.index'));

        $response
            ->assertValid('categories')
            ->assertStatus(200);
    }

    public function testCategoriesAllSuccessfulPage(): void
    {
        $response = $this->get(route('categories.showAll'));

        $response
            ->assertValid('categories')
            ->assertStatus(200);
    }

    public function testOneCategoriesSuccessfulPage(): void
    {
        $response = $this->get(route('categories.show', '1'));

        $response
            ->assertValid('category')
            ->assertStatus(200);
    }
}
