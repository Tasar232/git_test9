@extends('admin\admin_layout')

@section('content')

    <div class="d-flex mt-1 mb-4 align-items-center justify-content-center">
        <div class="btn-group col-12" role="group" aria-label="Basic example">
            <a href={{$href}}employers?category=employers&post=boss
                @class(["btn", "btn-sm", "btn-outline-primary" =>
                !$boss, "btn-primary" => $boss])
                role="button">Руководитель ППЭ / Член ГЭК</a>
            <a href={{$href}}employers?category=employers&post=technical_spec
                @class(["btn", "btn-sm","col-3", "btn-outline-primary" =>
                !$technical_spec, "btn-primary" => $technical_spec])
                role="button">Тех. специалист</a>
            <a href={{$href}}employers?category=employers&post=organiser @class(["btn","col-3", "btn-sm", "btn-outline-primary" =>
                !$organiser, "btn-primary" => $organiser])
                role="button">Организатор ППЭ</a>
            <a href={{$href}}employers?category=employers&post=nabludatel @class(["btn", "btn-sm", "btn-outline-primary" =>
                !$nabludatel, "btn-primary" => $nabludatel])
                role="button">Общественный наблюдатель</a>
        </div>
    </div>

    <div class="col-12 d-flex flex-column"
            style="height: 430px; overflow-y: auto">
            <table class="table table-striped table-bordered mt-2">
                <tr>
                    <th scope="col" class="text-center">Код МО</th>
                    <th scope="col" class="text-center">Наименование МО</th>
                    <th scope="col" class="text-center">Кол-во</th>
                    <th scope="col" class="text-center">Прогресс</th>
                    <th scope="col" class="text-center">Сдал/Не сдал/Не начал</th>
                    <th scope="col" class="text-center">Развернутый список</th>
                </tr>
                
                    <td class="text-center">Тут код МО</td>
                    <td class="text-center">Тут имя МО</td>
                    <td class="text-center">Тут кол-во</td>
                    <td class="text-center">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td class="text-center">Тут результат</td>
                    <td class="text-center col-2">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-primary btn-sm">Показать</button>
                            <button class="btn btn-outline-primary btn-sm">Скачать</button>
                        </div>
                    </td>
                
            </table>
        </div>

    
@endsection