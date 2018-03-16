<template>
  <div>
   <iframe width="100%" height="445" :src="'https://www.youtube.com/embed/'+lesson.video_id+'?rel=0&showinfo=0'">
   </iframe>
   <h1 class="ui dividing header">{{ lesson.title }}</h1>
   <p>{{ lesson.description }}</p>

    <div class="ui comments">
      <h3 class="ui dividing header">Discussions</h3>
        <comment-list v-if="discussions" v-bind:comments="discussions"></comment-list>
    </div>
  </div>
</template>
<script>

import CommentList from './CommentList.vue';
export default {
  data() {
    return {
      lesson: {},
      discussions:[]
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
        this.discussions = data.discussions;
      });
    },
  },

  components: {
    'comment-list': CommentList,
  },

  props: {
    slug_id: String
  },
}
</script>