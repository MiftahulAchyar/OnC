<template>
  <div class="ui main container">
    <div class="ui grid">
     <div class="four wide column">
        <h2 class="ui dividing header">{{section.name}}</h2>
          <div class="ui vertical pointing menu menu-samping">
        <router-link v-for="lesson in section.lessons"  :key="lesson.slug" :to="{ path: '/'+lesson.lesson_type_code+'/'+lesson.slug}" >
            <a class="item">{{ lesson.title}}</a>
          </router-link>
        </div>
      </div>
      <div class="twelve wide column">
        <router-view  :key="$route.fullPath" ></router-view>
         
      </div>
     
    </div>
  </div>

</template>
<script>
    export default {

        data() {
            return {
                section: {}
            };
        },

        created() {
          this.fetch(this.slug_id);
        },

        methods: {
            fetch(slug) {
                axios.defaults.baseURL = 'http://my-project-mumtazhaqiqy270496.codeanyapp.com:'+window.location.port+'/';
                axios.get('api/sections/' + slug)
                    .then(({data}) => {
                        this.section = data;
                    });
            },
        },
       
      props: {
        slug_id: String
      },
    }
</script>