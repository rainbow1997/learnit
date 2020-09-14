@extends('layouts.app')
@section('title',__('layout.welcome_pagetitle'))
@section('content')
      

            <div class="container">
                <div class="title m-b-md">
                    @lang('message.welcome_title')
                </div>
                    @lang('message.welcome_message')
                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
        @endsection
