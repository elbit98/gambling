@extends('layouts.main')

@section('title', 'Авторизация')

@section('body')
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Авторизация</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.handlerLogin') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="login" class="col-sm-4 col-form-label text-md-right">Логин</label>

                                <div class="col-md-6">
                                    <input id="login" type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" required autofocus>

                                    @if ($errors->has('login'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('login') }}</strong>
                                        </span>
                                    @endif

                                    @if ($message = Session::get('errorFlashLogin'))
                                        <span class="text-danger">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                           <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif

                                    @if ($message = Session::get('errorFlashPassword'))
                                        <span class="text-danger">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Войти
                                    </button>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection