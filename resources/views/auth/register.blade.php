@extends('layouts.app')
@section('title',__('layout.register_text'))

@section('content')
<div class="container">
@if(app()->getLocale()=="fa_IR")
@push('scripts')
    <script>
        $(function() {
            $("#birthdate, #birthdateSpan").persianDatepicker();       
        });
    </script>
@endpush
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">@lang('layout.register_text')</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register',app()->getLocale()) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">@lang('layout.fname')</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="name" value="{{ old('fname') }}" required autocomplete="name" autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">@lang('layout.lname')</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">@lang('layout.email')</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">@lang('layout.confirm_password')</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nationalcode" class="col-md-4 col-form-label text-md-right">@lang('layout.nationalcode')</label>

                            <div class="col-md-6">
                                <input id="nationalcode" type="number" class="form-control @error('nationalcode') is-invalid @enderror" name="nationalcode" value="{{ old('nationalcode') }}" required autocomplete="nationalcode" autofocus>

                                @error('nationalcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right">@lang('layout.birthdate')</label>

                            <div class="col-md-6">
                                @if(app()->getLocale()=="fa_IR")
                                <input id="birthdate" type="text" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus>
                                <span id="birthdateSpan"></span>

                                @else
                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus>
                                @endif

                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">@lang('layout.mobile')</label>

                            <div class="col-md-6">
                                <input id="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="secondMobile" class="col-md-4 col-form-label text-md-right">@lang('layout.secondMobile')</label>

                            <div class="col-md-6">
                                <input id="secondMobile" type="tel" class="form-control @error('secondMobile') is-invalid @enderror" name="secondMobile" value="{{ old('secondMobile') }}" required autocomplete="secondMobile" autofocus>
                                @error('secondMobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">@lang('layout.telephone')</label>

                            <div class="col-md-6">
                                <input id="tel" type="tel" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus>

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="webpage" class="col-md-4 col-form-label text-md-right">@lang('layout.webpage')</label>

                            <div class="col-md-6">
                                <input id="webpage" type="url" class="form-control @error('webpage') is-invalid @enderror" name="webpage" value="{{ old('webpage') }}" required autocomplete="webpage" autofocus>

                                @error('webpage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="education_place" class="col-md-4 col-form-label text-md-right">@lang('layout.education_place')</label>

                            <div class="col-md-6">
                                <input id="education_place" type="text" class="form-control @error('education_place') is-invalid @enderror" name="education_place" value="{{ old('education_place') }}" required autocomplete="education_place" autofocus>

                                @error('education_place')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="study_field" class="col-md-4 col-form-label text-md-right">@lang('layout.study_field')</label>

                            <div class="col-md-6">
                                <input id="study_field" type="text" class="form-control @error('study_field') is-invalid @enderror" name="study_field" value="{{ old('study_field') }}" required autocomplete="study_field" autofocus>

                                @error('study_field')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="study_orention" class="col-md-4 col-form-label text-md-right">@lang('layout.study_orention')</label>

                            <div class="col-md-6">
                                <input id="study_orention" type="text" class="form-control @error('study_orention') is-invalid @enderror" name="study_orention" value="{{ old('study_orention') }}" required autocomplete="study_orention" autofocus>

                                @error('study_orention')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @yield('student_reg_content')
                        @yield('teacher_reg_content')

                        <div class="custom-file ">
                            <label for="avatar" class="text-left custom-file-label col-md-10 offset-md-1" data-browse="@lang('layout.choose_file')" >@lang('layout.avatar')</label>

                            <div class="col-md-1">
                                <input id="avatar" type="file" class="custom-file-input  @error('avatar') is-invalid @enderror" lang="<?php echo app()->getLocale(); ?>" name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar"  autofocus>

                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-5">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    @lang('layout.register_text')
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
