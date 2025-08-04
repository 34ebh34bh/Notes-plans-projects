@include('comp.nav')
<div class="text-center my-4">
    <a href="{{ route('PlanCreatePage') }}" class="btn btn-primary btn-lg">
        ➕ Запланировать идею
    </a>
</div>

<div class="d-flex justify-content-center my-4">
    <form action="{{ route('PlanIndex') }}" method="get" class="d-flex flex-wrap gap-2 justify-content-center">
        <input type="text" name="title" value="{{ request('title') }}" class="form-control" placeholder="Название плана">
        <input type="text" name="description" value="{{ request('description') }}" class="form-control" placeholder="Описание">
        <button type="submit" class="btn btn-primary">🔍 Найти</button>
    </form>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        @forelse($Tasks as $Task)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">{{ $Task->title }}</h5>
                        <p class="card-text text-muted">{{ $Task->description }}</p>

{{--                         Кнопка "Подробнее" опциональна, если у тебя есть маршрут--}}
                         <a href="{{ route('PlanShow', $Task->id) }}" class="btn btn-outline-primary btn-sm mt-2">Подробнее</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center mt-5">
                <p class="font-bold underline text-lg">Планов пока что нет, но надо что-то думать.</p>
            </div>
        @endforelse
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    <ul class="pagination pagination-sm">
        {{ $Tasks->appends(request()->except('page'))->onEachSide(1)->links() }}
    </ul>
</div>
