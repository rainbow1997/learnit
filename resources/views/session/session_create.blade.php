@extends('layouts.app')
@section('content')

@push('scripts')
<script>
    function handleChangeTerm() {
        let data = "_token=<?php echo csrf_token();?>";
        $.ajax({
            type: 'POST',
            url: 'lessonsOfTerm',
            data: {
                _token: "{{ csrf_token() }}",
                term_id: $("#term_id").val()
            },
            success: function (data) {
                console.log(data.lessons);
                for (let i = 0; i < data.lessons.length; i++)
                    $("#lesson_id").html(data.lessons);

            }
        });
    }

</script>
@endpush
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> @lang('layout.Dashboard') > افزودن جلسه جدید</div>

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
                    <div id="app" class="border:2px solid">
                    <session-create csrf="{{csrf_token()}}" :terms="{{$terms}}"></session-create>
                    </div>
                    <hr/>
                    @lang('layout.youAreLoggedIn')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
