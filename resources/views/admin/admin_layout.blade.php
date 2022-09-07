<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        html {
            background-color: white
        }
    </style>
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand ms-3"> Личный кабинет</a>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href='/logout' class="btn btn-primary me-md-2" type="button">Выход</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex mt-3 align-items-center">
            <div class="btn-group col-12" role="group" aria-label="Basic example">
                <a href="?part=users" @class(["btn", "me-1", "btn-lg", "btn-primary" =>
                    !$users, "btn-primary active" => $users])
                    role="button">Пользователи</a>
                <a href="?part=test" @class(["btn", "me-1", "btn-lg", "btn-primary" =>
                    !$test, "btn-primary active" => $test])
                    role="button">Тестирование</a>
                <a href="?part=stats" @class(["btn", "btn-lg", "btn-primary" =>
                    !$stats, "btn-primary active" => $stats])
                    role="button">Мониторинг и статистика</a>
            </div>
        </div>

        <div class="row mt-1">
            <div class="col-2 d-flex align-items-center justify-content-top flex-column">
                @if ($stats)
                <a href="{{$href}}category=employers" @class(["btn","col-12","m-1", "btn-outline-primary" =>
                    !$employers, "btn-primary" => $employers])
                    role="button">Работники ППЭ</a>
                <a href={{$href}}category=experts @class(["btn","col-12","m-1", "btn-outline-primary" =>
                    !$experts, "btn-primary" => $experts])
                    role="button">Эксперты</a>
                <a href={{$href}}category=students @class(["btn","col-12","m-1", "btn-outline-primary" =>
                    !$students, "btn-primary" => $students])
                    role="button">Обучающиеся</a>
                @else
                <a href="{{$href}}category=employers&post=1" @class(["btn","col-12","m-1", "btn-outline-primary" =>
                    !$employers, "btn-primary" => $employers])
                    role="button">Работники ППЭ</a>
                <a href={{$href}}category=experts @class(["btn","col-12","m-1", "btn-outline-primary" =>
                    !$experts, "btn-primary" => $experts])
                    role="button">Эксперты</a>
                <a href={{$href}}category=students @class(["btn","col-12","m-1", "btn-outline-primary" =>
                    !$students, "btn-primary" => $students])
                    role="button">Обучающиеся</a>
                @endif
                
                @if ($users)
                <a href={{$href}}category=coordinators @class(["btn","col-12","m-1", "btn-outline-primary" =>
                    !$coordinators, "btn-primary" => $coordinators])
                    role="button">Ответственные координаторы</a>
                @endif
            </div>

            <div class="col m-1 d-flex flex-column"
                style="height: 500px; overflow-y: auto; 
                border: 1px solid rgb(233, 233, 233); border-radius: .25rem">
                <div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>