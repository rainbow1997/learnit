<template>
    <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> @lang('layout.Dashboard')   >  افزودن جلسه جدید</div>

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

                        <form method="POST" class="" action="../Sessions_Management">
                            @csrf
                            <div class="row ">

                                <div class="col-md-3">
                                    <label for="term_id" class="form-label">ترم مربوطه</label>
                                    <select class="form-control" id="term_id" name="term_id" onclick="getLessonsOfTerm">
                                        
                                            <option v-for="term in terms" :key="term.id" :value="term.id">{{term.title}}</option>
                                        
                                    </select>

                                    @error('term_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>





                                <div class="col-md-3">
                                    <label for="describe" class="form-label">شرح کوتاه جلسه</label>

                                    <input id="describe" type="name" class="form-control @error('describe') is-invalid @enderror" name="describe" value="{{ old('describe') }}" required autocomplete="describe" autofocus>

                                    @error('describe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-3">
                                    <label for="lesson_id" class="form-label">درس مربوطه</label>
                                    <select class="form-control" id="lesson_id" name="lesson_id" onclick="">



                                    </select>

                                    @error('lesson_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-3">
                                    <label for="typesOfSessions" class="form-label">نوع جلسه</label>
                                    <select class="form-control" id="typesOfSessions" name="typesOfSessions"">
                                    @foreach($typesOfSessions as $session)

                                        <option value="{{$session}}">{{$session}}</option>
                                        @endforeach

                                    </select>

                                    @error('typesOfSessions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>






                                <div class="col-md-3">
                                    <label for="sort_number" class="form-label">ترتیب جلسه</label><!-- badan ghashangtar va modern tar beshe in ghesmat -->

                                    <input id="sort_number" type="number" class="form-control @error('sort_number') is-invalid @enderror" name="sort_number" value="{{ old('sort_number') }}" required autocomplete="sort_number" autofocus>

                                    @error('sort_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>





                                <div class="col-md-3">
                                    <label for="full_text" class="form-label">شرح کامل جلسه</label>

                                    <textarea class="form-control @error('full_text') is-invalid @enderror" id="full_text" rows="20" name="full_text" value="{{ old('full_text') }}" required autocomplete="full_text" autofocus></textarea>

                                    @error('full_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>




                                <div class=" col-md-3">
                                    <label for="status" class="form-label text-center">وضعیت جلسه </label>
                                    <select class="form-select " aria-label="" id="status" name="status">
                                        <option value="1" selected>فعال</option>
                                        <option value="0">غیرفعال</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-md-3 mx-auto ">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت جلسه جدید
                                    </button>
                                </div>
                            </div>
                        @lang('layout.youAreLoggedIn')
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['terms','token'],
        data(){
            return{
                 session:{},
                 term:{},
                 output:{},
            }
        },
        method:{
          getLessonsOfTerm:function()
          {
              let ourObject = this;
              axios.post('lessonsOfTerm',
              {
                 _token : this.token,
                 term_id : this.term.id,

              })
              .then(function(response)
              {
                 ourObject.output = response.data;
              })
              .catch(function(error){
                 ourObject.output = error;

              });
          }
        },
        mounted() {
            console.log('Component mounted.');
        }
    }
</script>
