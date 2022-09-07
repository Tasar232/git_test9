<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>

    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand ms-3">Изменение данных работника ППЭ</a>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex align-items-center justify-content-center">
            <div class="col-6 d-flex m-2 p-3 flex-column"
                style="border: 1px solid rgb(233, 233, 233); border-radius: .75rem">

                <div class="mb-1">Логин:</div>
                <div>
                    <input id="loginI" type="text" class="form-control mb-1" placeholder="Логин">
                </div>

                <div class="mb-1">Пароль:</div>
                <div>
                    <input id="passwordI" type="text" class="form-control mb-1" placeholder="Пароль">
                </div>

                <div class=" mb-1">Муниципальное образование:</div>
                <div>
                    <select class="form-select col-2" aria-label="Default select example" id="MOselect"
                        onchange='changeSelect()'>
                        <option selected>МО 1</option>
                        <option value="1">МО 2</option>
                        <option value="2">МО 3</option>
                        <option value="3">МО 4</option>
                    </select>
                </div>
                <div class="mt-2 mb-1">Данные работника:</div>
                <div class="col d-flex align-items-center justify-content-center">
                    <input type="text" class="form-control me-1 mb-1" placeholder="Фамилия">
                    <input type="text" class="form-control ms-1 me-1 mb-1" placeholder="Имя">
                    <input type="text" class="form-control ms-1 mb-1" placeholder="Отчество">
                </div>

                <div class="mt-2 mb-1">Образовательная организация:</div>
                <div>
                    <select id="job" class="form-select" aria-label="Default select example" id="OOselect">
                        <option selected>Тут текущая ОО</option>
                        <option value="1">Тут ОО 2</option>
                        <option value="2">Тут ОО 3</option>
                        <option value="3">Тут ОО 4</option>
                    </select>
                </div>
                <div class="form-check mt-1 mb-1">
                    <input class="form-check-input" type="checkbox" id="checkJob"
                        onchange='showOrHide("checkJob", "anotherJobT", "anotherJobI", "job");'>
                    <label class="form-check-label" for="checkJob">
                        Иное место работы
                    </label>
                </div>
                <div class="mb-1" id="anotherJobT" style="display: none">Место работы:</div>
                <div>
                    <input id="anotherJobI" type="text" class="form-control mb-1" placeholder="Место работы"
                        style="display: none">
                </div>

                <div class="mt-2 mb-1">Должность в ППЭ:</div>
                <div>
                    <select class="form-control select2 col-12" multiple="multiple" id="postSelect">
                        

                    </select>
                </div>


                <div class="d-flex align-items-center justify-content-center">
                    <div>
                        <button class="btn btn-lg btn-primary mt-4" id="button">Сохранить изменения</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function changeSelect() {
            var idPosition = 0;
            var MOselect = document.getElementById("MOselect");
            var OOselect = document.getElementById("job");
            OOselect.options.length = 0;
            var str = MOselect.options[MOselect.selectedIndex].text;
            //Массивы ниже нужно передать будет передать параметром
            // var MOname = ["МО 1", "МО 2", "МО 3", "МО 4", "МО 5"];
            // var MOid = ["1", "2", "3", "4", "5"];
            // var OOname = ["ОО один", "ОО два", "ОО три", "ОО четыре", "ОО пять", "Тоже к пятой"];
            // var OOid = ["5", "4", "3", "2", "1", "1"];
            var MOname = @json($MOname, JSON_UNESCAPED_UNICODE);
            var MOid = @json($MOid, JSON_UNESCAPED_UNICODE);
            var OOname = @json($OOname, JSON_UNESCAPED_UNICODE);
            var OOid = @json($OOid, JSON_UNESCAPED_UNICODE);

            for (i = 0; i < MOname.length; i++) {
                if (MOname[i] == str) {
                    idPosition = i;
                    break;
                }
            }
            var id = MOid[idPosition];
            for (i = 0; i < OOname.length; i++) {
                if (OOid[i] == id) {
                    var option = document.createElement('option');
                    option.value = option.innerHTML = OOname[i];
                    OOselect.appendChild(option);
                }
            }
        }

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
    </script>
    <script src="/assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        $("#postSelect").select2({
            placeholder: "Выберите должности",
        });
        if (true) //тут вместо true проверить, указано ли у челика другое место работы
        {
            cb = document.getElementById("checkJob").checked = true;
            showOrHide("checkJob", "anotherJobT", "anotherJobI", "job");
        }
        changeSelect();
    });
</script>
