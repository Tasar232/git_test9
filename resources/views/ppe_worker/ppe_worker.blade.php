@extends('layouts.__layout_login')
@section('content')
    <form method="POST" action="/">
        @csrf
        <div class="container">

            <div class="row" style="padding-top: 3rem;">
                <nav class="navbar fixed-top navbar-dark bg-primary">
                    <div class="container-fluid">
                        <a class="navbar-brand ms-3"> Личный кабинет</a>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href='/logout' class="btn btn-primary me-md-2" type="button">Выход</a>
                        </div>
                    </div>
                </nav>

                <div class="col col-sm-4 w-25">
                    <p class="fs-3 mt-2">Тут типо ФИО работника</p>
                    <p class="fs-4 mt 2">Тут типо МО работника</p>
                    <p class="fs-5 mt 2">Проводит огэ/егэ</p>
                    <p class="fs-5 mt 2">Почта</p>
                </div>

                <div class="col col-sm-4 w-75 mt-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" colspan="5">Список тестов</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Тест залупа</td>
                                <td>Попыток остало:2</td>
                                <td>Сдал/не Сдал и на сколько %</td>
                                <td><button type="button" class="btn btn-outline-primary">Пройти тест/скачать
                                        сертификат</button></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Тест ебаный</td>
                                <td>Попыток остало:1</td>
                                <td>Сдал/не Сдал и на сколько %</td>
                                <td><button type="button" class="btn btn-outline-primary">Пройти тест/скачать
                                        сертификат</button></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Тест Власов</td>
                                <td>Попыток остало:101010101</td>
                                <td>Сдал/не Сдал и на сколько %</td>
                                <td><button type="button" class="btn btn-outline-primary">Пройти тест/скачать
                                        сертификат</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
    <style>
        .colstyle {
            padding-top: .75rem;
            padding-bottom: .75rem;
            background-color: rgba(255, 255, 255, 0.308);
            border: 1px solid rgba(194, 194, 194, 0.438);
            border-radius: 2rem;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
