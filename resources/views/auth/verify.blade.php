@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('layout.verfiy_email')</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            @lang('layout.fresh_verification_link')
                        </div>
                    @endif

                    @lang('layout.before_proceeding_check_mail')
                    @lang('layout.if_you_did_not_receive_the_email'),
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">@lang('layout.click_here_to_request_another')</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
