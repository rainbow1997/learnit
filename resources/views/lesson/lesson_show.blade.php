@extends('layouts.app')
@section('content')
    @if(app()->getLocale()=="fa_IR")

    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> @lang('layout.Dashboard')   >  مشاهده درس
                        : {{$lesson->name}}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>

                        @endif
                        <div class="table-responsive" style="direction: rtl;">
                            <table class="table">

                                <thead>
                                <th scope="col">نام</th>
                                <th scope="col">ترم</th>
                                <th scope="col">واحد</th>
                                <th scope="col">بهای هر واحد</th>
                                <th scope="col">ظرفیت</th>
                                <th scope="col">وضعیت</th>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$lesson->name}}</td>
                                    <td><a href="../Terms_Management/{{$lesson->term_id}}" target="_blank">{{$lesson->term->title}}</a></td>
                                    <td>{{$lesson->units}}</td>
                                    <td>{{$lesson->pay_per_unit}}</td>

                                    <td>{{$lesson->registration_capacity}}</td>
                                    <td>
                                        <x-BooleanConvertor type="Activation" :value="$lesson->status">

                                        </x-BooleanConvertor>
                                    </td>

                                    <td>
                                        <a href="{{$lesson->id}}/edit">بروزرسانی</a>

                                        {!! Form::open(['method'=>'DELETE', 'url' =>route('Lessons_Management.destroy', $lesson->id),'style' => 'display:inline']) !!}

                                        {!! Form::button('<i class="ft-trash"></i>حذف ترم', array('type' => 'submit','class' => 'btn btn-defult','title' => 'حذف ترم','onclick'=>'return confirm("آیا مطمئنید؟")')) !!}

                                        {!! Form::close() !!}

                                    </td>
                                </tr>
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
