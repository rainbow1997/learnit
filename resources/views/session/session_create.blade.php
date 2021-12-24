@extends('layouts.app')
@section('content')
@push('scripts')
<script>
    function handleChangeTerm() {
        let data = "_token=<?php echo csrf_token();?>";
        $.ajax({
            type: 'POST',
            url: 'lessonsOfTerm',
            data: {_token: "{{ csrf_token() }}"
            ,term_id:$("#term_id").val()
            },
            success: function (data) {
                console.log(data.lessons);
                for(let i=0;i<data.lessons.length;i++)
                  $("#lesson_id").html(data.lessons);

            }
        });
    }
</script>
@endpush
    <div class="container">
       <div id="app">
           <session-create :term="$term" :token="<?php echo csrf_token();"></session-create>
       </div>
    </div>
@endsection
