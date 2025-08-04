<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register() {

        $response = $this->post('/register/page', [// тут мы перезодим по маршутуру
            'name' => 'TestUser', // и тут мы заполняем его дланными
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('dashboard')); // после чего делаем переадресацию на основну. стриеицу

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);

    }

    public function test_user_can_login()
    {
        // Создаём пользователя
        $user = User::factory()->create([
            'email' => 'login@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'login@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($user);
    }
}

