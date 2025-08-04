<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_cannot_access_foreign_project(): void
    {
        // Создаём "чужого" пользователя и его проект
        $foreignUser = User::factory()->create();
        $foreignProject = Project::factory()->create([
            'user_id' => $foreignUser->id,
        ]);

        // Создаём текущего пользователя
        $me = User::factory()->create();

        // Авторизуемся как текущий пользователь
        $this->actingAs($me);

        // Пытаемся перейти на чужой проект
        $response = $this->get(route('ProjShow', $foreignProject->id));

        // Ожидаем 403 — доступ запрещён
        $response->assertStatus(403);
    }
}
