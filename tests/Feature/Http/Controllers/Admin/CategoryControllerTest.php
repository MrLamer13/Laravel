<?php

namespace Http\Controllers\Admin;

use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    public function testCategoriesSuccessfulPage(): void
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertStatus(200);
    }

    public function testCategoriesCreateSuccessfulPage(): void
    {
        $response = $this->get(route('admin.categories.create'));

        $response
            ->assertViewIs('admin.categories.create')
            ->assertStatus(200);
    }
}
