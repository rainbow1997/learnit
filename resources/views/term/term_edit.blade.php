@extends('layouts.app')
@section('content')
    @if(app()->getLocale()=="fa_IR")
        @push('scripts')
            <script>
                $(function(){


                    $("#term_start_date, #term_start_date").persianDatepicker();

                });

                $(function() {
                    $("#term_end_date, #term_end_date").persianDatepicker();

                });
            </script>
        @endpush
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> @lang('layout.Dashboard')   >  ویرایش ترم
                    : {{$term->title}}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>

                        @endif

                        <form method="POST" class="" action="../{{$term->id}}">
                            @csrf
                            @method('PUT');
                            <div class="row ">

                                <div class="col-md-3">
                                    <label for="title" class="form-label">عنوان ترم</label>

                                    <input id="title" type="name" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$term->title}}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="term_start_date" class="form-label">زمان شروع ترم </label>

                                    @if(app()->getLocale()=="fa_IR")
                                        <input id="term_start_date" type="text" class="form-control @error('term_start_date') is-invalid @enderror" name="term_start_date" value="{{$term->term_start_date}}" required autocomplete="term_start_date" autofocus>
                                        <span id="term_start_dateSpan"></span>

                                    @else
                                        <input id="term_start_date" type="date" class="form-control @error('term_start_date') is-invalid @enderror" name="term_start_date" value="{{$term->term_start_date}}" required autocomplete="term_start_date" autofocus>
                                    @endif

                                    @error('term_start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-3">
                                    <label for="term_end_date" class="form-label">زمان پایان ترم </label>

                                    @if(app()->getLocale()=="fa_IR")
                                        <input id="term_end_date" type="text" class="form-control @error('term_end_date') is-invalid @enderror" name="term_end_date" value="{{$term->term_end_date}}" required autocomplete="term_end_date" autofocus>
                                        <span id="term_end_dateSpan"></span>

                                    @else
                                        <input id="term_end_date" type="date" class="form-control @error('term_end_date') is-invalid @enderror" name="term_end_date" value="{{$term->term_end_date}}" required autocomplete="term_end_date" autofocus>
                                    @endif

                                    @error('term_end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class=" col-md-3">
                                    <label for="status" class="form-label text-center">وضعیت ترم </label>
                                    <select class="form-select " aria-label="" id="status" name="status">
                                        <option value="1">فعال</option>
                                        <option value="0">غیرفعال</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-md-3 mx-auto ">
                                    <button type="submit" id="submit" class="btn btn-primary">
                                        ثبت ویرایش ترم
                                    </button>
                                </div>
                            </div>
                        </form>
                        @lang('youAreLoggedIn')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
