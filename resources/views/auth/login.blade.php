@extends('layouts.app')
@section('title',__('layout.login_text'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" >@lang('layout.login_text')</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login',app()->getLocale()) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">@lang('layout.email')</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">@lang('layout.password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{--				  <div class="form-group row ">--}}
{{--                      <label for="person_type" class="col-md-4 col-form-label text-md">نوع کاربری شما : </label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <select id="person_type" class="custom-select form-control" name="person_type" >--}}
{{--                                <option value="None"> @lang("layout.choose_option") </option>--}}

{{--                                    @foreach(\App\Users\User::getAllTypes() as $type)--}}
{{--                                    <option value="{{ $type}}"> @lang("layout.$type") </option>--}}

{{--                                    @endforeach--}}
{{--                                    </select>--}}

{{--                                @error('person_type')--}}
{{--      <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}

{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="form-group row">
                            <div class="col-md-7 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                   &nbsp;
                                    <label class="form-check-label mr-3" style="" for="remember">
                                        @lang('layout.remember_me')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('layout.login_text')
                                </button>

                                @if (Route::has('password.request',app()->getLocale()))
                                    <a class="btn btn-link" href="{{ route('password.request',app()->getLocale()) }}">
                                        @lang('layout.forgot_password')
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
