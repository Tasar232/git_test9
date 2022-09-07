@extends('layouts.__layout_login')
@section('content')
    <div class="container">
        <div class="row" style="padding-top: 3rem;">
            <div class="col-4 offset-4 d-flex align-items-center justify-content-center flex-column colstyle">
                <div style="color: rgb(73, 73, 73);">Данные авторизации работника</div>
                <div>
                    <table class="table table-striped table-bordered ">
                        <tr>
                            <th scope="col" class="text-center">Принадлежность</th>
                            <th scope="col" class="text-center">Логин</th>
                            <th scope="col" class="text-center">Пароль</th>
                        </tr>
    
                        @foreach ($coordinators_type_text as $coord_text)
                            <tr>
                                <td class="text-center">{{ $coordinators_type[$loop->iteration-1] }}, {{$coord_text}}</td>
                                <td class="text-center">{{ $coordinators_login[$loop->iteration-1] }}</td>
                                <td class="text-center">{{ $coordinators_pas[$loop->iteration-1] }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{route('admin')}}" class="btn btn-primary"
                            style="margin-top: 0.6rem;">Окей</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
