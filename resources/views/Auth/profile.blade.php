@include('comp.nav')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow rounded-4">
                <div class="card-body text-center">
                    <h3 class="card-title mb-3">Профиль пользователя</h3>

                    <div class="mb-3">
                        <strong>Имя:</strong>
                        <p class="form-control-plaintext">{{ $user->name }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Email:</strong>
                        <p class="form-control-plaintext">{{ $user->email }}</p>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <strong>Количество проектов:</strong>
                        <p class="form-control-plaintext">{{ $user->projects->count() }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Количество планов:</strong>
                        <p class="form-control-plaintext">{{ $user->tasks->count() }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Количество знаний и навыков:</strong>
                        <p class="form-control-plaintext">{{ $user->skills->count() }}</p>
                    </div>

                    {{-- Добавь сюда счётчики, если хочешь, например: --}}
                    {{-- <p class="text-muted">Проектов: {{ $user->projects->count() }}</p> --}}
                </div>
            </div>
        </div>
    </div>
</div>
