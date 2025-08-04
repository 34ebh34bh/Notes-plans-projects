@include('comp.nav')
<a href="{{route('SkillIndex')}}" class="btn btn-danger m-2">Назад</a>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4 shadow-sm rounded-4">
                <div class="card-body">
                    <p class="text-muted text-center"><strong>Навык:</strong> {{ $Skill->name }}</p>
                    <p class="text-muted text-center"><strong>Уровень:</strong> {{ $Skill->level }}</p>

                    <div class="text-center mt-3">
                        <a href="{{route('SkillEdit', $Skill->id)}}" class="btn btn-outline-primary px-4">Внести изменения</a>
                    </div>

                    <form action="{{route('SkillDelete', $Skill->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-outline-danger px-4">Удалить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
