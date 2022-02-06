<template>
<div>
    <form method="POST" class="" action="../Sessions_Management">

        <input type="hidden" name="_token" :value="csrf"> 
        <div class="row ">

            <div class="col-md-3">
                <label for="term_id" class="form-label">ترم مربوطه</label>
                <select v-model="term" class="form-control" id="term_id" name="term_id" v-on:click="getLessonsOfTerm">

                    <option v-for="term in terms" :key="term.id" :value="term.id">{{term.title}}
                    </option>

                </select>

               
            </div>





            <div class="col-md-3">
                <label for="describe" class="form-label">شرح کوتاه جلسه</label>

                <input id="describe" type="name" class="form-contro"
                    name="describe" required autocomplete="describe" autofocus>

              
            </div>


            <div class="col-md-3">
                <label for="lesson_id" class="form-label">درس مربوطه</label>
                <select class="form-control" id="lesson_id" name="lesson_id">
                    <option v-for="lesson in ourLessons" :key="lesson.id" :value="lesson.id">{{lesson.name}}</option> 


                </select>

              
            </div>


            <div class="col-md-3">
                <label for="typesOfSessions" class="form-label">نوع جلسه</label>
                <select class="form-control" id="typesOfSessions" name="typesOfSessions" v-on:click="getSessionTypes">
                    <option v-for="session in sessions" :key="session.id" :value="session.title">{{session.title}}</option>
      
                </select>

              
            </div>






            <div class="col-md-3">
                <label for="sort_number" class="form-label">ترتیب جلسه</label>
                <!-- badan ghashangtar va modern tar beshe in ghesmat -->

                <input id="sort_number" type="number" class="form-control"
                    name="sort_number"  required autocomplete="sort_number" autofocus>

               
            </div>





            <div class="col-md-3">
                <label for="full_text" class="form-label">شرح کامل جلسه</label>

                <textarea class="form-control " id="full_text" rows="20"
                    name="full_text"  required autocomplete="full_text"
                    autofocus></textarea>

               
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
        </form>
        </div>
</template>

<script>
    export default{
        props: ['csrf','terms','sessions'],
        data() {
            return {
                session: {},
                term: {},
                output: {},
                ourLessons:{},
                ourSessions: {},
            }
        },
        methods: {
            getLessonsOfTerm() {
                console.log('were here');
                let ourObject = this;
                axios.post('lessonsOfTerm', {
                        _token: this.csrf,
                         term_id:this.term
                    })
                    .then(function (response) {
                        ourObject.output = response.data;
                    })
                    .catch(function (error) {
                        ourObject.output = error;

                    });
                console.log(ourObject.output);
                this.ourLessons ={...ourObject.output};
            },
        getSessionTypes()
        {
            axios.get('sessionTypes')
            .then(response=>{
            this.ourSessions = response.data
            })
            .catch(e =>{
                console.log(e)
            });
        }
        },
        mounted() {
            
            console.log(this.terms[0].title);
            console.log('Component mounted.');
        }
    }
     </script>
