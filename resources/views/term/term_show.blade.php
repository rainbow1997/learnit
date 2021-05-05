@extends('layouts.app')
@section('content')
    @if(app()->getLocale()=="fa_IR")

    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> @lang('layout.Dashboard')   >  مشاهده ترم
                        : {{$term->title}}
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
                                    <th scope="col">شروع ترم</th>
                                    <th scope="col">پایان ترم</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">عملیات</th>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>{{$term->term_start_date}}</td>
                                            <td>{{$term->term_end_date}}</td>
                                            <td>
                                                <x-BooleanConvertor type="Activation" :value="$term->status">

                                                  </x-BooleanConvertor>
                                            </td>
                                            <td>
                                                {!! Form::open(['method'=>'DELETE', 'url' =>route('Terms_Management.destroy', $term->id),'style' => 'display:inline']) !!}

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
