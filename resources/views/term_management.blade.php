@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('layout.Dashboard') - مدیریت ترم ها</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>

                        @endif

                            <div class="table-responsive" style="direction: rtl;">
                                <table class="table">
                                    @php

                                    $i=1;

                                    @endphp
                                    <caption>لیست ترم ها</caption>
                                    <thead>
                                    <th scope="col">ردیف</th>

                                    <th scope="col">شروع ترم</th>
                                    <th scope="col">پایان ترم</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">عملیات</th>

                                    </thead>
                                    <tbody>
                                    @foreach($terms as $term)

                                        <tr>

                                            <th scope="row">{{$i}}</th>
                                            <td>{{$term->term_start_date}}</td>
                                            <td>{{$term->term_end_date}}</td>
                                            <td>{{$term->status}}</td>
                                            <td>
                                                {!! Form::open(['method'=>'DELETE', 'url' =>route('Terms_Management.destroy', $term->id),'style' => 'display:inline']) !!}

                                                {!! Form::button('<i class="ft-trash"></i>حذف ترم', array('type' => 'submit','class' => 'btn btn-defult','title' => 'حذف ترم','onclick'=>'return confirm("آیا مطمئنید؟")')) !!}

                                                {!! Form::close() !!}

                                            </td>
                                            @php $i++; @endphp
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $terms->links() }}

                            </div>
                        @lang('youAreLoggedIn')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
