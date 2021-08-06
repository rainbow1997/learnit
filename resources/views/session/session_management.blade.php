@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">@lang('layout.Dashboard') - مدیریت جلسات</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="Sessions_Management/create">افزودن جلسه جدید</a>

                        <div class="table-responsive" style="direction: rtl;">
                            <table class="table">
                                @php

                                    $i=1;

                                @endphp
                                <caption>لیست جلسه ها</caption>
                                <thead>
                                <th scope="col">ردیف</th>

                                <th scope="col">برگزار کننده</th>
                                <th scope="col">نام درس</th>
                                <th scope="col">ترتیب جلسه</th>
                                <th scope="col">نوع جلسه</th>
                                <th scope="col">توضیح جلسه</th>
                                <th scope="col">تاریخ ایجاد</th>
                                <th scope="col">تاریخ بروزرسانی</th>
                                <th scope="col">وضعیت</th>
                                    <th scope="col" class="text-center">عملیات</th>


                                </thead>
                                <tbody>
                                @foreach($sessions as $session)

                                    <tr>

                                        <th scope="row">{{$i}}</th>
                                        <td><a href="Users_Management/{{$session->creator->id}}" target="_blank">{{$session->creator->fname.' '.$session->creator->lname }}</a></td>
                                        <td><a href="Lessons_Management/{{$session->lesson->id}}" target="_blank">{{$session->lesson->name}}</a></td>
                                        <td>{{$session->sort_number}}</td>
                                        <td>{{$session->sessionable_type }}</td>
                                        <td>{{substr($session->describe,0,100)}}</td>
                                        <td>{{$session->created_at}}</td>
                                        <td>{{$session->updated_at}}</td>

                                        <td>
                                            <x-BooleanConvertor type="Activation" :value="$session->status">

                                            </x-BooleanConvertor>
                                        </td>

                                        <td class="d-md-inline-block">
                                            <a class="mx-1 btn btn-sm btn-info text-white" href="{{url()->current()}}/{{$session->id}}">مشاهده</a>
                                            <a class="mx-1 btn btn-sm btn-warning" href="{{url()->current()}}/{{$session->id}}/edit">بروزرسانی</a>

                                            {!! Form::open(['method'=>'DELETE', 'url' =>route('Sessions_Management.destroy', $session->id),'style' => 'display:inline']) !!}

                                            {!! Form::button('<i class="ft-trash"></i>حذف جلسه', array('type' => 'submit','class' => 'my-2 mx-1 btn btn-sm btn-danger','title' => 'حذف جلسه','onclick'=>'return confirm("آیا مطمئنید؟")')) !!}

                                            {!! Form::close() !!}

                                        </td>
                                        @php $i++; @endphp
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $sessions->links() }}

                        </div>
                        @lang('youAreLoggedIn')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
