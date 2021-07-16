@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('layout.Dashboard') - مدیریت درس ها</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                        <a href="Lessons_Management/create">افزودن درس جدید</a>

                    <div class="table-responsive" style="direction: rtl;">
                        <table class="table">
                            @php

                            $i=1;

                            @endphp
                            <caption>لیست درس ها</caption>
                            <thead>
                            <th scope="col">ردیف</th>

                            <th scope="col">نام</th>
                            <th scope="col">ترم</th>
                            <th scope="col">واحد</th>
                            <th scope="col">ظرفیت</th>
                            <th scope="col">وضعیت</th>

                            </thead>
                            <tbody>
                            @foreach($lessons as $lesson)

                            <tr>

                                <th scope="row">{{$i}}</th>
                                <td>{{$lesson->name}}</td>
                                <td><a href="Terms_Management/{{$lesson->term_id}}" target="_blank">{{$lesson->term->title}}</a></td>
                                <td>{{$lesson->units}}</td>
                                <td>{{$lesson->registration_capacity}}</td>
                                <td>
                                    <x-BooleanConvertor type="Activation" :value="$lesson->status">

                                    </x-BooleanConvertor>
                                </td>

                                <td>
                                    <a href="{{url()->current()}}/{{$lesson->id}}">مشاهده</a>
                                    <a href="{{url()->current()}}/{{$lesson->id}}/edit">بروزرسانی</a>

                                    {!! Form::open(['method'=>'DELETE', 'url' =>route('Lessons_Management.destroy', $lesson->id),'style' => 'display:inline']) !!}

                                    {!! Form::button('<i class="ft-trash"></i>حذف ترم', array('type' => 'submit','class' => 'btn btn-defult','title' => 'حذف ترم','onclick'=>'return confirm("آیا مطمئنید؟")')) !!}

                                    {!! Form::close() !!}

                                </td>
                                @php $i++; @endphp
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $lessons->links() }}

                    </div>
                    @lang('youAreLoggedIn')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
