@include('comp.nav')
<a href="{{route('ProjPage')}}" class="btn btn-danger m-2">Назад</a>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4 shadow-sm rounded-4">
                <div class="card-body">
                    <h4 class="card-title text-center text-primary">{{ $Project->title }}</h4>
                    <p class="card-text text-center mb-2">{{ $Project->description }}</p>
                    <p class="text-muted text-center"><strong>Навыки:</strong> {{ $Project->skills }}</p>
                    <p class="text-muted text-center"><strong>Статус:</strong> {{ $Project->additions }}</p>

                    <div class="text-center mt-3">
                        <a href="{{route('ProjUpdate', $Project->id)}}" class="btn btn-outline-primary px-4">Внести изменения</a>
                    </div>

                    <form action="{{route('ProjDelete', $Project->id)}}" method="post">
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
