@extends('layouts.__layout_login')
@section('content')
    <div class="container">
        <div class="row" style="padding-top: 3rem;">
            <div class="col-4 offset-4 d-flex align-items-center justify-content-center flex-column colstyle">
                <div style="color: rgb(73, 73, 73);">Данные авторизации работника</div>
                <div>
                    <label >Логин:   {{$login}}</label><br>
                    <label >Пароль:  {{$password}}</label>
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
