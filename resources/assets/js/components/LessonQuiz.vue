<template>
    <div>
      LessonQuiz.vue <br>
      <strong>{{ lesson.title }}</strong><br>
      {{ lesson.description }}
    </div>
</template>
<script>
    export default {

        data() {
            return {
                lesson: {}
            };
        },

        created() {
          this.fetch(this.slug_id);
        },

        methods: {
            fetch(slug) {
                axios.defaults.baseURL = 'http://my-project-mumtazhaqiqy270496.codeanyapp.com:'+window.location.port+'/';
                axios.get('api/lessons/' + slug)
                    .then(({data}) => {
                        this.lesson = data.lesson;
                    });
            },
        },
       
      props: {
        slug_id: String
      },
    }
</script>