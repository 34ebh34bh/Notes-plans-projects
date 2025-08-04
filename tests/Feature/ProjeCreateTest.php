<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\user;

class ProjeCreateTest extends TestCase
{
    use RefreshDatabase;//без неё выдаст ошиьку и не найдёт таблицу

    public function test_user_can_create_project()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('Projstore'), [
            'title' => 'Test Project',
            'description' => 'Описание проекта',
            'skills' => 'PHP, Laravel',
            'additions' => 'Дополнительная информация',
        ]);

        $response->assertRedirect(route('ProjPage'));

        $this->assertDatabaseHas('projects', [
            'title' => 'Test Project',
            'description' => 'Описание проекта',
            'skills' => 'PHP, Laravel',
            'additions' => 'Дополнительная информация',
            'user_id' => $user->id,
        ]);
    }
}
