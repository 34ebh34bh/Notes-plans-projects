@include('comp.nav')

<a href="{{route('PlanIndex')}}" class="btn btn-danger m-2">Назад</a>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow rounded-4">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Создание проекта</h4>

                    <form action="{{ route('planstore') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Название плана</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Описание</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Создать план</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
