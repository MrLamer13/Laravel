<?php

namespace Tests\Feature\Http\Controllers\InputForm;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderForDataControllerTest extends TestCase
{
    public function testSuccessfulPage(): void
    {
        $response = $this->get(route('inputforms.orderfordata.index'));

        $response->assertStatus(200);
    }

    public function testSuccessfulRedirect(): void
    {
        $response = $this->post(route('inputforms.orderfordata.store'));

        $response->assertRedirectToRoute('inputforms.orderfordata.index');
    }

    public function testSuccessfulRedirectWithStatus(): void
    {
        $response = $this->post(route('inputforms.orderfordata.store'));

        $response->assertSessionHas('status', 'Данные успешно занесены!');
    }
}
