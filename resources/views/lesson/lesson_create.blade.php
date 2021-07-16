@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> @lang('layout.Dashboard')   >  ثبت درس جدید</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>

                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" class="" action="../Lessons_Management">
                            @csrf
                            <div class="row ">

                                <div class="col-md-3">
                                    <label for="name" class="form-label">عنوان درس</label>

                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-3">
                                    <label for="term_id" class="form-label">ترم مربوطه</label>
                                    <select class="form-control" id="term_id" name="term_id">
                                        @foreach($terms as $term)
                                        <option value="{{$term->id}}">{{$term->title}}</option>
                                        @endforeach
                                    </select>

                                    @error('term_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <div class="col-md-3">
                                    <label for="registration_capacity" class="form-label">ظرفیت ثبت نام</label>

                                    <input id="registration_capacity" type="number" class="form-control @error('registration_capacity') is-invalid @enderror" name="registration_capacity" value="{{ old('registration_capacity') }}" required autocomplete="registration_capacity" autofocus>

                                    @error('registration_capacity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>





                                <div class="col-md-3">
                                    <label for="units" class="form-label">تعداد واحد</label>

                                    <input id="units" type="number" class="form-control @error('units') is-invalid @enderror" name="units" value="{{ old('units') }}" required autocomplete="units" autofocus>

                                    @error('units')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>






                                <div class="col-md-3">
                                    <label for="pay_per_unit" class="form-label">بهای هر واحد(تومان)</label>

                                    <input id="pay_per_unit" type="number" class="form-control @error('pay_per_unit') is-invalid @enderror" name="pay_per_unit" value="{{ old('pay_per_unit') }}" required autocomplete="pay_per_unit" autofocus>

                                    @error('pay_per_unit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>





                                <div class=" col-md-3">
                                    <label for="status" class="form-label text-center">وضعیت درس </label>
                                    <select class="form-select " aria-label="" id="status" name="status">
                                        <option value="1" selected>فعال</option>
                                        <option value="0">غیرفعال</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-md-3 mx-auto ">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت درس جدید
                                    </button>
                                </div>
                            </div>
                        @lang('youAreLoggedIn')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
