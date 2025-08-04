@include('comp.nav')
<div class="text-center my-4">
    <a href="{{ route('ProjCreate') }}" class="btn btn-primary btn-lg">
        ➕ Создать проект
    </a>
</div>

<div class="d-flex justify-content-center my-4">
    <form action="{{ route('ProjPage') }}" method="get" class="d-flex flex-wrap gap-2 justify-content-center">
        <input type="text" name="title" value="{{ request('title') }}" class="form-control" placeholder="Название">
        <input type="text" name="description" value="{{ request('description') }}" class="form-control" placeholder="Описание">
        <input type="text" name="skills" value="{{ request('skills') }}" class="form-control" placeholder="Навыки">
        <input type="text" name="additions" value="{{ request('additions') }}" class="form-control" placeholder="Процесс выполнения">

        <button type="submit" class="btn btn-primary">🔍 Найти</button>
    </form>
</div>


<div class="container mt-4">
    <div class="row justify-content-center">
        @forelse($Projects as $Project)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $Project->title }}</h5>
                        <p class="card-text text-muted">{{ $Project->description }}</p>

                        <a href="{{ route('ProjShow', $Project->id) }}" class="btn btn-outline-primary btn-sm mt-2">Подробнее</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center mt-5">
                <p class="font-bold underline text-lg">Проектов пока что нету, но скоро найдётся.</p>
            </div>
        @endforelse
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    <ul class="pagination pagination-sm">
        {{ $Projects->appends(request()->except('page'))->onEachSide(1)->links() }}
    </ul>
</div>
