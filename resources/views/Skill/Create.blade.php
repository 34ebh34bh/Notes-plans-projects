@include('comp.nav')
<a href="{{route('SkillIndex')}}" class="btn btn-danger m-2">Назад</a>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow rounded-4">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Создание проекта</h4>

                    <form action="{{ route('SkillStore') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Добавь свой скилл</label>
                            <input type="text" class="form-control" id="title" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="level" class="form-label">Опиши его</label>
                            <textarea class="form-control" id="description" name="level" rows="3" required></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Создать проект</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
