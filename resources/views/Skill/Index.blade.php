@include('comp.nav')

<div class="text-center my-4">
    <a href="{{ route('SkillCreate') }}" class="btn btn-primary btn-lg">
        ➕ Добавить своё новое знание
    </a>
</div>

<div class="d-flex justify-content-center my-4">
    <form action="{{ route('SkillIndex') }}" method="get" class="d-flex gap-2 flex-wrap">
        <input type="text" name="name" value="{{ request('name') }}" class="form-control" placeholder="Название навыка">
        <input type="text" name="level" value="{{ request('level') }}" class="form-control" placeholder="Уровень">
        <button type="submit" class="btn btn-primary">🔍 Найти</button>
    </form>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        @forelse($Skills as $Skill)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $Skill->name }}</h5>
                        <p class="card-text text-muted">{{ $Skill->level }}</p>

                        <a href="{{ route('SkillShow', $Skill->id) }}" class="btn btn-outline-primary btn-sm mt-2">Подробнее</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center mt-5">
                <p class="font-bold underline text-lg">Знаний пока что нету, но надо учиться.</p>
            </div>
        @endforelse
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    <ul class="pagination pagination-sm">
        {{ $Skills->appends(request()->except('page'))->onEachSide(1)->links() }}
    </ul>
</div>
