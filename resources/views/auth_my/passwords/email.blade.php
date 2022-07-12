@extends('__layout_login')
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="container">
            <div class="row" style="padding-top: 3rem;">
                <div class="col-4 offset-4 d-flex align-items-center justify-content-center flex-column colstyle">
                    <div style="color: rgb(73, 73, 73);">Восстановление пароля.</div>
                    <div>
                        <p class="text-center"> Введите e-mail, который вы указали при регистрации. Мы отправим вам письмо с
                            ссылкой для сбрасывания пароля </p>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" placeholder="E-mail" style="margin-top: .5rem;" value="{{ old('email') }}"
                            required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="row g-2" style="margin-top: .5rem;">
                            <div class="d-grid gap-2">
                                <button type="submit" name="inputLogin" class="btn btn-primary"
                                    style="margin-top: 0.6rem;">Отправить</button>
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
