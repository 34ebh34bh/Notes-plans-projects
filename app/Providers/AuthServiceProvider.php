<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

// Подключи нужные модели, если используешь их в Gate
use App\Models\User;
use App\Models\Project;
use App\Models\Skills;
use App\Models\task;
use App\Policies\UpdatePolicy;
use App\Policies\TaskUpdatePolicy;
use App\Policies\ProjUpdatePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Политики авторизации для приложения.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Skills::class =>  UpdatePolicy::class,
        task::class => TaskUpdatePolicy::class,
        project::class => ProjUpdatePolicy::class,
    ];

    /**
     * Регистрируем любые правила авторизации.
     */
    public function boot(): void
    {

        Gate::define('skill', function (User $user, Skills $skill) {
            return $user->id === $skill->user_id;
        });
        Gate::define('project', function (User $user, project $project) {
            return $user->id === $project->user_id;
        });
        Gate::define('task', function (User $user, task $task) {
            return $user->id === $task->user_id;
        });
    }
}
