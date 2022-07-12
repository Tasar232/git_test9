@extends('admin\admin_layout')

@section('content')

    <div class="d-flex mt-1 mb-1 align-items-center justify-content-center">
        <button class="btn btn-lg btn-outline-primary">Скачать список</button>
    </div>

    <div class="col-12 d-flex flex-column"
        style="height: 430px; overflow-y: auto">
        <table class="table table-striped table-bordered mt-2">
            <tr>
                <th scope="col" class="text-center">ФИО</th>
                <th scope="col" class="text-center">Блок с ответами</th>
                <th scope="col" class="text-center">Итоговый балл</th>
            </tr>
            
                <td class="text-center">Тут ФИО</td>
                <td class="text-center">Тут блок с ответами</td>
                <td class="text-center">Тут итоговый балл</td>
            
        </table>
    </div>

    
@endsection