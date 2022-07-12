@extends('layouts.__layout_login')
@section('content')
    <form method="POST" action="/">
        @csrf
        <div class="container">

            <div class="row gy-2">
                <nav class="navbar fixed-top navbar-dark bg-primary">
                    <div class="container-fluid">
                        <a class="navbar-brand ms-3"> Личный кабинет</a>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href='/logout' class="btn btn-primary me-md-2" type="button">Выход</a>
                        </div>
                    </div>
                </nav>
                <p class="lead"> </p>

                <p class="lead">
                    Наиминование МО
                </p>


                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Категория работника</th>
                            <th class="text-center" scope="col">Кол-во</th>
                            <th class="text-center" scope="col">Прогресс прохождения тестирования</th>
                            <th class="text-center" scope="col">Сдал/Не сдал/Не начал</th>
                            <th class="text-center" scope="col">Развернутый список</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Руководитель ППЭ/Член ГЭК</th>
                            <td class="text-center">5</td>
                            <td class="text-center">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="4"
                                        aria-valuemin="0" aria-valuemax="5"></div>
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 0%"
                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="5"></div>
                                </div>
                            </td>
                            <td class="text-center">4/0/1</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary active" data-bs-toggle="modal"
                                        data-bs-target="#Manager">
                                        Показать
                                    </button>
                                    <a href="#" class="btn btn-outline-primary">Скачать</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Технический специалист</th>
                            <td class="text-center">4</td>
                            <td class="text-center">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="2"
                                        aria-valuemin="0" aria-valuemax="4"></div>
                                    <div class="progress-bar  bg-warning" role="progressbar" style="width: 25%"
                                        aria-valuenow="1" aria-valuemin="0" aria-valuemax="4"></div>
                                </div>
                            </td>
                            <td class="text-center">2/1/1</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary active" data-bs-toggle="modal"
                                        data-bs-target="#Specialist">
                                        Показать
                                    </button>
                                    <a href="#" class="btn btn-outline-primary">Скачать</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Организатор ППЭ</th>
                            <td class="text-center">23</td>
                            <td class="text-center">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 78%" aria-valuenow="18"
                                        aria-valuemin="0" aria-valuemax="23"></div>
                                    <div class="progress-bar  bg-warning" role="progressbar" style="width: 17%"
                                        aria-valuenow="4" aria-valuemin="0" aria-valuemax="23"></div>
                                </div>
                            </td>
                            <td class="text-center">18/4/1</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary active" data-bs-toggle="modal"
                                        data-bs-target="#Organizer">
                                        Показать
                                    </button>
                                    <a href="#" class="btn btn-outline-primary">Скачать</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Общественный наблюдатель</th>
                            <td class="text-center">3</td>
                            <td class="text-center">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 67%" aria-valuenow="2"
                                        aria-valuemin="0" aria-valuemax="3"></div>
                                    <div class="progress-bar  bg-warning" role="progressbar" style="width: 33%"
                                        aria-valuenow="1" aria-valuemin="0" aria-valuemax="3"></div>
                                </div>
                            </td>
                            <td class="text-center">2/1/0</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary active" data-bs-toggle="modal"
                                        data-bs-target="#Observer">
                                        Показать
                                    </button>
                                    <a href="#" class="btn btn-outline-primary">Скачать</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>


                <div class="modal fade" id="Manager" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Таблица руководителей ППЭ.</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-bordered border-secondary">
                                    <thead>
                                        <tr>
                                            <th data-mdb-sort="false" scope="col">Код ОО</th>
                                            <th data-mdb-sort="false" scope="col">Наименование ОО</th>
                                            <th data-mdb-sort="false" scope="col">ФИО работника</th>
                                            <th data-mdb-sort="false" scope="col">Должность в ППЭ</th>
                                            <th data-mdb-sort="false" scope="col">Кол-во попыток пройти тест</th>
                                            <th data-mdb-sort="false" scope="col">Последний результат прохождения
                                                тестирования</th>
                                            <th scope="col">Статус сертификата, был скачен или нет</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="Specialist" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Таблица технических специалистов.</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-bordered border-secondary">
                                    <thead>
                                        <tr>
                                            <th scope="col">Код ОО</th>
                                            <th scope="col">Наименование ОО</th>
                                            <th scope="col">ФИО работника</th>
                                            <th scope="col">Должность в ППЭ</th>
                                            <th scope="col">Кол-во попыток пройти тест</th>
                                            <th scope="col">Последний результат прохождения тестирования</th>
                                            <th scope="col">Статус сертификата, был скачен или нет</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="Organizer" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Таблица организаторов ППЭ.</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-bordered border-secondary">
                                    <thead>
                                        <tr>
                                            <th scope="col">Код ОО</th>
                                            <th scope="col">Наименование ОО</th>
                                            <th scope="col">ФИО работника</th>
                                            <th scope="col">Должность в ППЭ</th>
                                            <th scope="col">Кол-во попыток пройти тест</th>
                                            <th scope="col">Последний результат прохождения тестирования</th>
                                            <th scope="col">Статус сертификата, был скачен или нет</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="Observer" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Таблица общественных наблюдателей.</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-bordered border-secondary">
                                    <thead>
                                        <tr>
                                            <th scope="col">Код ОО</th>
                                            <th scope="col">Наименование ОО</th>
                                            <th scope="col">ФИО работника</th>
                                            <th scope="col">Должность в ППЭ</th>
                                            <th scope="col">Кол-во попыток пройти тест</th>
                                            <th scope="col">Последний результат прохождения тестирования</th>
                                            <th scope="col">Статус сертификата, был скачен или нет</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
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
