<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>

    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand ms-3">Изменение данных общественного наблюдателя</a>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex align-items-center justify-content-center">
            <div class="col-6 d-flex m-2 p-3 flex-column"
            style="border: 1px solid rgb(233, 233, 233); border-radius: .75rem">

                <div class="mb-1">Адрес электронной почты:</div>
                <div>
                    <input id="mailI" type="email" class="form-control mb-1" placeholder="Эл. почта">
                </div>

                <div class="mb-1">Пароль:</div>
                <div>
                    <input id="passwordI" type="text" class="form-control mb-1" placeholder="Пароль">
                </div>

                <div class=" mb-1">Муниципальное образование:</div>
                <div>
                    <select class="form-select col-2" aria-label="Default select example"
                    id="MOselect">
                        <option selected>МО 1</option>
                        <option value="1">МО 2</option>
                        <option value="2">МО 3</option>
                        <option value="3">МО 4</option>
                    </select>
                </div>
                <div class="mt-2 mb-1">Данные наблюдателя:</div>
                <div class="col d-flex align-items-center justify-content-center">
                    <input type="text" class="form-control me-1 mb-1" placeholder="Фамилия">
                    <input type="text" class="form-control ms-1 me-1 mb-1" placeholder="Имя">
                    <input type="text" class="form-control ms-1 mb-1" placeholder="Отчество">
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type = "checkbox" id = "check9">
                    <label class="form-check-label" for="check9">
                    ГИА-9
                    </label>
                </div>
                <div class="form-check mb-1">
                    <input class="form-check-input" type = "checkbox" id = "check11">
                    <label class="form-check-label" for="check11">
                      ГИА-11
                    </label>
                </div>

                <div class="d-flex align-items-center justify-content-center">
                    <div>
                        <button class="btn btn-lg btn-primary mt-4" id="button">Сохранить изменения</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>
</html>
