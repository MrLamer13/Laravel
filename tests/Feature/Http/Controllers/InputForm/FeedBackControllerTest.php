<?php

namespace Tests\Feature\Http\Controllers\InputForm;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedBackControllerTest extends TestCase
{
    public function testSuccessfulPage(): void
    {
        $response = $this->get(route('inputforms.feedback.index'));

        $response->assertStatus(200);
    }

    public function testSuccessfulRedirect(): void
    {
        $response = $this->post(route('inputforms.feedback.store'));

        $response->assertRedirectToRoute('inputforms.feedback.index');
    }

    public function testSuccessfulRedirectWithStatus(): void
    {
        $response = $this->post(route('inputforms.feedback.store'));

        $response->assertSessionHas('status', 'Данные успешно занесены!');
    }
}
