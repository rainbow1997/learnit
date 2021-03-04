@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('layout.Dashboard')</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>

                        @endif
                            <div class="table-responsive" style="direction: rtl;">
                                <table class="table">
                                    <caption>List of Terms</caption>
                                    <thead>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Status</th>

                                    </thead>
                                    <tbody>
                                    @foreach($terms as $term)
                                        <tr>
                                            <th scope="row"></th>
                                            <td>{{$term->term_start_date}}</td>
                                            <td>{{$term->term_end_date}}</td>
                                            <td>{{$term->status}}</td>


                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        @lang('youAreLoggedIn')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
