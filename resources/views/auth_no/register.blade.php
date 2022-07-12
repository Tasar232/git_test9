@extends('__layout_login')
@section('content')
    <form method="POST" action="{{route('register')}}">
        @csrf
        <div class="container">
            <div class="row" style="padding-top: 3rem;">
                <div class="col-4 offset-4 d-flex align-items-center justify-content-center flex-column colstyle">
                    <div style="color: rgb(73, 73, 73);">Регистрация</div>
                    <div>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" placeholder="E-mail" style="margin-top: .5rem;" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname"
                            id="surname" placeholder="Введите Фамилию" style="margin-top: .5rem;"
                            value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Введите Имя" style="margin-top: .5rem;" value="{{ old('name') }}"
                            required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="text" class="form-control @error('second_name') is-invalid @enderror"
                            name="second_name" id="second_name" placeholder="Введите Отчество" style="margin-top: .5rem;"
                            value="{{ old('second_name') }}" required autocomplete="second_name" autofocus>
                        @error('second_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="row" style="margin-top: .5rem;">
                            <div class="btn-group">
                                <select class="form-select" aria-label="Default select example" name="subject_select" id="subject_select">
                                    <option value="0">Предметная специализация</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id_subject }}">{{ $subject->subject_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            id="password" placeholder="Придумайте пароль" style="margin-top: .5rem;" required
                            autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="password" class="form-control" name="password_confirmation" id="password-confirm"
                            placeholder="Подтверждение пароля" style="margin-top: .5rem;" required
                            autocomplete="new-password">
                        <div class="row g-2" style="margin-top: .5rem;">
                            <div class="d-grid gap-2">
                                <button type="submit" name="inputLogin" class="btn btn-primary"
                                    style="margin-top: 0.6rem;">Зарегистрировать</button>
                            </div>
                        </div>
                    </div>
                </div>
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
