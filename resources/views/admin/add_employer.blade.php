<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand ms-3">Добавление работника ППЭ</a>
        </div>
    </nav>
    <form id="formAction" method="POST" action="{{ route('add_empl') }}">
        @csrf
        <div class="container">
            <div class="d-flex align-items-center justify-content-center">
                <div class="col-6 d-flex m-2 p-3 flex-column"
                    style="border: 1px solid rgb(233, 233, 233); border-radius: .75rem">
                    <div class=" mb-1">Выберите муниципальное образование:</div>
                    <div>
                        <select class="form-select col-2" aria-label="Default select example">
                            @foreach ($municipals as $mun)
                                <option value={{ $loop->iteration }}>{{ $mun->name_municipality }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2 mb-1">Идентификатор из базы данных ГИА-9:</div>
                    <div>
                        <input type="text" class="form-control" placeholder="ID">
                    </div>
                    <div class="mt-2 mb-1">Данные работника:</div>
                    <div class="col d-flex align-items-center justify-content-center">
                        <input type="text" class="form-control me-1 mb-1" placeholder="Фамилия">
                        <input type="text" class="form-control ms-1 me-1 mb-1" placeholder="Имя">
                        <input type="text" class="form-control ms-1 mb-1" placeholder="Отчество">
                    </div>
                    <div class="mt-2 mb-1">Выберите образовательную организацию:</div>
                    <div>
                        <select id="job" class="form-select" aria-label="Default select example">
                            @foreach ($ed_orgs as $eo)
                                <option value={{ $loop->iteration }}>{{ $eo->name_education_org }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check mt-1 mb-1">
                        <input class="form-check-input" type="checkbox" id="checkJob"
                            onchange='showOrHide("checkJob", "anotherJobT", "anotherJobI", "job");'>
                        <label class="form-check-label" for="checkJob">
                            Иное место работы
                        </label>
                    </div>
                    <div class="mb-1" id="anotherJobT" style="display: none">Введите место работы:</div>
                    <div>
                        <input id="anotherJobI" type="text" class="form-control mb-1" placeholder="Место работы"
                            style="display: none">
                    </div>
                    <div class="mt-2 mb-1">Выберите должность в ППЭ:</div>
                    <div>
                        <select class="form-select" aria-label="Default select example">
                            @foreach ($positions as $pos)
                                <option value={{ $loop->iteration }}>{{ $pos->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div id="forSelect">

                    </div>
                    <div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-2 mb-1" onclick='add(this);'>+ Добавить
                            должность</button>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <div>
                            <button type="sumbit" class="btn btn-lg btn-primary mt-4" id="button">Добавить
                                работника</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <script>
        function showOrHide(cb, text, input, select) {
            cb = document.getElementById(cb);
            text = document.getElementById(text);
            input = document.getElementById(input);
            select = document.getElementById(select);
            if (cb.checked) {
                text.style.display = "block";
                input.style.display = "block";
                select.disabled = true;
            } else {
                text.style.display = "none";
                input.style.display = "none";
                select.disabled = false;
            }
        }

        function rm() {
            var button = event.target;
            button.closest("div").remove();
        }

        function add(event) {
            event.stopPropagation();
            event.preventDefault(); 
            var parties = ["Должность 1", "Должность 2", "Должность 3", "Должность 4"];
            var select = document.createElement("select"); //создаем новые елементы
            var div = document.createElement("div");
            var button = document.createElement("button");

            //добавляем в селект значения
            for (i = 0; i < 4; i++) {
                var option = document.createElement('option');
                option.value = option.innerHTML = parties[i];
                select.appendChild(option);
            }
            //делаем красивую внешку
            div.classList.add('col');
            div.classList.add('d-flex');
            div.classList.add('align-items-center');
            div.classList.add('justify-content-center');
            div.classList.add('mt-1');

            //Генерация айдишника
            var i = 0;
            var selectID = "select_" + i;
            while (true) {
                if (document.getElementById(selectID)) {
                    i++;
                    selectID = "select_" + i;
                } else {
                    break;
                }
            }

            select.classList.add('form-select');
            select.classList.add('me-1');
            select.id = selectID; //присваиваем уникальный ид

            button.classList.add('btn');
            button.classList.add('btn-danger');
            button.textContent = 'Удалить';
            button.onclick = rm; //навешиваем обработчик на кнопку

            //добавляем все на форму
            div.appendChild(select);
            div.appendChild(button);
            var parent = document.getElementById("forSelect");
            parent.appendChild(div);
        }
    </script>
    <script src="/assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
