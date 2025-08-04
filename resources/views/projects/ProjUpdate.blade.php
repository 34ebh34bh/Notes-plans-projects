@include('comp.nav')
<a href="{{route('ProjShow', $Project->id)}}" class="btn btn-danger m-2">Назад</a>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow rounded-4">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Создание проекта</h4>

                    <form action="{{ route('ProjEdit', $Project->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="title" class="form-label">Название проекта</label>
                            <input type="text" value="{{$Project->title}}" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Описание</label>
                            <textarea class="form-control"  id="description" name="description" rows="3" required>{{$Project->description}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="skills" class="form-label">Навыки (через запятую)</label>
                            <input type="text" value="{{$Project->skills}}" class="form-control" id="skills" name="skills" placeholder="Laravel, Vue, Docker">
                        </div>

                        <div class="mb-3">
                            <label for="additions" class="form-label">Процесс выполнения</label>
                            <textarea class="form-control" id="additions" name="additions" rows="2">{{$Project->additions}}</textarea>
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
