@extends('admin\admin_layout')

@section('content')
    @if ($employers)
        <div class="d-flex mt-1 mb-4 align-items-center justify-content-center">
            <div class="btn-group col-12" role="group" aria-label="Basic example">
                <a href="?category=employers&post=boss" @class([
                    'btn',
                    'btn-sm',
                    'btn-outline-primary' => !$boss,
                    'btn-primary' => $boss,
                ]) role="button">Руководитель ППЭ / Член
                    ГЭК</a>
                <a href="?category=employers&post=technical_spec" @class([
                    'btn',
                    'btn-sm',
                    'col-3',
                    'btn-outline-primary' => !$technical_spec,
                    'btn-primary' => $technical_spec,
                ]) role="button">Тех.
                    специалист</a>
                <a href="?category=employers&post=organiser" @class([
                    'btn',
                    'col-3',
                    'btn-sm',
                    'btn-outline-primary' => !$organiser,
                    'btn-primary' => $organiser,
                ]) role="button">Организатор ППЭ</a>
                <a href="?category=employers&post=nabludatel" @class([
                    'btn',
                    'btn-sm',
                    'btn-outline-primary' => !$nabludatel,
                    'btn-primary' => $nabludatel,
                ]) role="button">Общественный
                    наблюдатель</a>
            </div>
        </div>
    @endif
    <div class="row m-2">
        <div class="col-9 d-flex flex-column" style="height: 430px; overflow-y: auto">
            <table class="table table-striped table-bordered mt-2">
                <tr>
                    <th scope="col" class="text-center">№</th>
                    <th scope="col" class="text-center">ФИО</th>
                    <th scope="col" class="text-center">Управление</th>
                </tr>
                @foreach ($all_users as $table)
                    @foreach ($table as $user)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $user->surname }} {{ $user->name }} {{ $user->second_name }}</td>
                            <td class="text-center col-4">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button class="btn btn-outline-primary btn-sm">Изменить</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Удалить</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endforeach


            </table>
        </div>
        <div class="col d-flex flex-column justify-content-top m-2 align-items-center"
            style="border-left: 1px solid rgb(233, 233, 233)">
            @if ($employers)
                <a href={{ route('add_empl') }} class="btn btn-outline-primary m-1 col-12">Новый работник</a>
                <button class="btn btn-outline-primary m-1 col-12">Загрузить работников</button>
            @endif
            @if ($coordinators)
                <button class="btn btn-outline-primary m-1 col-12">Сгенерировать учётные записи</button>
            @endif
            <button class="btn btn-outline-primary m-1 col-12">Выгрузить логины и пароли</button>
            <button class="btn btn-outline-danger m-1 col-12">Очистить</button>
        </div>
    @endsection
