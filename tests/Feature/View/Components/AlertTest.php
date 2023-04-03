<?php

namespace Tests\Feature\View\Components;

use App\View\Components\Alert;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlertTest extends TestCase
{
    public function testSuccessfulPage(): void
    {
        $view = $this->component(Alert::class, ['type' => 'danger', 'message' => 'Сообщение']);

        $view
            ->assertSee('danger')
            ->assertSee('Сообщение');
    }
}
