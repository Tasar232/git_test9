@extends('admin\admin_layout')

@section('content')
    <div class="d-flex mt-1 align-items-center justify-content-center">
        <div class="btn-group col-6 mt-2" role="group" aria-label="Basic example">
            <a href={{$href}}какая-то-ссылка class="btn btn-lg btn-outline-success"
                role="button">Создать тест</a>
            <a href={{$href}}какая-то-ссылка class="btn btn-lg btn-outline-danger"
                role="button">Удалить тест</a>
        </div>
    </div>

    <div>
        <div class="row m-3 align-items-center justify-content-center"
        style="overflow-y: auto">
        @foreach ($position as $p)
            <div class="col-5 d-flex m-2 align-items-center justify-content-center flex-column"
            style="border: 1px solid rgb(233, 233, 233); border-radius: .25rem">
                <div>{{$p->name}}</div>
                <div class="btn-group col-11 m-2" role="group" aria-label="Basic example">
                    <a href={{$href}}какая-то-ссылка class="btn btn-sm btn-outline-primary"
                        role="button">Управление вопросами</a>
                    <a href={{$href}}какая-то-ссылка class="btn btn-sm btn-outline-primary"
                        role="button">Настройки тестирования</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
   
@endsection