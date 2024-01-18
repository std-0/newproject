@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Înregistrare') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register_process') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-6 col-form-label text-md-right">{{ __('Nume') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" style="padding: 7px !important; border: 1px solid !important;" name="name" value="{{ old('name') }}"
                                    required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-6 col-form-label text-md-right" style="margin-bottom: 15px;">{{ __('E-Mail')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label text-md-right" style="margin-bottom: 15px;">{{ __('Parolă')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-6 col-form-label text-md-right">{{ __('Confirmă Parola') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0" style="padding-top: 25px;">
                            <div class="col-md-6 offset-md-4" >
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Înregistrare') }}
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